CREATE TABLE ministries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    address VARCHAR(255) NOT NULL,
    logo VARCHAR(255)
);

CREATE TABLE units (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ministry_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    address VARCHAR(255) NOT NULL,
    FOREIGN KEY (ministry_id) REFERENCES ministries(id) ON DELETE CASCADE
);

CREATE TABLE user_tb (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
