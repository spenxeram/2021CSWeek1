CREATE TABLE `dummydb`.`users` (
  `ID` BIGINT NOT NULL AUTO_INCREMENT ,
  `user_name` VARCHAR(255) NOT NULL ,
  `user_email` VARCHAR(255) NOT NULL ,
  `user_hash` VARCHAR(255) NOT NULL ,
  `date_createed` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, `user_role` INT NOT NULL DEFAULT '2' ,
  `user_img` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`ID`)
)
