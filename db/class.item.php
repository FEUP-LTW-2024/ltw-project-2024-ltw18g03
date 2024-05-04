<?php
class Item {
    public $id;
    public $title;
    public $description;
    public $price;
    public $condition;
    public $date;
    public $seller;
    public $album;

    public function __construct($id, $title, $description, $price, $condition, $date, $seller, $album) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->condition = $condition;
        $this->date = $date;
        $this->seller = $seller;
        $this->album = $album;
    }

    static function getItems($db) {
        $query = "SELECT * FROM Item";

        $result = $db->query($query);

        $items = [];

        while ($row = $result->fetch()) {
            $item = new Item($row['ID'], $row['title'], $row['description'], $row['price'], $row['condition'], $row['date'], $row['seller'], $row['album']);
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
            $item = new Item($row['ID'], $row['title'], $row['description'], $row['price'], $row['condition'], $row['date'], $row['seller'], $row['album']);
            $items[] = $item;
        }

        $statement->closeCursor();

        return $items;
    }

}
?>