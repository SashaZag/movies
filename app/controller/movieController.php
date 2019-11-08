<?php 

class movieController extends coreController {



    public function formAction () {

        return $this->render('addform');

    }
    

    public function deleteMovieAction () {

        echo $_POST['id'];
        $this->model = new movieModel;
        $this->model->deleteMovie($_POST['id']);



    }

    public function addMovieAction () {

        $this->model = new movieModel;

        $this->model->addMovie($_POST['title'], $_POST['year'], $_POST['format'], $_POST['actors']);

        return "Success";

    }


}

?>