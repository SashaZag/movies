<?php 

class movieController extends coreController {



    public function formAction () {

        return $this->render('addform');

    }
    

    public function deleteMovieAction () {
        $this->model = new movieModel;
        $result = $this->model->deleteMovie($_POST['id']);
        if($result == true) {
            return $this->render('infoPage', array('mess' => 'Movie deleted successfuly'));
        } else {
            return $this->render('infoPage', array('mess' => 'Failed to delete movie'));
        }



    }

    public function addMovieAction () {

        $this->model = new movieModel;

        if($_POST['year'] < 1850 || $_POST['year'] > 2020) {
            return $this->render('infoPage', array('mess' => 'Movie release date out of range'));
        }

        $array = explode(", ", $_POST['actors']);
        $uniq = array_unique($array);
        $names = implode(", ", $uniq);
        $result = $this->model->addMovie($_POST['title'], $_POST['year'], $_POST['format'], $names);

        if($result) {
            return $this->render('infoPage', array('mess' => 'Movie added successfuly'));
        } else {
            return $this->render('infoPage', array('mess' => 'Failed to add movie'));
        }

    }


}

?>