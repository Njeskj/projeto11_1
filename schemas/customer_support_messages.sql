CREATE TABLE customer_support_messages (
    message_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    support_agent_id INT,
    message_text TEXT NOT NULL,
    message_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_read BOOLEAN DEFAULT false,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (support_agent_id) REFERENCES users(user_id)
);
