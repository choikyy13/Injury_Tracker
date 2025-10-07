-- lists the athletes' informations who are unable to continue their sports careers due to injury
select a.*
from Athlete a, Injury_record i , Long_term l
where a.Athlete_id = i.Athlete_id And i.Record_id = l.Record_id AND l.Able_to_continue_career = FALSE