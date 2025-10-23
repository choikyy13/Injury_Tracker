CREATE TABLE Medical_team ( 
	Staff_id char(5) PRIMARY KEY, 
	Specialization char(40), 
	Licence_number char(30), 
	FOREIGN KEY(Staff_id) REFERENCES Staff(Staff_id) 
) ;