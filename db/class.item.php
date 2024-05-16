<?php
class Item {
    public $id;
    public $title;
    public $description;
    public $price;
    public $condition;
    public $sold;
    public $date;
    public $seller;
    public $album;

    public function __construct($id, $title, $description, $price, $condition, $sold, $date, $seller, $album) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->condition = $condition;
        $this->sold = $sold;
        $this->date = $date;
        $this->seller = $seller;
        $this->album = $album;
    }

    static function getItems($db) {
        $query = "SELECT * FROM Item";

        $result = $db->query($query);

        $items = [];

        while ($row = $result->fetch()) {
            $item = new Item($row['ID'], $row['title'], $row['description'], $row['price'], $row['condition'], $row['sold'], $row['date'], $row['seller'], $row['album']);
            $items[] = $item;
        }

        $result->closeCursor();

        return $items;
    }

    static function getItemsByAlbum($db, $albumId) {
        $query = "SELECT * FROM Item WHERE album = :albumId";

        $statement = $db->prepare($query);
        $statement->bindValue(':albumId', $albumId);
        $statement->execute();

        $items = [];

        while ($row = $statement->fetch()) {
            $item = new Item($row['ID'], $row['title'], $row['description'], $row['price'], $row['condition'], $row['sold'], $row['date'], $row['seller'], $row['album']);
            $items[] = $item;
        }

        $statement->closeCursor();

        return $items;
    }
    static function getItemsByUser($db, $userId) {
        $query = "SELECT * FROM Item WHERE seller = :userId";

        $statement = $db->prepare($query);
        $statement->bindValue(':userId', $userId);
        $statement->execute();

        $items = [];

        while ($row = $statement->fetch()) {
            $item = new Item($row['ID'], $row['title'], $row['description'], $row['price'], $row['condition'], $row['sold'], $row['date'], $row['seller'], $row['album']);
            $items[] = $item;
        }

        $statement->closeCursor();

        return $items;
    }
    static function getItemById($db, $itemId) {
        $query = "SELECT * FROM Item WHERE ID = :itemId";

        $statement = $db->prepare($query);
        $statement->bindValue(':itemId', $itemId);
        $statement->execute();

        $row = $statement->fetch();

        $item = new Item($row['ID'], $row['title'], $row['description'], $row['price'], $row['condition'], $row['sold'], $row['date'], $row['seller'], $row['album']);

        $statement->closeCursor();

        return $item;
    }

}
?>