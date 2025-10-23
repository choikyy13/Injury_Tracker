-- shows the staff id who are in charge of the greatest number of athletes
SELECT ir.STAFF_in_Charge,COUNT(*) as number_of_athletes
FROM Injury_record ir
GROUP BY STAFF_in_Charge
ORDER BY COUNT(*) DESC
LIMIT 1;
