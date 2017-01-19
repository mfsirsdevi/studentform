CREATE TABLE IF NOT EXISTS `studentdata` (
  `studentId` int(11) NOT NULL AUTO_INCREMENT,
  `studentName` varchar(30) NOT NULL,
  `studentAdmn` varchar(30) NOT NULL,
  `studentEmail` varchar(30) NOT NULL,
  `studentPass` varchar(30) NOT NULL,
  PRIMARY KEY (`studentId`),
  UNIQUE KEY `studentEmail` (`studentEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
