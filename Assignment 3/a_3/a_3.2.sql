-- lists the athletes who belong to the team "Crimson Wolves" and shows their number of injury records
select a.Athlete_name, COUNT(*) as number_of_injury
from Athlete a, Injury_record i 
where a.Athlete_id = i.Athlete_id
group by a.Athlete_id , a.Team_id
having a.Team_id = (select Team_id from Team where Team_name = "Crimson Wolves")


