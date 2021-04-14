<?php

class Edit extends Controller
{
    function __Construct()
    {
        Model::sessionInit();
        $this->checkLogin = Model::sessionGet('userId');
        if ($this->checkLogin == false) {
            header('location:' . URL . 'index');
        }
    }

    public function index($id)
    {
        $personInfo = $this->model->getPersonToUpdate($id);

        $values=[$personInfo];
        $this->view('edit/index',$personInfo,  'no', 'no');
    }

    public function update($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $form = $_POST;
            $alert=$this->model->updatePerson($form,$id);
            header('location:' . URL . 'home/index');
        }
    }
}
