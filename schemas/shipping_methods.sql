CREATE TABLE shipping_methods (
    method_id INT AUTO_INCREMENT PRIMARY KEY,
    method_name VARCHAR(50) NOT NULL,
    estimated_delivery_days INT NOT NULL
);
