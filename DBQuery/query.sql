CREATE TABLE IF NOT EXISTS `studentdata` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `studentName` varchar(30) NOT NULL,
  `studentCategory` varchar(30) NOT NULL,
  `studentGender` varchar(30) NOT NULL,
  `studentDob` varchar(30) NOT NULL,
  `studentNationality` varchar(30) NOT NULL,
  `studentGuardian` varchar(30) NOT NULL,
  `studentInstitute` varchar(30) NOT NULL,
  `studentAddress` varchar(30) NOT NULL,
  `studentCity` varchar(30) NOT NULL,
  `studentState` varchar(30) NOT NULL,
  `studentPincode` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `studentPhone` varchar(30) NOT NULL,
  `studentIdProof` varchar(30) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userEmail` (`userEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;