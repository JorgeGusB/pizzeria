# Project Pizzeria

## Description
Pizzeria is an application designed to show a catalog of pizzas with ingredients, the client can add ingredients changing the price of the pizza  

## Install instructions
1. run database.sql into PostgreSql
2. unpack pizzeria 
3. run in console composer install
4. go to .env and change line 28 with postgres user and password
5. run in console symfony server:start
6. access http://localhost:8000/

## User guide
- The app shows one grid with the type of pizzas available and description
- Click in the link "shows" to see the details of the pizzas and list of ingredients extra
- In the grid of Ingredients click on the "Add" link to add to the pizza's list of ingrediente and shows the new price
- Clink on "shows" link on the list to reset

## Estructura del proyecto
- /src: Entitys, controllers.
- /public: Styles, Js files
- /templates: twig templates

