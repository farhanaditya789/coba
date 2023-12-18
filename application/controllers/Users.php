<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    
    public function index() {
        echo('SELAMAT DATANG USERS!');
    }

    public function getUser() {
        $this->load->model('UsersModel');
        $data = $this->UsersModel->getUsers()->result();

        print_r($data);
    }
}

?>