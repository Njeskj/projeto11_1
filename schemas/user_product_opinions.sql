CREATE TABLE user_product_opinions (
    opinion_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    opinion_text TEXT NOT NULL,
    rating INT NOT NULL,
    opinion_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_helpful BOOLEAN DEFAULT false,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);
