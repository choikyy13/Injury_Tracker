CREATE TABLE Short_term( 
	Record_id char(5) PRIMARY KEY, 
	Treatment char(30), 
	Recovery_time char(30), 
	FOREIGN KEY(Record_id) REFERENCES Injury_record(Record_id) 
) ;