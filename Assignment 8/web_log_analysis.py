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


'''
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

plt.figure(figsize=(10,6))
for i, (page, events) in enumerate(timeline.items()):
    times = [t[0] for t in events]
    plt.plot(times, [i]*len(times), 'o', label=page)

plt.yticks(range(len(timeline)), timeline.keys())
plt.xlabel("Time")
plt.ylabel("Page")
plt.title("Website Access Timeline")
plt.legend()
plt.tight_layout()
plt.show()
'''

error_count = defaultdict(int)
timeline = defaultdict(list)

with open(ERROR_LOG, "r") as f:
    for line in f:
        m = error_pattern.search(line)
        if not m:
            continue
        data = m.groupdict()

        t = datetime.datetime.strptime(data["time"], "%a %b %d %H:%M:%S.%f %Y")
        '''
        try :
                exact_page = data["page"].split("/")[2]
        except IndexError as e:
                continue
        '''
        file_match = re.search(r'in (/.+?) on line', data["message"])
        if file_match:
            filename = file_match.group(1)
        else:
            filename = "Unknown"
        
        error_count[filename] += 1
        timeline[filename].append(t)

print("\n -- Error Frequency --")
for file, count in sorted(error_count.items(), key=lambda x:-x[1]):
    try:
        file = file.split("/")[-1]
    except:
        continue
    print(f"{file:60s} {count:3d} errors")

plt.figure(figsize=(10,6))
for i, (file, times) in enumerate(timeline.items()):
    plt.plot(times, [i]*len(times), 'o', label=file.split('/')[-1])

plt.xlabel("Time")
plt.ylabel("Error")
plt.legend()
plt.tight_layout()
plt.show()
