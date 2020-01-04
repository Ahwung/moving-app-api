BEGIN;

CREATE DATABASE moving;
\c moving;

CREATE TABLE products(
    id SERIAL,
    name VARCHAR(64),
    price INT,
    url VARCHAR(256),
    store VARCHAR(64),
    room VARCHAR(64),
    category VARCHAR(64),
    bought VARCHAR(64)
);

INSERT INTO products (name, price, url, store, room, category, bought) VALUES ('Ibiza Sofa', 299.99, 'https://www.wayfair.com/furniture/pdp/zipcode-design-ibiza-sofa-zipc7699.html', 'Wayfair', 'Living Room', 'Furniture', 'False');

INSERT INTO products (name, price, url, store, room, category, bought) VALUES ('Gloucester Upholstered Standard Bed', 162.99, 'https://www.wayfair.com/furniture/pdp/greyleigh-gloucester-upholstered-standard-bed-w001553030.html', 'Wayfair', 'Bedroom', 'Furniture', 'False');

INSERT INTO products (name, price, url, store, room, category, bought) VALUES ('Sonja 8 Drawer Double Dresser', 447.84, 'https://www.wayfair.com/furniture/pdp/sonja-8-drawer-double-dresser-lrfy4323.html', 'Wayfair', 'Bedroom', 'Furniture', 'True');