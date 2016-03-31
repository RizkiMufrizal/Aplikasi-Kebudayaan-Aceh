<?php

/**
 *
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Mar 30, 2016
 * Time 6:51:43 PM
 * Encoding UTF-8
 * Project Aplikasi-Kebudayaan-Aceh
 * Package Expression package is undefined on line 12, column 14 in Templates/Scripting/PHPClass.php.
 * 
 */
class UserController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User');
    }

    public function halamanUser() {
        $this->load->view('admin/UserView', array('error' => NULL));
    }

    public function prosesLogin() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->User->ambilUserUntukLogin($email);

        if (sizeof($user) == 0) {
            $error = array('error' => 'anda belum melakukan registrasi');
            $this->load->view('admin/UserView', $error);
        } else {
            if ($this->bcrypt->check_password($password, $user[0]->password)) {
                $this->session->set_userdata(array(
                    'isLogin' => TRUE,
                    'username' => $email
                ));
                redirect('admin');
            } else {
                $error = array('error' => 'username dan password anda salah');
                $this->load->view('admin/UserView', $error);
            }
        }
    }

    public function prosesLogout() {
        $this->session->unset_userdata(array('isLogin', 'username'));
        redirect('admin/login');
    }

}
