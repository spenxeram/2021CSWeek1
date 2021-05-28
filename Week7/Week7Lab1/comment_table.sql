CREATE TABLE itecblog2021_2.comments (
   ID BIGINT NOT NULL AUTO_INCREMENT ,
   comment TEXT NOT NULL ,
   comment_author INT NOT NULL ,
   comment_post INT NOT NULL ,
   date_created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
   parent_comment INT NULL ,
   PRIMARY KEY (ID)
 ) 
