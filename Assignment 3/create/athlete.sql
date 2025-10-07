CREATE TABLE Athlete( 
	Athlete_id char(5) PRIMARY KEY, 
	Athlete_name char(30) NOT NULL, 
	Date_of_Birth date, 
	ContactNO char(15) unique, 
	Team_id char(5),
	FOREIGN KEY(Team_id) REFERENCES Team(Team_id) 
) ;