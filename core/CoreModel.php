<?php 

class coreModel {

    public $pdo;

    public function __construct() { 

        $this->pdo = new PDO ('mysql:host=localhost;dbname=moviestask', 'root', '');

    }

}