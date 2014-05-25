USE simple_login;
CREATE TABLE logged_in_users (
    `member_id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(30) NOT NULL,
    `firstname` varchar(150) NOT NULL,
	`lastname` varchar(150) NOT NULL,
	`ID` varchar(150) NOT NULL,
	`loggedInTime` varchar(150) NOT NULL,
    PRIMARY KEY (`member_id`),
)
DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;