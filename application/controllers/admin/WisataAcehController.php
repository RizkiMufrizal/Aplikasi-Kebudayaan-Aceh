<?php

/**
 *
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Mar 30, 2016
 * Time 6:51:36 PM
 * Encoding UTF-8
 * Project Aplikasi-Kebudayaan-Aceh
 * Package Expression package is undefined on line 12, column 14 in Templates/Scripting/PHPClass.php.
 * 
 */
class WisataAcehController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('WisataAceh');
        $this->gambarPath = realpath(APPPATH . '../uploads/gambar/');
        $this->gambarPathUrl = base_url() . 'upload.';
    }

    public function index() {
        $session = $this->session->userdata('isLogin');

        if ($session == FALSE) {
            redirect('admin/login');
        } else {
            $data['wisata'] = $this->WisataAceh->ambilWisataAcehSemua();
            $this->load->view('admin/WisataView', $data);
        }
    }

    public function tambahWisata() {
        $session = $this->session->userdata('isLogin');

        if ($session == FALSE) {
            redirect('admin/login');
        } else {
            $this->load->view('admin/WisataTambahView', array(
                'error' => ' ',
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            ));
        }
    }

    public function simpanWisata() {
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
                $this->load->view('admin/WisataTambahView', $error);
            } else {
                $wisata = array(
                    'id_wisata_aceh' => $this->uuid->v4(),
                    'judul_wisata' => $this->input->post('judulWisata'),
                    'gambar_wisata' => $this->upload->file_name,
                    'deskripsi_wisata' => $this->input->post('deskripsiWisata')
                );

                $this->WisataAceh->simpanWisataAceh($wisata);
                redirect('admin/wisata');
            }
        }
    }

    public function editWisataAceh($idWisataAceh) {
        $session = $this->session->userdata('isLogin');

        if ($session == FALSE) {
            redirect('admin/login');
        } else {
            $data = array(
                'wisata' => $this->WisataAceh->ambilWisataAcehSatu($idWisataAceh),
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            );

            $this->load->view('admin/WisataUbahView', $data);
        }
    }

    public function ubahWisata() {
        $session = $this->session->userdata('isLogin');

        if ($session == FALSE) {
            redirect('admin/login');
        } else {
            $idWisata = $this->input->post('idWisata');
            $wisata = array(
                'judul_wisata' => $this->input->post('judulWisata'),
                'gambar_wisata' => $this->input->post('gambarWisata'),
                'deskripsi_wisata' => $this->input->post('deskripsiWisata')
            );

            $this->WisataAceh->ubahWisataAceh($wisata, $idWisata);
            redirect('admin/wisata');
        }
    }

    public function hapusWisata($idWisataAceh) {
        $session = $this->session->userdata('isLogin');

        if ($session == FALSE) {
            redirect('admin/login');
        } else {
            $this->WisataAceh->hapusWisataAceh($idWisataAceh);
            redirect('admin/wisata');
        }
    }

}
