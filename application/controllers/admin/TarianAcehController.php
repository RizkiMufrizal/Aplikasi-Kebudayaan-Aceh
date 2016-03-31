<?php

/**
 *
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Mar 30, 2016
 * Time 6:51:27 PM
 * Encoding UTF-8
 * Project Aplikasi-Kebudayaan-Aceh
 * Package Expression package is undefined on line 12, column 14 in Templates/Scripting/PHPClass.php.
 * 
 */
class TarianAcehController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('TarianAceh');
        $this->videoPath = realpath(APPPATH . '../uploads/video/');
        $this->videoPathUrl = base_url() . 'upload.';
    }

    public function index() {
        $session = $this->session->userdata('isLogin');

        if ($session == FALSE) {
            redirect('admin/login');
        } else {
            $data['tarian'] = $this->TarianAceh->ambilTarianAcehSemua();
            $this->load->view('admin/TarianView', $data);
        }
    }

    public function tambahTarian() {
        $session = $this->session->userdata('isLogin');

        if ($session == FALSE) {
            redirect('admin/login');
        } else {
            $this->load->view('admin/TarianTambahView', array('error' => ' '));
        }
    }

    public function simpanTarian() {
        $session = $this->session->userdata('isLogin');

        if ($session == FALSE) {
            redirect('admin/login');
        } else {
            $namaFile = $this->uuid->v4();
            $config['upload_path'] = $this->videoPath;
            $config['allowed_types'] = 'gif|jpg|png|mp4';
            $config['max_size'] = 102400;
            $config['file_name'] = $namaFile;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('video')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('admin/TarianTambahView', $error);
            } else {
                $tarian = array(
                    'id_tarian_aceh' => $this->uuid->v4(),
                    'judul_tarian' => $this->input->post('judulTarian'),
                    'video_tarian' => $this->upload->file_name,
                    'deskripsi_tarian' => $this->input->post('deskripsiTarian')
                );

                $this->TarianAceh->simpanTarianAceh($tarian);
                redirect('admin/tarian');
            }
        }
    }

    public function editTarianAceh($idTarianAceh) {
        $session = $this->session->userdata('isLogin');

        if ($session == FALSE) {
            redirect('admin/login');
        } else {
            $data['tarian'] = $this->TarianAceh->ambilTarianAcehSatu($idTarianAceh);
            $this->load->view('admin/TarianUbahView', $data);
        }
    }

    public function ubahTarian() {
        $session = $this->session->userdata('isLogin');

        if ($session == FALSE) {
            redirect('admin/login');
        } else {
            $idTarian = $this->input->post('idTarian');
            $tarian = array(
                'judul_tarian' => $this->input->post('judulTarian'),
                'video_tarian' => $this->input->post('videoTarian'),
                'deskripsi_tarian' => $this->input->post('deskripsiTarian')
            );

            $this->TarianAceh->ubahTarianAceh($tarian, $idTarian);
            redirect('admin/tarian');
        }
    }

    public function hapusTarian($idTarianAceh) {
        $session = $this->session->userdata('isLogin');

        if ($session == FALSE) {
            redirect('admin/login');
        } else {
            $this->TarianAceh->hapusTarianAceh($idTarianAceh);
            redirect('admin/tarian');
        }
    }

}
