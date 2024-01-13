CREATE TABLE user_sessions (
    session_id VARCHAR(255) PRIMARY KEY,
    user_id INT,
    expiration_time TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);
