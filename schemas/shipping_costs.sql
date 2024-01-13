CREATE TABLE shipping_costs (
    cost_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    shipping_method_id INT,
    cost_amount DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (shipping_method_id) REFERENCES shipping_methods(method_id)
);
