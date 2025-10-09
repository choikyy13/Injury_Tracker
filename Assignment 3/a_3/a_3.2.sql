-- lists the athletes who belong to the team "Crimson Wolves" and shows their number of injury records
SELECT a.Athlete_name, COUNT(*) AS number_of_injury
FROM Athlete a, Injury_record i 
WHERE a.Athlete_id = i.Athlete_id
GROUP BY a.Athlete_id , a.Team_id
HAVING a.Team_id = (SELECT Team_id FROM Team WHERE Team_name = "Crimson Wolves");


