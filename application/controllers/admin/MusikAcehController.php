<?php

/**
 *
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Mar 30, 2016
 * Time 6:51:17 PM
 * Encoding UTF-8
 * Project Aplikasi-Kebudayaan-Aceh
 * Package Expression package is undefined on line 12, column 14 in Templates/Scripting/PHPClass.php.
 * 
 */
class MusikAcehController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MusikAceh');
        $this->musikPath = realpath(APPPATH . '../uploads/musik/');
        $this->musikPathUrl = base_url() . 'upload.';
    }

    public function index() {
        $session = $this->session->userdata('isLogin');

        if ($session == FALSE) {
            redirect('admin/login');
        } else {
            $data['musik'] = $this->MusikAceh->ambilMusikAcehSemua();
            $this->load->view('admin/MusikView', $data);
        }
    }

    public function tambahMusik() {
        $session = $this->session->userdata('isLogin');

        if ($session == FALSE) {
            redirect('admin/login');
        } else {
            $this->load->view('admin/MusikTambahView', array('error' => ' '));
        }
    }

    public function simpanMusik() {
        $session = $this->session->userdata('isLogin');

        if ($session == FALSE) {
            redirect('admin/login');
        } else {
            $namaFile = $this->uuid->v4();
            $config['upload_path'] = $this->musikPath;
            $config['allowed_types'] = 'mp3';
            $config['max_size'] = 20480;
            $config['file_name'] = $namaFile;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('musik')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('admin/MusikTambahView', $error);
            } else {
                $musik = array(
                    'id_musik_aceh' => $this->uuid->v4(),
                    'judul_musik' => $this->input->post('judulMusik'),
                    'musik_aceh' => $this->upload->file_name,
                    'deskripsi_musik' => $this->input->post('deskripsiMusik')
                );

                $this->MusikAceh->simpanMusikAceh($musik);
                redirect('admin/musik');
            }
        }
    }

    public function editMusikAceh($idMusikAceh) {
        $session = $this->session->userdata('isLogin');

        if ($session == FALSE) {
            redirect('admin/login');
        } else {
            $data['musik'] = $this->MusikAceh->ambilMusikAcehSatu($idMusikAceh);
            $this->load->view('admin/MusikUbahView', $data);
        }
    }

    public function ubahMusik() {
        $session = $this->session->userdata('isLogin');

        if ($session == FALSE) {
            redirect('admin/login');
        } else {
            $idMusik = $this->input->post('idMusik');
            $musik = array(
                'judul_musik' => $this->input->post('judulMusik'),
                'musik_aceh' => $this->input->post('musikAceh'),
                'deskripsi_musik' => $this->input->post('deskripsiMusik')
            );

            $this->MusikAceh->ubahMusikAceh($musik, $idMusik);
            redirect('admin/musik');
        }
    }

    public function hapusMusik($idMusikAceh) {
        $session = $this->session->userdata('isLogin');

        if ($session == FALSE) {
            redirect('admin/login');
        } else {
            $this->MusikAceh->hapusMusikAceh($idMusikAceh);
            redirect('admin/musik');
        }
    }

}
