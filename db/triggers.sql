-- Trigger to increment quantity when a new item is inserted
CREATE TRIGGER increment_album_quantity_trigger
AFTER INSERT ON Item
BEGIN
    UPDATE Album
    SET quantity = quantity + 1
    WHERE ID = NEW.album;
END;

-- Trigger to decrement quantity when an item is deleted
CREATE TRIGGER decrement_album_quantity_trigger
AFTER DELETE ON Item
BEGIN
    UPDATE Album
    SET quantity = quantity - 1
    WHERE ID = OLD.album;
END;

-- Trigger to update average price when a new item is inserted
CREATE TRIGGER update_album_average_price_insert_trigger
AFTER INSERT ON Item
BEGIN
    UPDATE Album
    SET averagePrice = (
        (averagePrice * quantity + NEW.price) / (quantity + 1)
    )
    WHERE ID = NEW.album;
END;

-- Trigger to update average price when an item is deleted
CREATE TRIGGER update_album_average_price_delete_trigger
AFTER DELETE ON Item
BEGIN
    UPDATE Album
    SET averagePrice = (
        (averagePrice * quantity - OLD.price) / (quantity - 1)
    )
    WHERE ID = OLD.album AND quantity > 1;
END;
