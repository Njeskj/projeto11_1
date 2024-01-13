CREATE TABLE user_promotion_participations (
    participation_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    event_id INT,
    participation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (event_id) REFERENCES promotion_events(event_id)
);
