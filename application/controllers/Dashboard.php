<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $title['page_title'] = 'Kapatuli | Admin Dashboard';
		
        // Check user role and load the corresponding view
		$data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('template/meta', $title);
		$this->load->view('template/navbar', $data);
        
        $roles_id = $this->session->userdata('roles_id');
        switch ($roles_id) {
            case 1:
                $this->load->view('dashboard/superadmin/index');
                break;
            case 2:
                $this->load->view('dashboard/admin/index');
                break;
            case 3:
                $this->load->view('dashboard/employee/index');
                break;
            default:
                // Handle other roles or unauthorized access
                redirect('auth');
                break;
        }
        $this->load->view('template/footer');
    }
}
