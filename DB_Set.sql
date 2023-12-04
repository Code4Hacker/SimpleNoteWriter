DROP DATABASE gemini_crud;
CREATE DATABASE gemini_crud;

USE gemini_crud;

CREATE TABLE NOTES (
    noteId INT PRIMARY KEY  AUTO_INCREMENT,
    title VARCHAR(40),
    descr tinytext,
    bgColor VARCHAR(50),
    date_created DATE DEFAULT CURRENT_TIMESTAMP
);