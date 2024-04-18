<?php
class Album {
    public $id;
    public $title;
    public $artist;
    public $songs;
    public $yearOfRelease;
    public $cover;
    public $genre;
    public $rym;
    public $quantity;
    public $averagePrice;

    public function __construct($id, $title, $artist, $songs, $yearOfRelease, $cover, $genre, $rym, $quantity, $averagePrice) {
        $this->id = $id;
        $this->title = $title;
        $this->artist = $artist;
        $this->songs = $songs;
        $this->yearOfRelease = $yearOfRelease;
        $this->cover = $cover;
        $this->genre = $genre;
        $this->rym = $rym;
        $this->quantity = $quantity;
        $this->averagePrice = $averagePrice;
    }

    // You can also add methods here to perform operations related to albums
    function getAlbums($db) {
        // Query to retrieve albums from the database
        $query = "SELECT * FROM Album";
    
        // Execute the query
        $result = $db->query($query);
    
        // Initialize an empty array to store albums
        $albums = [];
    
        // Fetch albums from the result set
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            // Create an Album object for each row and add it to the albums array
            $album = new Album($row['ID'], $row['title'], $row['artist'], $row['songs'], $row['yearOfRelease'], $row['cover'], $row['genre'], $row['rym'], $row['quantity'], $row['averagePrice']);
            $albums[] = $album;
        }
    
        // Close the result set
        $result->finalize();
    
        // Return the array of albums
        return $albums;
    }
    
}
