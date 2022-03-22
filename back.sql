-- For a insert
DELIMITER $$
CREATE TRIGGER `back_insert` BEFORE INSERT ON `history` FOR EACH ROW 

BEGIN
    IF meth = 'INSERT' THEN
        DELETE FROM products WHERE id = old.id
    END IF
END

$$

DELIMITER ;

-- For a delete
DELIMITER $$
CREATE TRIGGER `back_delete` AFTER DELETE ON `products` 

FOR EACH ROW 

BEGIN
    IF meth = 'DELETE' THEN
        INSERT INTO products

        SET id_prod =  new.id,
        image = new.image,
        name = new.name,
        price = new.price,
        comments = new.comments;
    END IF
END

$$

DELIMITER ;

-- For an update
DELIMITER $$
CREATE TRIGGER `back_update` AFTER UPDATE ON `products` 

FOR EACH ROW 

BEGIN

    INSERT INTO history

    SET meth  = 'UPDATE',
    id_prod =  old.id,
    image = old.image,
    name = old.name,
    price = old.price,
    comments = old.comments;


END

$$

DELIMITER ;