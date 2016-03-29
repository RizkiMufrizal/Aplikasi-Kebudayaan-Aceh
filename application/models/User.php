<?php

/**
 *
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Mar 29, 2016
 * Time 10:43:20 PM
 * Encoding UTF-8
 * Project Aplikasi-Kebudayaan-Aceh
 * Package Expression package is undefined on line 12, column 14 in Templates/Scripting/PHPClass.php.
 * 
 */
class User extends CI_Model {

    public function ambilUserUntukLogin($email) {
        $this->db->where('email', $email);
        $this->db->select('password');
        return $this->db->get('tb_user')->result();
    }

}
