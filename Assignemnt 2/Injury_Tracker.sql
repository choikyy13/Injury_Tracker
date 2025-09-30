CREATE TABLE Athlete (
    Athlete_id INT,
    Athlete_name CHAR(30) NOT NULL,
    ssn INT,
    Date_of_birth DATE,
    Contact_no CHAR(15),
    Team_id INT,
    FOREIGN KEY(Team_id) REFERENCES Team(Team_id)
);

CREATE TABLE Team (
    Team_id INT PRIMARY KEY,
    Team_name CHAR(30),
    Country CHAR(30),
);


CREATE TABLE Injury_Type (
    Injury_id INT PRIMARY KEY,
    Injury_name CHAR(50),
    Body_part CHAR(30),
);

CREATE TABLE Injury_Record (
    Record_id INT PRIMARY KEY,
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
    Record_id INT PRIMARY KEY,
    Treatment CHAR(30),
    Recovery_time CHAR(30),
    FOREIGN KEY (Record_id) REFERENCES Injury_Record (Record_id)
);

CREATE TABLE Long_Term (
    Record_id INT PRIMARY KEY,
    Long_term_effect CHAR(100),
    Able_to_continue_career bool,
    FOREIGN KEY(Record_id) REFERENCES Injury_Record(Record_id)
);

CREATE TABLE Public (
    User_id INT PRIMARY KEY,
    Interest CHAR(100),
    Staff_id INT,
    FOREIGN KEY (Staff_id) REFERENCES Staff(Staff_id),
    FOREIGN KEY (User_id) REFERENCES User(User_id)
);

CREATE TABLE Staff (
    Staff_id INT PRIMARY KEY,
    Staff_name CHAR(30),
    Year_join INT
);

CREATE TABLE Coach (
    Staff_id INT PRIMARY KEY,
    Team_id INT,
    Certificate CHAR(30),
    FOREIGN KEY (Team_id) REFERENCES Team(Team_id),
    FOREIGN KEY (Staff_id) REFERENCES Staff(Staff_id)
);

CREATE TABLE Medical_Team (
    Staff_id INT PRIMARY KEY,
    Specialization CHAR(40),
    License_num CHAR(30),
    FOREIGN KEY(Staff_id) REFERENCES Staff(Staff_id)
);

