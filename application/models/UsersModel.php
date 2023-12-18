<?php 

class UsersModel extends CI_Model {
    public function getUserByEmail($email) {
        return $this->db->get_where('users', ['email' => $email])->row_array();
    }
}

?>