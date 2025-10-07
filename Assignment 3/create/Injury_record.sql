CREATE TABLE Injury_record ( 
	Record_id char(5) PRIMARY KEY, 
	Athlete_id char(5) NOT NULL,
	Injury_id char(5) NOT NULL,
	Date_inj date, 
	Injury_Status char(20), 
	STAFF_in_Charge char(5),
	FOREIGN KEY (STAFF_in_Charge ) REFERENCES Staff(Staff_id) ,
	FOREIGN KEY (Athlete_id) REFERENCES Athlete(Athlete_id), 
	FOREIGN KEY (Injury_id) REFERENCES Injury_Type(Injury_id)
) 