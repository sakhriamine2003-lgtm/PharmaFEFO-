-- PharmaFEFO - Base de données
CREATE DATABASE IF NOT EXISTS pharmafefo CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE pharmafefo;


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('preparateur', 'pharmacien', 'admin') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    generic_name VARCHAR(150),
    manufacturer VARCHAR(100),
    unit_price DECIMAL(10,2) NOT NULL DEFAULT 0,
    alert_threshold INT NOT NULL DEFAULT 10,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE stock_batches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    lot_number VARCHAR(50) NOT NULL,
    expiry_date DATE NOT NULL,
    quantity INT NOT NULL DEFAULT 0,
    status ENUM('OK','WARNING','CRITICAL','EXPIRED','RETURN_PROCESS') NOT NULL DEFAULT 'OK',
    received_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

CREATE TABLE stock_movements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    batch_id INT NOT NULL,
    type ENUM('IN','OUT','LOSS','RETURN') NOT NULL,
    quantity INT NOT NULL,
    reason VARCHAR(255),
    user_id INT,
    moved_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (batch_id) REFERENCES stock_batches(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Données de démonstration
INSERT INTO users (username, password_hash, role) VALUES
('preparateur1', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'preparateur'),
('pharmacien1', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pharmacien'),
('admin1', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');
-- Mot de passe par défaut: password

INSERT INTO products (name, generic_name, manufacturer, unit_price, alert_threshold) VALUES
('Doliprane 1000mg', 'Paracétamol', 'Sanofi', 2.50, 20),
('Amoxicilline 500mg', 'Amoxicilline', 'Mylan', 5.80, 15),
('Ibuprofène 400mg', 'Ibuprofène', 'Biogaran', 3.20, 10),
('Metformine 850mg', 'Metformine', 'Arrow', 4.10, 25),
('Oméprazole 20mg', 'Oméprazole', 'Zentiva', 6.50, 12);

INSERT INTO stock_batches (product_id, lot_number, expiry_date, quantity, status) VALUES
(1, 'LOT-2024-001', DATE_ADD(CURDATE(), INTERVAL 8 MONTH), 150, 'OK'),
(1, 'LOT-2024-002', DATE_ADD(CURDATE(), INTERVAL 25 DAY), 40, 'CRITICAL'),
(2, 'LOT-2024-003', DATE_ADD(CURDATE(), INTERVAL 4 MONTH), 80, 'WARNING'),
(3, 'LOT-2024-004', DATE_ADD(CURDATE(), INTERVAL 10 MONTH), 60, 'OK'),
(3, 'LOT-2024-005', DATE_ADD(CURDATE(), INTERVAL 15 DAY), 20, 'CRITICAL'),
(4, 'LOT-2024-006', DATE_ADD(CURDATE(), INTERVAL 7 MONTH), 120, 'OK'),
(5, 'LOT-2024-007', DATE_ADD(CURDATE(), INTERVAL -5 DAY), 15, 'EXPIRED');
