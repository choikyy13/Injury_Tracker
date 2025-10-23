CREATE TABLE Long_term ( 
	Record_id char(5) PRIMARY KEY, 
	Long_term_effect char(100),	 
	Able_to_continue_career bool, 
	FOREIGN KEY(Record_id) REFERENCES Injury_record(Record_id) 
) ;