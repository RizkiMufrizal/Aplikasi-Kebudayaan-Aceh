<?php

/**
 *
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Mar 29, 2016
 * Time 10:43:04 PM
 * Encoding UTF-8
 * Project Aplikasi-Kebudayaan-Aceh
 * Package Expression package is undefined on line 12, column 14 in Templates/Scripting/PHPClass.php.
 * 
 */
class TarianAceh extends CI_Model {

    public function ambilJumlahTarianAceh() {
        return $this->db->count_all_results('tb_tarian_aceh', FALSE);
    }

    public function ambilTarianAceh($page, $size) {
        return $this->db->get('tb_kuliner-aceh', $size, $page);
    }

    public function simpanTarianAceh($tarianAceh) {
        $this->db->insert('tb_tarian_aceh', $tarianAceh);
    }

    public function ubahTarianAceh($tarianAceh, $idTarianAceh) {
        $this->db->where('id_tarian_aceh', $idTarianAceh);
        $this->db->update('tb_tarian_aceh', $tarianAceh);
    }

    public function hapusTarianAceh($idTarianAceh) {
        $tarianAceh = array(
            'id_tarian_aceh' => $idTarianAceh
        );
        $this->db->delete('tb_tarian_aceh', $tarianAceh);
    }

}
