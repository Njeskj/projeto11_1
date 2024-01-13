CREATE TABLE promotional_banners (
    banner_id INT AUTO_INCREMENT PRIMARY KEY,
    banner_name VARCHAR(100) NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    target_url VARCHAR(255) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    is_active BOOLEAN DEFAULT true
);
