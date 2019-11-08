<?php 

class fileModel extends CoreModel {

    public function insertFromFile (array $movie) {

        $this->pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        
        //forming db insertion        
        $stmt = $this->pdo->prepare("INSERT INTO movies (`title`,`year`, `format`, `actors`) VALUES (:title, :year, :format, :actors)");
        
        //binding params
        $stmt->bindParam(':title', $movie[0]);
        $stmt->bindParam(':year', $movie[1]);
        $stmt->bindParam(':format', $movie[2]);
        $stmt->bindParam(':actors', $movie[3]);

        return $stmt->execute();
    }

}

?>