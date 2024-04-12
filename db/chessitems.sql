DROP TABLE IF EXISTS Challenges;
DROP TABLE IF EXISTS Forum_Upvotes;
DROP TABLE IF EXISTS Tournament_Participants;
DROP TABLE IF EXISTS Tournaments;
DROP TABLE IF EXISTS User_Ranks;
DROP TABLE IF EXISTS Games;
DROP TABLE IF EXISTS Forum_Comments;
DROP TABLE IF EXISTS Forum_Posts;
DROP TABLE IF EXISTS Forum;
DROP TABLE IF EXISTS User_Event;
DROP TABLE IF EXISTS Events;  
DROP TABLE IF EXISTS Membership;
DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Roles;


CREATE TABLE Roles (
  rid INT PRIMARY KEY AUTO_INCREMENT,
  rname VARCHAR(50)
);

CREATE TABLE Users (
  pid INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(50) UNIQUE,
  password VARCHAR(255),
  fname VARCHAR(50),
  lname VARCHAR(50),
  email VARCHAR(50) UNIQUE,
  rid INT (FOREIGN KEY) REFERENCES Roles(rid)
);

CREATE TABLE Membership (
  mid INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT (FOREIGN KEY) REFERENCES Users(pid),
  membership_status ENUM('pending', 'approved', 'rejected')
);

CREATE TABLE Events (
  event_id INT PRIMARY KEY AUTO_INCREMENT,
  event_name VARCHAR(255),
  event_type ENUM('regular', 'by-invitation'),
  event_date DATE,
  description TEXT,
  creator_id INT (FOREIGN KEY) REFERENCES Users(pid)
);

CREATE TABLE User_Event (
  ueid INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT (FOREIGN KEY) REFERENCES Users(pid),
  event_id INT (FOREIGN KEY) REFERENCES Events(event_id)
);

CREATE TABLE Forum (
  id INT PRIMARY KEY AUTO_INCREMENT,
  forum_title VARCHAR(255),
  description TEXT
);

CREATE TABLE Forum_Posts (
  post_id INT PRIMARY KEY AUTO_INCREMENT,
  author_id INT (FOREIGN KEY) REFERENCES Users(pid),
  forum_id INT (FOREIGN KEY) REFERENCES Forum(id),
  post_content TEXT,
  image VARCHAR(255),
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Forum_Comments (
  comment_id INT PRIMARY KEY AUTO_INCREMENT,
  commenter_id INT (FOREIGN KEY) REFERENCES Users(pid),
  post_id INT (FOREIGN KEY) REFERENCES Forum_Posts(post_id),
  comment_text TEXT,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Games (
  game_id INT PRIMARY KEY AUTO_INCREMENT,
  player1_id INT (FOREIGN KEY) REFERENCES Users(pid),
  player2_id INT (FOREIGN KEY) REFERENCES Users(pid),
  game_date DATE,
  end_date DATE,
  last_updated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  result ENUM('win', 'loss', 'draw')
);

CREATE TABLE User_Ranks (
  rank_id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT (FOREIGN KEY) REFERENCES Users(pid),
  rank INT,
  date DATE
);

INSERT INTO Roles (rname)
VALUES ('superadmin'), ('admin'), ('standard');

CREATE TABLE Users (
  pid INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(50) UNIQUE,
  password VARCHAR(255),
  fname VARCHAR(50),
  lname VARCHAR(50),
  email VARCHAR(50) UNIQUE,
  rid INT (FOREIGN KEY) REFERENCES Roles(rid)
);

CREATE TABLE Roles (
  rid INT PRIMARY KEY AUTO_INCREMENT,
  rname VARCHAR(50)
);

CREATE TABLE Membership (
  mid INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT (FOREIGN KEY) REFERENCES Users(pid),
  membership_status ENUM('pending', 'approved', 'rejected')
);

CREATE TABLE Events (
  event_id INT PRIMARY KEY AUTO_INCREMENT,
  event_name VARCHAR(255),
  event_type ENUM('regular', 'by-invitation'),
  event_date DATE,
  description TEXT,
  creator_id INT (FOREIGN KEY) REFERENCES Users(pid)
);

-- User_Event table to link users to events they registered for
CREATE TABLE User_Event (
  ueid INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT (FOREIGN KEY) REFERENCES Users(pid),
  event_id INT (FOREIGN KEY) REFERENCES Events(event_id)
);

CREATE TABLE Forum (
  id INT PRIMARY KEY AUTO_INCREMENT,
  forum_title VARCHAR(255),
  description TEXT
);

CREATE TABLE Forum_Posts (
  post_id INT PRIMARY KEY AUTO_INCREMENT,
  author_id INT (FOREIGN KEY) REFERENCES Users(pid),
  forum_id INT (FOREIGN KEY) REFERENCES Forum(id),
  post_content TEXT,
  image VARCHAR(255),
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Forum_Comments (
  comment_id INT PRIMARY KEY AUTO_INCREMENT,
  commenter_id INT (FOREIGN KEY) REFERENCES Users(pid),
  post_id INT (FOREIGN KEY) REFERENCES Forum_Posts(post_id),
  comment_text TEXT,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Games (
  game_id INT PRIMARY KEY AUTO_INCREMENT,
  player1_id INT (FOREIGN KEY) REFERENCES Users(pid),
  player2_id INT (FOREIGN KEY) REFERENCES Users(pid),
  game_date DATE,
  end_date DATE,
  last_updated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  result ENUM('win', 'loss', 'draw')
);

CREATE TABLE User_Ranks (
  rank_id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT (FOREIGN KEY) REFERENCES Users(pid),
  rank INT,
  date DATE
);

CREATE TABLE Tournaments (
  tournament_id INT PRIMARY KEY AUTO_INCREMENT,
  tournament_name VARCHAR(255),
  start_date DATE,
  end_date DATE,
  format ENUM('round-robin', 'swiss', 'knockout'),
  creator_id INT (FOREIGN KEY) REFERENCES Users(pid)
);


CREATE TABLE Tournament_Participants (
  tpid INT PRIMARY KEY AUTO_INCREMENT,
  tournament_id INT (FOREIGN KEY) REFERENCES Tournaments(tournament_id),
  user_id INT (FOREIGN KEY) REFERENCES Users(pid)
);

CREATE TABLE Forum_Upvotes (
  upvid INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT (FOREIGN KEY) REFERENCES Users(pid),
  post_id INT (FOREIGN KEY)REFERENCES Forum_Posts(post_id),
  upvoted_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Challenges (
  cid INT PRIMARY KEY AUTO_INCREMENT,
  challenger_id INT (FOREIGN KEY) REFERENCES Users(pid),
  challenged_id INT (FOREIGN KEY) REFERENCES Users(pid),
  challenge_status ENUM('pending', 'accepted', 'rejected'),
  message TEXT,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);
