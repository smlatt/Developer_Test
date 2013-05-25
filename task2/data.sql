CREATE TABLE Property (
    ID BIGINT AUTO_INCREMENT PRIMARY KEY,
    Type TINYINT default 1,
    Title CHAR(255) default '',
    Address TEXT NOT NULL,
    Bedroom INT default 0,
    Living_room INT default 0,
    Diningroom INT default 0,
    Size Decimal(6,2) default 0.0
) ENGINE=InnoDB;  /* SuMi Modificaiton : Change to InnoDB */

CREATE TABLE HDB (
    ID BIGINT AUTO_INCREMENT PRIMARY KEY,
    PID BIGINT NOT NULL,
    HDBBlock INT NOT NULL,
    INDEX idx_PID (PID), 
    FOREIGN KEY (PID) REFERENCES Property(ID)
) ENGINE=InnoDB;

CREATE TABLE Condo (
    ID BIGINT AUTO_INCREMENT PRIMARY KEY,/* SuMi Modificaiton : Add PRIMARY KEY */
    PID BIGINT NOT NULL,  /* SuMi Modificaiton : Change to BIGINT */
    SwimmingPool TINYINT default 0,
    INDEX idx_PID (PID), 
    FOREIGN KEY (PID) REFERENCES Property(ID)
) ENGINE=InnoDB;


--
-- Test data for table `Property`
--

INSERT INTO `Property` (`ID`, `Type`, `Title`, `Address`, `Bedroom`, `Living_room`, `Diningroom`, `Size`) VALUES
(111, 1, 'Regent Height', 'Bukit Batok East Ave 5', 3, 1, 1, 1075.00),
(222, 2, 'Clementi Height', 'Clementi Ave 3', 3, 1, 1, 1250.00);


--
-- Test data for table `HDB`
--

INSERT INTO `Condo` (`ID`, `PID`, `SwimmingPool`) VALUES
(1, 111, 1),
(2, 111, 1);

--
-- Test data for table `HDB`
--

INSERT INTO `HDB` (`ID`, `PID`, `HDBBlock`) VALUES
(1, 222, 345),
(2, 222, 120);

