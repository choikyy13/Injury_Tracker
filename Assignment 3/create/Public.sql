CREATE TABLE Public( 
	User_id char(5) PRIMARY KEY,	 
	Interest char(100), 
	Team_supporting char(5), 
    FOREIGN KEY(Team_supporting) REFERENCES Team(Team_id), 
	FOREIGN KEY(User_id) REFERENCES Users(User_id) 
) ;