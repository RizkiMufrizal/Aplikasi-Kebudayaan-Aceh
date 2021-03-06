<?php

/**
 *
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Mar 30, 2016
 * Time 6:51:10 PM
 * Encoding UTF-8
 * Project Aplikasi-Kebudayaan-Aceh
 * Package Expression package is undefined on line 12, column 14 in Templates/Scripting/PHPClass.php.
 * 
 */
class KulinerAcehController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('KulinerAceh');
        $this->gambarPath = realpath(APPPATH . '../uploads/gambar/');
        $this->gambarPathUrl = base_url() . 'upload.';
    }

    public function index() {
        $session = $this->session->userdata('isLogin');

        if ($session == FALSE) {
            redirect('admin/login');
        } else {
            $data['kuliner'] = $this->KulinerAceh->ambilKulinerAcehSemua();
            $this->load->view('admin/KulinerView', $data);
        }
    }

    public function tambahKuliner() {
        $session = $this->session->userdata('isLogin');

        if ($session == FALSE) {
            redirect('admin/login');
        } else {
            $this->load->view('admin/KulinerTambahView', array(
                'error' => ' ',
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            ));
        }
    }

    public function simpanKuliner() {
        $session = $this->session->userdata('isLogin');

        if ($session == FALSE) {
            redirect('admin/login');
        } else {
            $namaFile = $this->uuid->v4();
            $config['upload_path'] = $this->gambarPath;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2000;
            $config['file_name'] = $namaFile;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('admin/KulinerTambahView', $error);
            } else {
                $kuliner = array(
                    'id_kuliner_aceh' => $this->uuid->v4(),
                    'judul_kuliner' => $this->input->post('judulKuliner'),
                    'gambar_kuliner' => $this->upload->file_name,
                    'deskripsi_kuliner' => $this->input->post('deskripsiKuliner')
                );

                $this->KulinerAceh->simpanKulinerAceh($kuliner);
                redirect('admin/kuliner');
            }
        }
    }

    public function editKulinerAceh($idKulinerAceh) {
        $session = $this->session->userdata('isLogin');

        if ($session == FALSE) {
            redirect('admin/login');
        } else {
            $data = array(
                'kuliner' => $this->KulinerAceh->ambilKulinerAcehSatu($idKulinerAceh),
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            );
            $this->load->view('admin/KulinerUbahView', $data);
        }
    }

    public function ubahKuliner() {
        $session = $this->session->userdata('isLogin');

        if ($session == FALSE) {
            redirect('admin/login');
        } else {
            $idKuliner = $this->input->post('idKuliner');
            $kuliner = array(
                'judul_kuliner' => $this->input->post('judulKuliner'),
                'gambar_kuliner' => $this->input->post('gambarKuliner'),
                'deskripsi_kuliner' => $this->input->post('deskripsiKuliner')
            );

            $this->KulinerAceh->ubahKulinerAceh($kuliner, $idKuliner);
            redirect('admin/kuliner');
        }
    }

    public function hapusKuliner($idKulinerAceh) {
        $session = $this->session->userdata('isLogin');

        if ($session == FALSE) {
            redirect('admin/login');
        } else {
            $this->KulinerAceh->hapusKulinerAceh($idKulinerAceh);
            redirect('admin/kuliner');
        }
    }

}
