<<<<<<< HEAD
-- For a insert
DELIMITER $$
CREATE TRIGGER `before_insert` BEFORE INSERT ON `products` FOR EACH ROW 

BEGIN

    INSERT INTO history

    SET meth  = 'INSERT',
    id_prod =  new.id,
    image = new.image,
    name = new.name,
    price = new.price,
    comments = new.comments;

END

$$

DELIMITER ;

-- For a delete
DELIMITER $$
CREATE TRIGGER `after_delete` AFTER DELETE ON `products` 

FOR EACH ROW 

BEGIN

    INSERT INTO history

    SET meth  = 'DELETE',
    id_prod =  old.id,
    image = old.image,
    name = old.name,
    price = old.price,
    comments = old.comments;


END

$$

DELIMITER ;

-- For an update
DELIMITER $$
CREATE TRIGGER `after_edit` AFTER UPDATE ON `products` 

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

=======
-- For a insert
DELIMITER $$
CREATE TRIGGER `before_insert` BEFORE INSERT ON `products` FOR EACH ROW 

BEGIN

    INSERT INTO history

    SET meth  = 'INSERT',
    id_prod =  new.id,
    image = new.image,
    name = new.name,
    price = new.price,
    comments = new.comments;

END

$$

DELIMITER ;

-- For a delete
DELIMITER $$
CREATE TRIGGER `after_delete` AFTER DELETE ON `products` 

FOR EACH ROW 

BEGIN

    INSERT INTO history

    SET meth  = 'DELETE',
    id_prod =  old.id,
    image = old.image,
    name = old.name,
    price = old.price,
    comments = old.comments;


END

$$

DELIMITER ;

-- For an update
DELIMITER $$
CREATE TRIGGER `after_edit` AFTER UPDATE ON `products` 

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

>>>>>>> 17ff0de875dfc488fd68682aba9029dac8242080
DELIMITER ;