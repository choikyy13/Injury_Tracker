-- shows the most common short-term injuries that athletes suffer from
SELECT st.Treatment, count(*) as Number_of_short_term_injur
FROM Short_term st
GROUP BY st.Treatment
ORDER BY COUNT(*) DESC;
