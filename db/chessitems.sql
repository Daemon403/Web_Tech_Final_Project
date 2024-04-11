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

-- Roles table to define user roles (e.g., admin, standard member)
CREATE TABLE Roles (
  rid INT PRIMARY KEY AUTO_INCREMENT,
  rname VARCHAR(50)
);
-- Users table to store user information
CREATE TABLE Users (
  pid INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(50) UNIQUE,
  password VARCHAR(255),
  fname VARCHAR(50),
  lname VARCHAR(50),
  email VARCHAR(50) UNIQUE,
  rid INT (FOREIGN KEY) REFERENCES Roles(rid)
);

-- Membership table to track membership status (optional)
CREATE TABLE Membership (
  mid INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT (FOREIGN KEY) REFERENCES Users(pid),
  membership_status ENUM('pending', 'approved', 'rejected')
);

-- Events table to store event details
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

-- Forum table to store forum titles and descriptions
CREATE TABLE Forum (
  id INT PRIMARY KEY AUTO_INCREMENT,
  forum_title VARCHAR(255),
  description TEXT
);

-- Forum_Posts table to store forum post details
CREATE TABLE Forum_Posts (
  post_id INT PRIMARY KEY AUTO_INCREMENT,
  author_id INT (FOREIGN KEY) REFERENCES Users(pid),
  forum_id INT (FOREIGN KEY) REFERENCES Forum(id),
  post_content TEXT,
  image VARCHAR(255),
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Forum_Comments table to store forum comment details
CREATE TABLE Forum_Comments (
  comment_id INT PRIMARY KEY AUTO_INCREMENT,
  commenter_id INT (FOREIGN KEY) REFERENCES Users(pid),
  post_id INT (FOREIGN KEY) REFERENCES Forum_Posts(post_id),
  comment_text TEXT,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Games table to store game details
CREATE TABLE Games (
  game_id INT PRIMARY KEY AUTO_INCREMENT,
  player1_id INT (FOREIGN KEY) REFERENCES Users(pid),
  player2_id INT (FOREIGN KEY) REFERENCES Users(pid),
  game_date DATE,
  end_date DATE,
  last_updated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  result ENUM('win', 'loss', 'draw')
);

-- User_Ranks table to store user ranks and corresponding dates
CREATE TABLE User_Ranks (
  rank_id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT (FOREIGN KEY) REFERENCES Users(pid),
  rank INT,
  date DATE
);

-- Populate Roles table with initial data (optional)
INSERT INTO Roles (rname)
VALUES ('superadmin'), ('admin'), ('standard');
-- Users table to store user information
CREATE TABLE Users (
  pid INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(50) UNIQUE,
  password VARCHAR(255),
  fname VARCHAR(50),
  lname VARCHAR(50),
  email VARCHAR(50) UNIQUE,
  rid INT (FOREIGN KEY) REFERENCES Roles(rid)
);

-- Roles table to define user roles (e.g., admin, standard member)
CREATE TABLE Roles (
  rid INT PRIMARY KEY AUTO_INCREMENT,
  rname VARCHAR(50)
);

-- Membership table to track membership status (optional)
CREATE TABLE Membership (
  mid INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT (FOREIGN KEY) REFERENCES Users(pid),
  membership_status ENUM('pending', 'approved', 'rejected')
);

-- Events table to store event details
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

-- Forum table to store forum titles and descriptions
CREATE TABLE Forum (
  id INT PRIMARY KEY AUTO_INCREMENT,
  forum_title VARCHAR(255),
  description TEXT
);

-- Forum_Posts table to store forum post details
CREATE TABLE Forum_Posts (
  post_id INT PRIMARY KEY AUTO_INCREMENT,
  author_id INT (FOREIGN KEY) REFERENCES Users(pid),
  forum_id INT (FOREIGN KEY) REFERENCES Forum(id),
  post_content TEXT,
  image VARCHAR(255),
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Forum_Comments table to store forum comment details
CREATE TABLE Forum_Comments (
  comment_id INT PRIMARY KEY AUTO_INCREMENT,
  commenter_id INT (FOREIGN KEY) REFERENCES Users(pid),
  post_id INT (FOREIGN KEY) REFERENCES Forum_Posts(post_id),
  comment_text TEXT,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Games table to store game details
CREATE TABLE Games (
  game_id INT PRIMARY KEY AUTO_INCREMENT,
  player1_id INT (FOREIGN KEY) REFERENCES Users(pid),
  player2_id INT (FOREIGN KEY) REFERENCES Users(pid),
  game_date DATE,
  end_date DATE,
  last_updated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  result ENUM('win', 'loss', 'draw')
);

-- User_Ranks table to store user ranks and corresponding dates
CREATE TABLE User_Ranks (
  rank_id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT (FOREIGN KEY) REFERENCES Users(pid),
  rank INT,
  date DATE
);

-- Tournaments table to store tournament details (optional)
CREATE TABLE Tournaments (
  tournament_id INT PRIMARY KEY AUTO_INCREMENT,
  tournament_name VARCHAR(255),
  start_date DATE,
  end_date DATE,
  format ENUM('round-robin', 'swiss', 'knockout'),  -- Example tournament formats
  creator_id INT (FOREIGN KEY) REFERENCES Users(pid)
);

-- Tournament_Participants table to link users to tournaments they participate in
CREATE TABLE Tournament_Participants (
  tpid INT PRIMARY KEY AUTO_INCREMENT,
  tournament_id INT (FOREIGN KEY) REFERENCES Tournaments(tournament_id),
  user_id INT (FOREIGN KEY) REFERENCES Users(pid)
);

-- Forum_Upvotes table to track upvotes on forum posts (optional)
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
