CREATE TABLE  `main` (
  `id` int(11)  auto_increment,
  `name` text ,
  `lastposter` varchar(200) ,
  `lastpostdate` int(11) ,
  `topics` int(11) ,
  `replies` int(11) ,
  PRIMARY KEY  (`id`)
);

CREATE TABLE `replies` (
  `id` int(11) auto_increment,
  `topicid` int(11) unsigned,
  `message` text,
  `subject` text ,
  `poster` text,
  `date` int(10),
  PRIMARY KEY  (`id`)
)

CREATE TABLE  `topics` (
  `id` int(11)  auto_increment,
  `forumid` int(11) ,
  `message` text ,
  `subject` text,
  `poster` text ,
  `date` int(11) ,
  `lastposter` varchar(200) ,
  `lastpostdate` int(11) ,
  `replies` int(11) ,
  PRIMARY KEY  (`id`)
);