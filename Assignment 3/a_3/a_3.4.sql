-- create a list of which body part injury caused the most career-ending injury
WITH career_availability AS (
    SELECT lt.Record_id
    FROM Long_term lt
    WHERE lt.Able_to_continue_career = FALSE 
),
long_term_injury_id AS(
    SELECT ir.Injury_id
    FROM career_availability ca
    JOIN Injury_record ir
        ON ir.Record_id = ca.Record_id
)

SELECT DISTINCT it.Body_part, COUNT(*) AS Ended_Carrer
FROM Injury_Type it
JOIN long_term_injury_id lid
    ON it.Injury_id = lid.Injury_id
GROUP BY it.Body_part;

