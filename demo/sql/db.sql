USE `social`;

CREATE TABLE `users` (
	`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`first_name` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`last_name` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`username` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`email` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
	`password` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`signup_date` DATE NOT NULL,
	`profile_pic` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`num_posts` INT(11) UNSIGNED NOT NULL,
	`num_likes` INT(11) UNSIGNED NOT NULL,
	`user_closed` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`friend_array` TEXT(65535) NOT NULL COLLATE 'utf8_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB;