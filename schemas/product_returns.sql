CREATE TABLE product_returns (
    return_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    user_id INT,
    product_id INT,
    return_reason TEXT,
    return_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_processed BOOLEAN DEFAULT false,
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);
