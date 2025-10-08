-- Show which short term injury is most
SELECT st.Treatment
FROM Short_term st
GROUP BY st.Treatment
ORDER BY COUNT(*) DESC
LIMIT 1;
