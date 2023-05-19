CREATE OR REPLACE VIEW myfavorite AS

SELECT favorite.* , items.* ,users.users_id FROM favorite
INNER JOIN users ON users.users_id = favorite.favorite_usersid
INNER JOIN items ON items.items_id = favorite.favorite_itemid