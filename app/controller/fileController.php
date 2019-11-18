<?php 

class fileController extends coreController {

    public $path;

    public function saveAction() {
        $tmp = $_FILES['image']['tmp_name'];
        $realName = $_FILES['image']['name'];


        $this->path = 'app/uploadedData/files/'.$realName;

        move_uploaded_file($tmp, $this->path);

        $this->handle();
    }

    public function handle () {
        $this->model = new fileModel;
        $file = fopen($this->path, 'r');
        $this->model = new fileModel;
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        if (!preg_match("/^.*\.txt$/", $fileName) || $fileSize == 0) {
            return $this->render('infoPage', array('mess' => 'Incorrect format or file is empty'));
        }

        while(!feof($file)) {
            $movie = array();
            for ($i = 0; $i <= 3; $i++){

                $new = fgets($file);

                $new = trim($new);
                var_dump($new);
                if(empty($new)) {
                    break;
                }
                var_dump($new);
                
                $arr = explode(":", $new);
                
                echo "<br />";
                
                array_push($movie, trim($arr[1]));
            }

            if(!empty($movie)) $this->model->insertFromFile($movie);
           
        }
        return $this->render('infoPage', array('mess' => 'File loaded successfuly'));
    }

}

?>