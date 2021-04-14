<?php

class Index extends Controller
{
    function __Construct()
    {
    }

    function index()
    {
        $this->view('index/index');
    }
}
?>