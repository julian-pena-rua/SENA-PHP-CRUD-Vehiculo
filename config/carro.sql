CREATE TABLE carro (    id INT(6) AUTO_INCREMENT PRIMARY KEY,
                        marca VARCHAR(30) NOT NULL,
                        modelo VARCHAR(30) NOT NULL,
                        fabricante VARCHAR(30) NOT NULL,
                        color VARCHAR(30) NOT NULL,
                        fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)