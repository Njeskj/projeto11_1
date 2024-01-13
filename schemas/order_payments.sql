CREATE TABLE order_payments (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    method_id INT,
    transaction_id INT, -- Referência à tabela de transações financeiras, se aplicável
    payment_amount DECIMAL(10, 2) NOT NULL,
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (method_id) REFERENCES payment_methods(method_id),
    FOREIGN KEY (transaction_id) REFERENCES order_transactions(transaction_id)
);
