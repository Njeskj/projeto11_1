CREATE TABLE system_reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    review_text TEXT NOT NULL,
    rating INT NOT NULL,
    review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);
