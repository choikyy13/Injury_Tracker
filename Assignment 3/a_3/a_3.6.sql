-- create a list of coaches name and their certificate who has no associated team
SELECT s.Staff_name, c.Cerificate
FROM Staff s, Coach c 
WHERE s.Staff_id = c.Staff_id AND C.Team_id IS NULL;
