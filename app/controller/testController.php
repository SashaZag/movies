<?php 

class testController extends coreController {

    public function testAction () {

        $this->render('testView', 'testModel');

    }

}