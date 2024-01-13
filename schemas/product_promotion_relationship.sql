CREATE TABLE product_promotion_relationship (
    relationship_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    promotion_id INT,
    FOREIGN KEY (product_id) REFERENCES products(product_id),
    FOREIGN KEY (promotion_id) REFERENCES promotions(promotion_id)
);
