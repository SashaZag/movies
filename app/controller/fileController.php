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
        while(!feof($file)) {
            $movie = array();
            for ($i = 0; $i <= 3; $i++){

                $new = fgets($file);

                $new = trim($new);
                var_dump($new);
                // break;
                if(empty($new)) {
                    echo "breaks";
                    break;
                }
                var_dump($new);
                
                $arr = explode(":", $new);
                
                echo "<br />";
                
                array_push($movie, trim($arr[1]));
            }

            if(!empty($movie)) $this->model->insertFromFile($movie);
           
        }
    }

}

?>