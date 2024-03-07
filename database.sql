-- Create database
CREATE DATABASE pizzeria;

-- Connect to database
\c pizzeria;


-- Create the pizzas table
CREATE TABLE pizzas (
    id SERIAL PRIMARY KEY,
    pizza_name VARCHAR(100) NOT NULL,
    pizza_description TEXT
);

-- Create the ingredients table
CREATE TABLE ingredients (
    id SERIAL PRIMARY KEY,
    ingredient_name VARCHAR(100) NOT NULL,
    price NUMERIC NOT NULL
);

-- Create the pizzas_ingredients relationship table
CREATE TABLE pizzas_ingredients (
    id SERIAL PRIMARY KEY,
    pizza_id INTEGER REFERENCES pizzas(id),
    ingredient_id INTEGER REFERENCES ingredients(id),
    portions NUMERIC NOT NULL
);

-- Insert pizzas
INSERT INTO pizzas (pizza_name, pizza_description) VALUES ('Fun Pizza', 'Pizza topped with tomato feta and mozzarella cheese.');
INSERT INTO pizzas (pizza_name, pizza_description) VALUES ('Super Mushroom Pizza', 'Pizza topped with mushroom, tomato and bacon, mozzarella cheese.');

-- Insert ingredients
INSERT INTO ingredients (ingredient_name, price) VALUES ('Tomato', 0.50);
INSERT INTO ingredients (ingredient_name, price) VALUES ('Sliced mushrooms', 0.50);
INSERT INTO ingredients (ingredient_name, price) VALUES ('Mozzarella Cheese', 0.50);
INSERT INTO ingredients (ingredient_name, price) VALUES ('feta Cheese', 1.00);
INSERT INTO ingredients (ingredient_name, price) VALUES ('Sausages', 1.00);
INSERT INTO ingredients (ingredient_name, price) VALUES ('Sliced onion', 0.50);
INSERT INTO ingredients (ingredient_name, price) VALUES ('Oregano', 1.00);
INSERT INTO ingredients (ingredient_name, price) VALUES ('Bacon', 1.00);

-- Insert pizzas_ingredients relationship
-- Fun Pizza
INSERT INTO pizzas_ingredients (pizza_id, ingredient_id, portions) VALUES (1, 1, 1); 
INSERT INTO pizzas_ingredients (pizza_id, ingredient_id, portions) VALUES (1, 2, 1); 
INSERT INTO pizzas_ingredients (pizza_id, ingredient_id, portions) VALUES (1, 3, 1); 
INSERT INTO pizzas_ingredients (pizza_id, ingredient_id, portions) VALUES (1, 4, 1); 
INSERT INTO pizzas_ingredients (pizza_id, ingredient_id, portions) VALUES (1, 5, 1); 
INSERT INTO pizzas_ingredients (pizza_id, ingredient_id, portions) VALUES (1, 6, 1); 
INSERT INTO pizzas_ingredients (pizza_id, ingredient_id, portions) VALUES (1, 7, 1); 

-- Super Mushroom Pizza
INSERT INTO pizzas_ingredients (pizza_id, ingredient_id, portions) VALUES (2, 1, 1); 
INSERT INTO pizzas_ingredients (pizza_id, ingredient_id, portions) VALUES (2, 2, 1); 
INSERT INTO pizzas_ingredients (pizza_id, ingredient_id, portions) VALUES (2, 3, 1); 
INSERT INTO pizzas_ingredients (pizza_id, ingredient_id, portions) VALUES (2, 7, 1); 
INSERT INTO pizzas_ingredients (pizza_id, ingredient_id, portions) VALUES (2, 8, 1); 