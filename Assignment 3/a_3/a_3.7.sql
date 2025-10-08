-- Select which team has the most long_term injured people
SELECT t.Team_name, COUNT(DISTINCT ir.Athlete_id) AS people_with_injury
FROM Long_term lt
JOIN Injury_record ir ON ir.Record_id = lt.Record_id
JOIN Athlete a ON a.Athlete_id = ir.Athlete_id
JOIN Team t ON t.Team_id = a.Team_id
GROUP BY t.Team_name
ORDER BY people_with_injury DESC
LIMIT 1;
