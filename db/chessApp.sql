CREATE TABLE `Members` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`member_id`)
);

CREATE TABLE `Membership_Requests` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`request_id`),
  FOREIGN KEY (`member_id`) REFERENCES `Members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `Tournaments` (
  `tournament_id` int(11) NOT NULL AUTO_INCREMENT,
  `tournament_name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`tournament_id`),
  FOREIGN KEY (`admin_id`) REFERENCES `Members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `Events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(100) NOT NULL,
  `event_date` date NOT NULL,
  `invitation_only` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`event_id`)
);

CREATE TABLE `Games` (
  `game_id` int(11) NOT NULL AUTO_INCREMENT,
  `tournament_id` int(11) DEFAULT NULL,
  `player1_id` int(11) NOT NULL,
  `player2_id` int(11) NOT NULL,
  `result` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`game_id`),
  FOREIGN KEY (`tournament_id`) REFERENCES `Tournaments` (`tournament_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`player1_id`) REFERENCES `Members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`player2_id`) REFERENCES `Members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `Game_Results` (
  `result_id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NOT NULL,
  `winner_id` int(11) NOT NULL,
  PRIMARY KEY (`result_id`),
  FOREIGN KEY (`game_id`) REFERENCES `Games` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`winner_id`) REFERENCES `Members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `Forum_Posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL,
  PRIMARY KEY (`post_id`),
  FOREIGN KEY (`member_id`) REFERENCES `Members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `Post_Images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  PRIMARY KEY (`image_id`),
  FOREIGN KEY (`post_id`) REFERENCES `Forum_Posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `Post_Comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`comment_id`),
  FOREIGN KEY (`post_id`) REFERENCES `Forum_Posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`member_id`) REFERENCES `Members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `Post_Votes` (
  `vote_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `vote_type` enum('upvote','downvote') NOT NULL,
  PRIMARY KEY (`vote_id`),
  FOREIGN KEY (`post_id`) REFERENCES `Forum_Posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`member_id`) REFERENCES `Members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `Rankings` (
  `ranking_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `ranking` int(11) NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`ranking_id`),
  FOREIGN KEY (`member_id`) REFERENCES `Members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE
);
