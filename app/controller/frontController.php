<?php 

class frontController extends coreController {

    public function uploadAction () {

        $this->render('uploadFile');

    }


    public function allAction () {

        $this->model = new showModel;
        $data = $this->model->showByAlphabet();

        return $this->render('show', $data);
    }

}

?>