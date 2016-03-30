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
        $data['kuliner'] = $this->KulinerAceh->ambilKulinerAcehSemua();
        $this->load->view('admin/KulinerView', $data);
    }

    public function tambahKuliner() {
        $this->load->view('admin/KulinerTambahView', array('error' => ' '));
    }

    public function simpanKuliner() {
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

    public function editKulinerAceh($idKulinerAceh) {
        $data['kuliner'] = $this->KulinerAceh->ambilKulinerAcehSatu($idKulinerAceh);
        $this->load->view('admin/KulinerUbahView', $data);
    }

    public function ubahKuliner() {
        $idKuliner = $this->input->post('idKuliner');
        $kuliner = array(
            'judul_kuliner' => $this->input->post('judulKuliner'),
            'gambar_kuliner' => $this->input->post('gambarKuliner'),
            'deskripsi_kuliner' => $this->input->post('deskripsiKuliner')
        );

        $this->KulinerAceh->ubahKulinerAceh($kuliner, $idKuliner);
        redirect('admin/kuliner');
    }

    public function hapusKuliner($idKulinerAceh) {
        $this->KulinerAceh->hapusKulinerAceh($idKulinerAceh);
        redirect('admin/kuliner');
    }

}
