CREATE TABLE `itecblog2021_2`.`posts` (
   `ID` BIGINT NOT NULL AUTO_INCREMENT ,
   `post_title` VARCHAR(255) NOT NULL ,
   `post_body` TEXT NOT NULL ,
   `post_author` INT NOT NULL ,
   `date_created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `date_modified` DATETIME NOT NULL ,
   `post_img` VARCHAR(255) NOT NULL ,
   PRIMARY KEY (`ID`)
 ) 
