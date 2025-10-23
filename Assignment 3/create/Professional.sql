CREATE TABLE Professional ( 
	User_id char(5) PRIMARY KEY, 
	Permission_code int unique, 
	Staff_id char(5),
	FOREIGN KEY (Staff_id) REFERENCES Staff(Staff_id), 
	FOREIGN KEY(User_id) REFERENCES Users(User_id) 
) ;