CREATE DATABASE IF NOT EXISTS internet_blog CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE internet_blog;

CREATE TABLE IF NOT EXISTS posts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  author VARCHAR(100) NOT NULL,
  content TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO posts (title, author, content) VALUES
('Welcome to the Dynamic Blog', 'Student', 'This is the first sample post stored inside the MySQL database.'),
('Internet Computing Project', 'Student', 'This dynamic website demonstrates backend functionality using PHP and MySQL.');
