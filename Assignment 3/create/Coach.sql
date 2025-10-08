CREATE TABLE Coach ( 
	Staff_id char(5) PRIMARY KEY, 
	Team_id char(5) ,
    Cerificate char(30), 
    FOREIGN KEY (Team_id) REFERENCES Team(Team_id), 
	FOREIGN KEY(Staff_id) REFERENCES Staff (Staff_id) 
) ;