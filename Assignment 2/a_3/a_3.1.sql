-- list out the athletes' informations which are in charge of Dr. Noah Smith and not recovered yet
select a.*
from Athlete a
join Injury_record i ON a.Athlete_id = i.Athlete_id
where i.STAFF_in_Charge = (select Staff_id from Staff where Staff_name = "Dr. Noah Smith")
		AND i.Injury_Status != "Recovered"
