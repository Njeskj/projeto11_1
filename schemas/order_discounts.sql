CREATE TABLE order_discounts (
    order_discount_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    coupon_id INT,
    discount_amount DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (coupon_id) REFERENCES discount_coupons(coupon_id)
);
