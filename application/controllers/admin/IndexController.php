<?php

/**
 *
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Mar 30, 2016
 * Time 7:46:39 PM
 * Encoding UTF-8
 * Project Aplikasi-Kebudayaan-Aceh
 * Package Expression package is undefined on line 12, column 14 in Templates/Scripting/PHPClass.php.
 * 
 */
class IndexController extends CI_Controller {

    public function index() {
        $session = $this->session->userdata('isLogin');

        if ($session == FALSE) {
            redirect('admin/login');
        } else {
            $this->load->view('admin/IndexView');
        }
    }

}
