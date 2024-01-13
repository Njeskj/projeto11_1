CREATE TABLE order_transactions (
    transaction_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    transaction_amount DECIMAL(10, 2) NOT NULL,
    transaction_status ENUM('approved', 'pending', 'failed') DEFAULT 'pending',
    FOREIGN KEY (order_id) REFERENCES orders(order_id)
);
