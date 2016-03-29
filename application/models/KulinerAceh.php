<?php

/**
 *
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Mar 29, 2016
 * Time 10:42:49 PM
 * Encoding UTF-8
 * Project Aplikasi-Kebudayaan-Aceh
 * Package Expression package is undefined on line 12, column 14 in Templates/Scripting/PHPClass.php.
 * 
 */
class KulinerAceh extends CI_Model {

    public function ambilJumlahKulinerAceh() {
        return $this->db->count_all_results('tb_kuliner_aceh', FALSE);
    }

    public function ambilKulinerAceh($page, $size) {
        return $this->db->get('tb_kuliner_aceh', $size, $page);
    }

    public function simpanKulinerAceh($kulinerAceh) {
        $this->db->insert('tb_kuliner_aceh', $kulinerAceh);
    }

    public function ubahKulinerAceh($kulinerAceh, $idKulinerAceh) {
        $this->db->where('id_kuliner_aceh', $idKulinerAceh);
        $this->db->update('tb_kuliner_aceh', $kulinerAceh);
    }

    public function hapusKulinerAceh($idKulinerAceh) {
        $kulinerAceh = array(
            'id_kuliner_aceh' => $idKulinerAceh
        );
        $this->db->delete('tb_kuliner_aceh', $kulinerAceh);
    }

}
