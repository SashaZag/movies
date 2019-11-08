<?php 

class coreController {

    public $view, $model;

    public function render($view, $data = null) {
        
        //render view with data

        // $this->view = $view;
        // $this->model = $model;
        include_once ('app/view/'.$view.'.phtml');
        return $data;

    }

}