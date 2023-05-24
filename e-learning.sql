CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    avatar VARCHAR(255),
    role INT DEFAULT 0
);

CREATE TABLE Lessons (
    lesson_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_by VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    grade INT NOT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE Vocabulary (
    vocab_id INT AUTO_INCREMENT PRIMARY KEY,
    lesson_id INT NOT NULL,
    word VARCHAR(255) NOT NULL,
    spelling VARCHAR(255) NOT NULL,
    meaning VARCHAR(255) NOT NULL,
    example TEXT NOT NULL,
    synonyms TEXT NOT NULL,
    antonyms TEXT NOT NULL,
    FOREIGN KEY (lesson_id) REFERENCES Lessons(lesson_id)
);

CREATE TABLE Grammars (
    grammar_id INT AUTO_INCREMENT PRIMARY KEY,
    lesson_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    example TEXT NOT NULL,
    FOREIGN KEY (lesson_id) REFERENCES Lessons(lesson_id)
);

CREATE TABLE Exams (
    exam_id INT AUTO_INCREMENT PRIMARY KEY,
    grade INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Tests (
    test_id INT AUTO_INCREMENT PRIMARY KEY,
    grade INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    user_id INT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE Questions (
    question_id INT AUTO_INCREMENT PRIMARY KEY,
    exam_id INT NOT NULL,
    content VARCHAR(500) NOT NULL,
    answer_1 VARCHAR(255) NOT NULL,
    answer_2 VARCHAR(255) NOT NULL,
    answer_3 VARCHAR(255) NOT NULL,
    answer_4 VARCHAR(255) NOT NULL,
    correct_answer INT NOT NULL,
    FOREIGN KEY (exam_id) REFERENCES Exams(exam_id)
);

CREATE TABLE User_Answers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    test_id INT NOT NULL,
    answer INT NOT NULL,
    FOREIGN KEY (test_id) REFERENCES Tests(test_id)
);

CREATE TABLE Test_Results (
    result_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    test_id INT NOT NULL,
    score INT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id),
    FOREIGN KEY (test_id) REFERENCES Tests(test_id)
);

CREATE TABLE Categories (
  category_id INT PRIMARY KEY AUTO_INCREMENT,
  category_name VARCHAR(255) NOT NULL
);

CREATE TABLE Posts (
  post_id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT NOT NULL,
  category_id INT NOT NULL,
  title VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES Users(user_id),
  FOREIGN KEY (category_id) REFERENCES Categories(category_id)
);

CREATE TABLE Comments (
  comment_id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT NOT NULL,
  post_id INT NOT NULL,
  content TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  likes_count INT DEFAULT 0,
  FOREIGN KEY (user_id) REFERENCES Users(user_id),
  FOREIGN KEY (post_id) REFERENCES Posts(post_id)
);

CREATE TABLE Likes (
  like_id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT NOT NULL,
  comment_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES Users(user_id),
  FOREIGN KEY (comment_id) REFERENCES Comments(comment_id)
);
