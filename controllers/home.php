<?php

class Home extends Controller
{
    public $checkLogin = '';


    function __Construct()
    {
        
    }

    public function index()
    {
        $personInfo = $this->model->getPersonInfo();
        $values=[$personInfo];
        $this->view('home/index', $values, 'no', 'no');
    }

    public function addperson()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $form = $_POST;
            $personInfo = $this->model->getPersonInfo();
            $errorInfos = $this->model->checkInput($form);
            $values=[$personInfo,$errorInfos];
            if (sizeof($errorInfos) > 0) {
                $this->view('home/index', $values, 'no', 'no');
            }else{
                $this->model->putPerson($form);
                header('location:' . URL . 'home/index');
            }
        }
    }

    public function delete($id="")
    {
        if(isset($_POST['delete_group'])){
            $deletes=$_POST['delete_group'];
            foreach ($deletes as $delete){
                $done = $this->model->personDelete($delete);
                header('location:' . URL . 'home/index');
            }
        }
        $done = $this->model->personDelete($id);
        header('location:' . URL . 'home/index');
    }

    public function sort($id)
    {
        $personInfo = $this->model->columSort($id);
        $values=[$personInfo];
        $this->view('home/index', $values, 'no', 'no');
    }


}
