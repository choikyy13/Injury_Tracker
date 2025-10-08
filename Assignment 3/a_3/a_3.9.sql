-- Which staff in charge of most injury
SELECT ir.STAFF_in_Charge
FROM Injury_record ir
GROUP BY STAFF_in_Charge
ORDER BY COUNT(*) DESC
LIMIT 1;
