<?php 

class showModel extends coreModel {

    public function showByAlphabet() {

        $stmt = $this->pdo->prepare("SELECT * FROM movies ORDER BY `title`");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}