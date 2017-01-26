CREATE TABLE users (
user_id     INT(8)  AUTO_INCREMENT,
user_name   VARCHAR(30) NOT NULL,
user_pass   VARCHAR(255) NOT NULL,
user_email  VARCHAR(255) NOT NULL,
user_date   DATETIME ,
user_level  INT(8) ,
UNIQUE INDEX user_name_unique (user_name),
PRIMARY KEY (user_id)
);
TEXT
Create table topics(
topic_id   int(6) auto_increment,
topic_name varchar(50),
topic_description text,
PRIMARY KEY (topic_id)
);
Create table comments(
   comment_id int(6) auto_increment,
   comment_desc text,
   reply_num int,
   comment_date DATETIME,
   user_id int(8) ,
   topic_id   int(6),
   PRIMARY KEY (comment_id),
   FOREIGN KEY (topic_id) REFERENCES topics(topic_id),
   FOREIGN KEY (user_id) REFERENCES users(user_id)
);
Create table replies(
  reply_id int(6) auto_increment,
  comment_id int,
  user_id int ,
  reply_date datetime,
  PRIMARY KEY (reply_id),
  FOREIGN KEY (comment_id) REFERENCES comments(comment_id),
  FOREIGN KEY (user_id) REFERENCES users(user_id)
);
INSERT INTO TOPICS(topic_name,topic_description) values('food','About food what do you think of the taste');
INSERT INTO TOPICS(topic_name,topic_description) values('delivery','Are you ok with the time of delivery? for example');
INSERT INTO TOPICS(topic_name,topic_description) values('sevices','what is the quality of our services');

INSERT INTO USERS(user_name,user_pass,user_email) VALUES('tuffnot','123','tuffnot@yahoo.com');
INSERT INTO USERS(user_name,user_pass,user_email) VALUES('alamine','1234','alamine@yahoo.com');
INSERT INTO USERS(user_name,user_pass,user_email) VALUES('ruffnot','1234','ruffnot@yahoo.fr');
INSERT INTO USERS(user_name,user_pass,user_email) VALUES('Astrid','1234','astrid@gmail.com');