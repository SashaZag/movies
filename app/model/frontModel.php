<?php 

class showModel extends coreModel {

    public function showByAlphabet($offset, $itemsOnPage) {

        $stmt = $this->pdo->prepare("SELECT * FROM movies ORDER BY `title` LIMIT $itemsOnPage OFFSET $offset");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rowNum = array('count' => $stmt->rowCount());
        // array_push($result, $rowNum);
        return $result;
    }

    public function allRecords() {

        $stmt = $this->pdo->prepare("SELECT count(id) as num FROM movies");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

}