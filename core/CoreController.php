<?php 

class coreController {

    public $view, $model;

    public function render($view, $data = null, $pages = null) {
        
        //render view with data

        // $this->view = $view;
        // $this->model = $model;
        extract($data);
        extract($pages);
        include_once ('app/view/'.$view.'.phtml');
        // return $data;

    }

}