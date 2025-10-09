-- creates the amount of public users
SELECT COUNT(*) AS Public_User_Count
FROM Users u 
JOIN Public p
    ON p.User_id = u.User_id;



