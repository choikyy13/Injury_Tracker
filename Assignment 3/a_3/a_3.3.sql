-- lists the athletes' informations who are unable to continue their sports careers due to injury
SELECT a.*
FROM Athlete a, Injury_record i , Long_term l
WHERE a.Athlete_id = i.Athlete_id AND i.Record_id = l.Record_id AND l.Able_to_continue_career = FALSE;