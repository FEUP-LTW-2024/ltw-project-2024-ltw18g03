<?php
class Mail {
    public $idMail;
    public $senderID;
    public $receiverID;
    public $itemID;
    public $title;
    public $content;
    public $timest;

    public function __construct($idMail, $senderID, $receiverID, $itemID, $title, $content, $timest) {
        $this->idMail = $idMail;
        $this->senderID = $senderID;
        $this->receiverID = $receiverID;
        $this->itemID = $itemID;
        $this->title = $title;
        $this->content = $content;
        $this->timest = $timest;
    }

    static function getReceivedMails($db, $receiverID) {
        $query = "SELECT * FROM Mail WHERE receiverID = :receiverID";

        $statement = $db->prepare($query);
        $statement->bindValue(':receiverID', $receiverID);
        $statement->execute();

        $mails = [];

        while ($row = $statement->fetch()) {
            $mail = new Mail($row['idMail'], $row['senderID'], $row['receiverID'], $row['itemID'], $row['title'], $row['content'], $row['timest']);
            $mails[] = $mail;
        }

        $statement->closeCursor();

        return $mails;
    }
    static function getSentMails($db, $senderID) {
        $query = "SELECT * FROM Mail WHERE senderID = :senderID";

        $statement = $db->prepare($query);
        $statement->bindValue(':senderID', $senderID);
        $statement->execute();

        $mails = [];

        while ($row = $statement->fetch()) {
            $mail = new Mail($row['idMail'], $row['senderID'], $row['receiverID'], $row['itemID'], $row['title'], $row['content'], $row['timest']);
            $mails[] = $mail;
        }

        $statement->closeCursor();

        return $mails;
    }

    
}
?>