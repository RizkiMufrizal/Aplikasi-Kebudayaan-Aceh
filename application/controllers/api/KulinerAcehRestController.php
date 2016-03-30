<?php

/**
 *
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Mar 29, 2016
 * Time 10:59:09 PM
 * Encoding UTF-8
 * Project Aplikasi-Kebudayaan-Aceh
 * Package Expression package is undefined on line 12, column 14 in Templates/Scripting/PHPClass.php.
 * 
 */
require APPPATH . '/libraries/REST_Controller.php';

class KulinerAcehRestController extends REST_Controller {

    public function __construct($config = 'rest') {
        parent::__construct($config);
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
        $this->load->model('KulinerAceh');
    }

    public function kuliner_get() {
        $page = $this->query('page');
        $size = $this->query('size');

        $response = array(
            'data_kuliner' => $this->KulinerAceh->ambilKulinerAceh(($page - 1) * $size, $size),
            'jumlah_halaman' => ceil($this->KulinerAceh->ambilJumlahKulinerAceh() / $size)
        );

        $this->response($response, REST_Controller::HTTP_OK);
    }

}
