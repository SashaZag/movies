<?php 

class movieModel extends coreModel {

    public function deleteMovie($id) {
        $stmt = $this->pdo->prepare("DELETE FROM movies WHERE `id` = :id");
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();

        return $result;

    }


    public function addMovie ($title, $year, $format, $actors) {

        $stmt = $this->pdo->prepare("INSERT INTO movies (`title`, `year`, `format`, `actors`) VALUES (:title, :year, :format, :actors)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':format', $format);
        $stmt->bindParam(':actors', $actors);

        $result = $stmt->execute();

        return $result;


    }


}

?>