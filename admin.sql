USE simple_login;
CREATE TABLE admin (
    `member_id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(30) NOT NULL,
    `password` varchar(150) NOT NULL,
    PRIMARY KEY (`member_id`),
	UNIQUE KEY (`username`)
)
DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;