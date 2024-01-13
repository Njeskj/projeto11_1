CREATE TABLE order_refunds (
    refund_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    refund_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    refund_amount DECIMAL(10, 2) NOT NULL,
    refund_status ENUM('processed', 'pending', 'failed') DEFAULT 'pending',
    FOREIGN KEY (order_id) REFERENCES orders(order_id)
);
