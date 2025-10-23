CREATE TABLE Athlete (
    Athlete_id CHAR(5) PRIMARY KEY,  -- A0001
    Athlete_name CHAR(30) NOT NULL,
    ssn INT,
    Date_of_birth DATE,
    Contact_no CHAR(15),
    Team_id INT,
    FOREIGN KEY(Team_id) REFERENCES Team(Team_id)
);

CREATE TABLE Team (
    Team_id CHAR(5) PRIMARY KEY,  -- T0001
    Team_name CHAR(30),
    Country CHAR(30),
);


CREATE TABLE Injury_Type (
    Injury_id CHAR(7) PRIMARY KEY,  -- Inj0001
    Injury_name CHAR(50),
    Body_part CHAR(30),
);

CREATE TABLE Injury_Record (
    Record_id CHAR(7) PRIMARY KEY,  -- Rec0001
    Athlete_id INT NOT NULL,
    Injury_id INT NOT NULL,
    Date_inj DATE,
    Injury_status CHAR(20),
    STAFF_in_charge INT,
    FOREIGN KEY (STAFF_in_charge) REFERENCES Staff(Staff_id),
    FOREIGN KEY (Athlete_id) REFERENCES Athlete(Athlete_id),
    FOREIGN KEY (Injury_id) REFERENCES Injury_Type (Injury_id)
);

CREATE TABLE Short_Term (
    Record_id CHAR(7) PRIMARY KEY, 
    Treatment CHAR(30),
    Recovery_time CHAR(30),
    FOREIGN KEY (Record_id) REFERENCES Injury_Record (Record_id)
);

CREATE TABLE Long_Term (
    Record_id CHAR(7) PRIMARY KEY,
    Long_term_effect CHAR(100),
    Able_to_continue_career bool,
    FOREIGN KEY(Record_id) REFERENCES Injury_Record(Record_id)
);

CREATE TABLE Users(
    User_id int PRIMARY KEY,
    User_name CHAR(30),
    Email CHAR(30) UNIQUE
);

CREATE TABLE Public (
    User_id INT PRIMARY KEY,
    Interest CHAR(100),
    Team_supporting INT,
    FOREIGN KEY (Team_supporting) REFERENCES Team(Team_id),
    FOREIGN KEY (User_id) REFERENCES User(User_id)
);

CREATE TABLE Professional (
    User_id int PRIMARY KEY,
    Permission_code int unique,
    Staff_id CHAR(5),
    FOREIGN KEY (Staff_id) REFERENCES Staff(Staff_id),
    FOREIGN KEY (User_id) REFERENCES Users(User_id)
);

CREATE TABLE Staff (
    Staff_id CHAR(5) PRIMARY KEY,  -- S0001
    Staff_name CHAR(30),
    Year_join INT
);

CREATE TABLE Coach (
    Staff_id CHAR(5) PRIMARY KEY,  -- C0001
    Team_id INT,
    Certificate CHAR(30),
    FOREIGN KEY (Team_id) REFERENCES Team(Team_id),
    FOREIGN KEY (Staff_id) REFERENCES Staff(Staff_id)
);

CREATE TABLE Medical_Team (
    Staff_id CHAR(7) PRIMARY KEY, -- Med0001
    Specialization CHAR(40),
    License_num CHAR(30),
    FOREIGN KEY(Staff_id) REFERENCES Staff(Staff_id)
);

