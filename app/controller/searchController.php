<?php 

class searchController extends coreController {

    public $actorName, $movieName;


    public function formAction() {

        return $this->render('searchform');

    }


    public function searchAction() {


        switch($_POST['type']){
            case('actor'): 
                $this->nameAction();
                break;
            case('movie'): 
                $this->movieAction();
                break;
            default: die('Not found');
        }

    }


    public function nameAction () { 

        $this->actorName = $_POST['value'];
        $this->model = new searchModel;

        $data = $this->model->searchByActor('%'.$this->actorName.'%');
        if(empty($data)) {
            return $this->render('infoPage', array('mess' => 'No movie with such actor founded'));
        }
        return $this->render('searchresult', $data);

    }

    public function movieAction () {
        $this->movieName = $_POST['value'];
        $this->model = new searchModel;

        $data = $this->model->searchByMovie($this->movieName);

        if(empty($data)) {
            return $this->render('infoPage', array('mess' => 'No such movie founded'));
        }

        return $this->render('searchresult', $data);


    }


}