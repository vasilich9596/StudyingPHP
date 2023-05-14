DROP TABLE IF EXIST blog;

CREATE TABLE blogs (
                       id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                       created_at DATETIME NOT NULL,
                       title VARCHAR(255) NOT NULL,
                       preview TEXT NOT NULL,
                       content TEXT NOT NULL
)

CREATE TABLE blog_comments(
                              id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                              blog_id INT NOT NULL,
                              created_at DATETIME NOT NULL,
                              comment_title TEXT NOT NULL,
                              massage TEXT NOT NULL,
                              CONSTRAINT blog_comments_blog_id_fk FOREIGN KEY (blog_id) REFERENCES blogs(id)
)

CREATE TABLE Faq (
                     id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                     created_at DATETIME NOT NULL,
                     content_question TEXT NOT NULL,
                     content_answer TEXT
)

INSERT INTO (created_at, title, preview,content) VALUES ('2023-04-12 19:49:55', 'About me', 'Tell about me, my work, hobby etc', 'lorem ipsum');
INSERT INTO blogs (created_at, title, preview,content) VALUES ('2023-05-12 15:39:45', 'i like pizza ', 'pizza so tasty, and chesse', 'lorem ipsum');


INSERT INTO blog_comments (blog_id, created_at, comment_title, massage) VALUES (1, '23-04-11 14:55:23', 'title niga', 'hello niga')
INSERT INTO blog_comments (blog_id, created_at, massage) VALUES (2, '12-05-11 15:33:17', 'any niga text')


INSERT INTO Faq (created_at, content_question) VALUES ('2023-04-12 19:49:55', 'What this doing');