<?php 

class searchModel extends coreModel {

    public function searchByActor($actorName) {

        $stmt = $this->pdo->prepare("SELECT * FROM movies WHERE `actors` LIKE :actor");
        $stmt->bindParam(':actor', $actorName);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }

    public function searchByMovie($movieName) {

        $stmt = $this->pdo->prepare("SELECT * FROM movies WHERE `title` like :title");

        $stmt->bindParam(':title', $movieName);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }

}