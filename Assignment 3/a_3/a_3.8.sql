-- shows the number of short-term injuries that athletes suffer from
SELECT st.Treatment
FROM Short_term st
GROUP BY st.Treatment
ORDER BY COUNT(*) DESC;
