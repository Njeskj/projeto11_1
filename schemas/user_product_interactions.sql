CREATE TABLE user_product_interactions (
    interaction_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    interaction_type ENUM('view', 'click', 'favorite') NOT NULL,
    interaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);
