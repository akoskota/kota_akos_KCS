
CREATE DATABASE IF NOT EXISTS szerviz DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE szerviz;

DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS contacts;

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    phone VARCHAR(30),
    email VARCHAR(100)
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    serial_number VARCHAR(100),
    manufacturer VARCHAR(100),
    type VARCHAR(100),
    status VARCHAR(50),
    submission_date DATE,
    last_status_update DATE,
    contact_id INT,
    FOREIGN KEY (contact_id) REFERENCES contacts(id)
);

INSERT INTO contacts (name, phone, email) VALUES
('Kiss Béla', '06301234567', 'kiss@example.com'),
('Nagy Anna', '06304567890', 'nagy@example.com');

INSERT INTO products (serial_number, manufacturer, type, status, submission_date, last_status_update, contact_id) VALUES
('ABC123', 'Samsung', 'TV', 'Beérkezett', CURDATE(), CURDATE(), 1),
('XYZ789', 'LG', 'Monitor', 'Hibafeltárás', CURDATE(), CURDATE(), 2);
