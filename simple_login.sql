USE simple_login;
CREATE TABLE simple_login (
    `member_id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(30) NOT NULL,
    `password` varchar(150) NOT NULL,
    `firstname` varchar(30) NOT NULL,
    `lastname` varchar(30) NOT NULL,
    `ID` varchar(10) NOT NULL,
    PRIMARY KEY (`member_id`),
	UNIQUE KEY (`username`)
)
ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=3;