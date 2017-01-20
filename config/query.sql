CREATE TABLE IF NOT EXISTS `studentdata` (
  `studentId` int(11) NOT NULL AUTO_INCREMENT,
  `studentName` varchar(30) NOT NULL,
  `studentAdmn` varchar(30) NOT NULL,
  `studentEmail` varchar(30) NOT NULL,
  `studentPass` varchar(100) NOT NULL,
  `userRole` varchar(30) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`studentId`),
  UNIQUE KEY `studentEmail` (`studentEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


INSERT INTO `studentdata` (`studentName`, `studentAdmn`, `studentEmail`, `studentPass`, `userRole`)
VALUES ('devi prasad', '123456789', 'rsdevi@mindfiresolutions.com', SHA2('123456', 256), 'admin');

INSERT INTO `studentdata` (`studentName`, `studentAdmn`, `studentEmail`, `studentPass`, `userRole`)
VALUES ('raja', '123456987', 'devi@mindfiresolutions.com', SHA2('1234567', 256), 'user');