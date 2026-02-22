<?php
require_once __DIR__."/Welcome.php";
class Student extends Welcome
{
    public function __construct() {
        parent::__construct();
    }   
    public function index()
    {
        try {
            $this->load->view("oke");
            echo $this->helloApp();
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
