import re
import datetime
from collections import defaultdict
import matplotlib.pyplot as plt
import os

ACCESS_LOG = os.path.expanduser("access_log.txt")
ERROR_LOG = os.path.expanduser("error_log.txt")


access_pattern = re.compile(r'(?P<ip>\d+\.\d+\.\d+\.\d+)\s+- -\s+\[(?P<time>[^\]]+)\]\s+'
                            r'"(?P<method>\w+)\s+(?P<page>.*?)\s+HTTP/[^"]+"\s+'
                            r'(?P<status>\d+)\s+(?P<size>\S+)\s+"(?P<referer>[^"]*)"\s+"(?P<browser>[^"]*)"'
                            )

error_pattern = re.compile(r'\[(?P<time>[^\]]+)\]\s+\[(?P<module>[^\]]+)\]\s+'
                           r'\[pid\s+(?P<pid>\d+)\]\s+\[client\s+(?P<ip>\d+\.\d+\.\d+\.\d+):\d+\]\s+'
                           r'(?P<message>.*)'
                           )


def plot_timeline(timeline, title):
    plt.figure(figsize=(10,5))

    for key, (file, times) in enumerate(timeline.items()):
        if isinstance(times[0], (list,tuple)):
            time = [t[0] for t in times]
        else:
            time = times
        plt.plot(time, [key]*len(times), 'o', label=file)
    plt.xlabel("Time")
    plt.ylabel("Count")
    plt.title(title)
    plt.legend()
    plt.tight_layout()
    plt.show()


page_access = defaultdict(int)
timeline = defaultdict(list)
errors = []


with open(ACCESS_LOG, "r") as f:
    for line in f:
        m = access_pattern.match(line)
        if m:
            data = m.groupdict()
            t = datetime.datetime.strptime(data["time"].split()[0], "%d/%b/%Y:%H:%M:%S")
            try :
                exact_page = data["page"].split("/")[2]
            except IndexError as e:
                continue
            #page_access[data["page"]] += 1
            page_access[exact_page] += 1
            timeline[exact_page].append((t, data["ip"], data["browser"]))
            if int(data["status"]) >= 400:
                errors.append((exact_page, data["ip"], data["status"], t))

print("\n -- Page Access Frequency --")
for page, count in page_access.items():
    print(f"{page:20s} {count:3d} times")

print("\n -- Errors Found --")
for e in errors:
    print(f"{e[3]} | {e[1]} | {e[0]} | HTTP {e[2]}")

'''
plt.figure(figsize=(10,6))
for i, (page, events) in enumerate(timeline.items()):
    times = [t[0] for t in events]
    plt.plot(times, [i]*len(times), 'o', label=page)
'''


'''
plt.yticks(range(len(timeline)), timeline.keys())
plt.xlabel("Time")
plt.ylabel("Page")
plt.title("Access Timeline")
plt.legend()
plt.tight_layout()
plt.show()
'''


error_count = defaultdict(int)
error_timeline = defaultdict(list)

with open(ERROR_LOG, "r") as f:
    for line in f:
        m = error_pattern.search(line)
        if not m:
            continue
        data = m.groupdict()

        t = datetime.datetime.strptime(data["time"], "%a %b %d %H:%M:%S.%f %Y")
        #file_match = re.search(r'in (/.+?) on line', data["message"])
        file_match = re.search(r'(?:in |at |from |thrown in |script )(?P<file>/[\w\-/\.]+)(?::| on line |\s|$)',data["message"])
        if file_match:
            filename = file_match.group(1)
            try:
                filename = filename.split('/')[-1]
            except:
                continue
        else:
            filename = "Unknown"
        
        error_count[filename] += 1
        error_timeline[filename].append(t)

print("\n -- Error Frequency --")
for file, count in sorted(error_count.items(), key=lambda x:-x[1]):
    try:
        file = file.split("/")[-1]
    except:
        continue
    print(f"{file:60s} {count:3d} errors")

'''
plt.figure(figsize=(10,6))
for i, (file, times) in enumerate(error_timeline.items()):
    plt.plot(times, [i]*len(times), 'o', label=file)
'''

'''
plt.title("Error Timeline")
plt.xlabel("Time")
plt.ylabel("Error")
plt.legend()
plt.tight_layout()
plt.show()
'''

plot_timeline(timeline, "Access Log Timeline")
plot_timeline(error_timeline, "Error Log Timeline")



ip_events = defaultdict(list)
browser_events = defaultdict(list)

for page, events in timeline.items():
    for t, ip, ua in events:
        ip_events[ip].append(t)
        browser_events[ua].append(t)


plt.figure(figsize=(10,5))
ips = list(ip_events.keys())

for i, ip in enumerate(ips):
    plt.scatter(ip_events[ip], [i]*len(ip_events[ip]), label = ip, s=10)

plt.xlabel("Time")
plt.ylabel("IP Address")
plt.title("Access timeline by IP")
plt.legend()
plt.grid(True, linestyle="--", alpha=0.5)
plt.tight_layout()
plt.show()



plt.figure(figsize=(10, 6))
browsers = list(browser_events.keys())

for i, browser in enumerate(browsers):
    plt.scatter(browser_events[browser], [i] * len(browser_events[browser]), label=browser, s=10)

#plt.yticks(range(len(browsers)), [b[:40] + "..." if len(b) > 40 else b for b in browsers])
plt.xlabel("Time")
plt.ylabel("User Agent")
plt.title("Access Timeline by Browser / User-Agent")
plt.grid(True, linestyle="--", alpha=0.5)
plt.tight_layout()
plt.legend(fontsize=6)
plt.show()