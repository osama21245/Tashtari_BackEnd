CREATE OR REPLACE VIEW myfavorite AS

SELECT favorite.* , items.* ,users.users_id FROM favorite
INNER JOIN users ON users.users_id = favorite.favorite_usersid
INNER JOIN items ON items.items_id = favorite.favorite_itemid

CREATE OR REPLACE VIEW  items1view AS
SELECT items.* , categories.* FROM items 
INNER JOIN  categories on  items.items_cat = categories.categories_id ; 



CREATE OR REPLACE VIEW myfavorite AS
SELECT favorite.* , items.* , users.users_id FROM favorite 
INNER JOIN users ON users.users_id  = favorite.favorite_usersid
INNER JOIN items ON items.items_id  = favorite.favorite_itemsid



CREATE or REPLACE VIEW cartitems as 
SELECT SUM(items.items_price - items.items_price * items_discount / 100) as itemsprice  , COUNT(cart.cart_itemsid) as countitems , cart.* , items.* FROM cart 
INNER JOIN items ON items.items_id = cart.cart_itemsid
WHERE cart_orders = 0 
GROUP BY cart.cart_itemsid , cart.cart_usersid , cart.cart_orders ;


CREATE  or REPLACE view ordersview AS 
SELECT orders.* , address.* FROM orders 
LEFT JOIN address ON address.address_id = orders.orders_address ; 


CREATE or REPLACE VIEW ordersdetailsview as 
SELECT SUM(items.items_price - items.items_price * items_discount / 100) as itemsprice  , COUNT(cart.cart_itemid) as countitems , cart.* , items.* ,ordersview.* FROM cart 
INNER JOIN ordersview ON ordersview.orders_id = cart.cart_orders
INNER JOIN items ON items.items_id = cart.cart_itemid
WHERE cart_orders != 0 
GROUP BY cart.cart_itemid , cart.cart_usersid , cart.cart_orders ;


CREATE or REPLACE VIEW itemstopselling AS 
SELECT COUNT(cart_id) as countitems , cart.* , items.*  , (items_price - (items_price * items_discount / 100 ))  as itemspricediscount  FROM cart 
INNER JOIN items ON items.items_id = cart.cart_itemsid
WHERE cart_orders != 0 
GROUP by cart_itemsid   ; 

CREATE or REPLACE view ordersview as 
SELECT orders.* , adress.* FROM adress 
RIGHT JOIN orders ON orders.orders_address = adress.address_id


 
 


 
 



 

 "1=1 AND orders_status = 2 OR (orders_status = 3 AND orders_deliveryman = $deliverymanID) "