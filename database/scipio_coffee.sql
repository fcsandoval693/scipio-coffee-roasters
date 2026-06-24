CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    tasting_notes TEXT,
    price DECIMAL(6,2) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    origin_country VARCHAR(100) NOT NULL,
    origin_region VARCHAR(100),
    roast_type VARCHAR(30) NOT NULL,
    process_method VARCHAR(50),
    recommended_brewing_methods TEXT,
    intensity TINYINT,
    altitude VARCHAR(50),
    variety VARCHAR(100),
    weight INT NOT NULL,
    image VARCHAR(255),
    active BOOLEAN DEFAULT TRUE,
    featured BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO products (
name,
description,
tasting_notes,
price,
stock,
origin_country,
origin_region,
roast_type,
process_method,
recommended_brewing_methods,
intensity,
altitude,
variety,
weight,
image,
active,
featured
)

VALUES

('Legio X Reserve','Blend premium inspirado en la legendaria Legio X.','Chocolate negro, avellana, caramelo',13.95,25,'Brasil','Minas Gerais','Medium','Natural','Espresso, Moka Italiana',4,'1200-1400m','Bourbon',250,'legio-x.jpg',1,1),

('Africanus Espresso','Espresso intenso dedicado a Escipion Africano.','Cacao, nuez, especias',12.95,18,'Brasil','Cerrado','Dark','Natural','Espresso',5,'1000-1200m','Mundo Novo',250,'africanus.jpg',1,1),

('Hispania Blend','Mezcla equilibrada inspirada en las provincias hispanas.','Frutos rojos, chocolate',11.95,32,'Colombia','Huila','Medium','Lavado','Espresso, V60',3,'1600-1900m','Caturra',250,'hispania.jpg',1,1),

('Senatus Gold','Seleccion especial para métodos filtro.','Jazmin, melocoton, citricos',15.95,12,'Etiopia','Yirgacheffe','Light','Lavado','V60, Chemex',2,'1800-2200m','Heirloom',250,'senatus.jpg',1,1),

('Carthago Decaf','Descafeinado por proceso natural.','Chocolate con leche, almendra',12.50,15,'Mexico','Chiapas','Medium','Descafeinado','Espresso, V60',2,'1200-1500m','Typica',250,'carthago.jpg',1,0),

('Caesar Roast','Café potente y elegante.','Cacao, tabaco dulce',14.50,20,'Guatemala','Antigua','Medium','Lavado','Espresso',4,'1500-1700m','Bourbon',250,'caesar.jpg',1,0),

('Imperium Blend','Blend de la casa.','Caramelo, avellana',11.50,40,'Brasil','Sul de Minas','Medium','Natural','Espresso, Moka Italiana',3,'1000-1200m','Catuaí',250,'imperium.jpg',1,0),

('Praetorian Guard','Espresso de gran cuerpo.','Chocolate negro, melaza',13.75,22,'Colombia','Tolima','Dark','Lavado','Espresso',5,'1500-1900m','Castillo',250,'praetorian.jpg',1,0),

('Augustus Selection','Perfil refinado y complejo.','Miel, naranja, jazmin',16.95,10,'Etiopia','Sidamo','Light','Lavado','V60, Chemex',2,'1900-2200m','Heirloom',250,'augustus.jpg',1,1),

('Roman Forum','Café diario equilibrado.','Chocolate, nuez',10.95,50,'Brasil','Parana','Medium','Natural','Espresso, Francesa',3,'900-1200m','Mundo Novo',250,'forum.jpg',1,0),

('Gladius Espresso','Intenso y afilado.','Cacao amargo, especias',13.20,28,'Peru','Cajamarca','Dark','Lavado','Espresso',5,'1600-2000m','Typica',250,'gladius.jpg',1,0),

('Aquila Blend','Suave y aromático.','Frutas amarillas, miel',14.90,17,'Costa Rica','Tarrazu','Light','Honey','V60, Chemex',2,'1500-1900m','Catuai',250,'aquila.jpg',1,0),

('Centurion Roast','Versátil para cualquier método.','Chocolate, ciruela',12.40,30,'Colombia','Nariño','Medium','Lavado','Espresso, V60',3,'1700-2100m','Castillo',250,'centurion.jpg',1,0),

('Palatine Reserve','Lote especial de temporada.','Mandarina, flor blanca',18.50,8,'Etiopia','Guji','Light','Natural','V60, Chemex',1,'2000-2300m','Heirloom',250,'palatine.jpg',1,1),

('Consul Blend','Equilibrado y dulce.','Caramelo, cacao',11.90,35,'Brasil','Mogiana','Medium','Natural','Espresso',3,'1000-1300m','Catuaí',250,'consul.jpg',1,0),

('Forum Decaf','Descafeinado suave.','Chocolate con leche, galleta',11.50,18,'Mexico','Oaxaca','Medium','Descafeinado','Francesa, V60',2,'1200-1600m','Typica',250,'forum-decaf.jpg',1,0),

('Tiber Reserve','Elegante y afrutado.','Frambuesa, miel',15.40,14,'Kenia','Nyeri','Light','Lavado','V60',2,'1800-2100m','SL28',250,'tiber.jpg',1,0),

('Mars Blend','Potente y energético.','Cacao, frutos secos',12.80,26,'Brasil','Cerrado','Dark','Natural','Espresso',4,'1000-1300m','Mundo Novo',250,'mars.jpg',1,0),

('Jupiter Grand Cru','Complejo y refinado.','Bergamota, melocoton',19.95,6,'Etiopia','Yirgacheffe','Light','Lavado','Chemex',1,'2000-2300m','Heirloom',250,'jupiter.jpg',1,1),

('Minerva Roast','Dulce y equilibrado.','Miel, almendra',13.10,24,'Guatemala','Huehuetenango','Medium','Lavado','V60, Espresso',3,'1500-2000m','Caturra',250,'minerva.jpg',1,0),

('Apollo Blend','Brillante y floral.','Limon, jazmin',14.70,19,'Etiopia','Sidamo','Light','Natural','V60',2,'1900-2200m','Heirloom',250,'apollo.jpg',1,0),

('Venus Selection','Suave y delicado.','Melocoton, miel',15.20,11,'Costa Rica','Tarrazu','Light','Honey','Chemex',1,'1600-1900m','Catuai',250,'venus.jpg',1,0),

('Spartacus Espresso','Intenso y rebelde.','Chocolate negro, tabaco',13.60,21,'Colombia','Huila','Dark','Lavado','Espresso',5,'1500-1900m','Castillo',250,'spartacus.jpg',1,0),

('Rubicon Blend','El café para cruzar el Rubicón.','Caramelo, cacao, nuez',12.30,33,'Brasil','Sul de Minas','Medium','Natural','Espresso, Moka Italiana',3,'1000-1200m','Catuaí',250,'rubicon.jpg',1,0),

('Triumphus Reserve','Edición especial de celebración.','Frutas tropicales, miel',18.95,7,'Panama','Boquete','Light','Lavado','V60, Chemex',1,'1700-2200m','Geisha',250,'triumphus.jpg',1,1);


CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL, 
    email VARCHAR(150) NOT NULL UNIQUE,
    phone VARCHAR(30) UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('client', 'admin') NOT NULL DEFAULT 'client',
    street VARCHAR(150),
    street_number VARCHAR(20),
    postal_code VARCHAR(20),
    floor VARCHAR(20),
    door VARCHAR(20),
    city VARCHAR(100),
    province VARCHAR(100),
    active BOOLEAN NOT NULL DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);