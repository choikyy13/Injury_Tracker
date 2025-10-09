SELECT a.*
FROM Athlete a
JOIN Injury_record i ON a.Athlete_id = i.Athlete_id
WHERE i.STAFF_in_Charge = (SELECT Staff_id FROM Staff WHERE Staff_name = "Noah Smith")
		AND i.Injury_Status != "Recovered"