CREATE SCHEMA IF NOT EXISTS login;

CREATE TABLE IF NOT EXISTS login.user(
    email VARCHAR(254) NOT NULL,
    senha VARCHAR(255) NOT NULL
)