<?php 

class movieModel extends coreModel {

    public function deleteMovie($id) {
        $stmt = $this->pdo->prepare("DELETE FROM movies WHERE `id` = :id");
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();

        return $result;
    }


    public function addMovie ($title, $year, $format, $actors) {

        // $stmt = $this->pdo->prepare(
        //     "IF NOT EXISTS (SELECT * FROM movies WHERE `title` = bbbb AND `year` = 2008 and `format` = Blue-Ray and `actors` = actors)
        //     BEGIN
        //     INSERT INTO movies (`title`, `year`, `format`, `actors`) VALUES (:title, :year, :format, :actors)
        //     END"
        // );
        $stmt = $this->pdo->prepare(
            "INSERT INTO movies (`title`, `year`, `format`, `actors`) VALUES (:title, :year, :format, :actors)"
        );
        // var_dump($stmt);
        
        
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':format', $format);
        $stmt->bindParam(':actors', $actors);

        $result = $stmt->execute();
        var_dump($stmt->errorInfo());

        return $result;
    }


    public function checkIfExists ($title, $year, $format, $actors) {

        $stmt = $this->pdo->prepare(
            "SELECT count(*) as cnt FROM movies WHERE `title` = :title AND `year` = :year AND `format` = :format AND `actors` = :actors"
        );
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':format', $format);
        $stmt->bindParam(':actors', $actors);

        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        // var_dump($stmt->errorInfo());
        return $result;

    }



}

?>