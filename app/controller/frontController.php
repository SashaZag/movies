<?php 

class frontController extends coreController {

    public function uploadAction () {

        $this->render('uploadFile');

    }


    public function allAction () {

        $this->model = new showModel;

        $params = $this->paginate();
        // var_dump($params);
        $data = $this->model->showByAlphabet($params['offset'], $params['itemsOnPage']);
        $num = $this->model->allRecords();
        // var_dump($num);
        // extract($num);
        // echo $num;
        $this->render('show', $data, $num);
    }

    public function paginate() {
        $itemsOnPage = 5;

        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = (int) $_GET['page'];
         } else {
            $page = 1;
         }
         
        $offset = ($page - 1) * $itemsOnPage;

        return array('offset' => $offset, 'itemsOnPage' => $itemsOnPage);
    }

}

?>