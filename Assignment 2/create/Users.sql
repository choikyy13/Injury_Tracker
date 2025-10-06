CREATE TABLE Users( 
	User_id char(5) PRIMARY KEY, 
	User_name char(30), 
	Email char(30) UNIQUE 
) ;