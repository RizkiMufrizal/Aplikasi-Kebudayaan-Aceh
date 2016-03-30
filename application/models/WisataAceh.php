<?php

/**
 *
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Mar 29, 2016
 * Time 10:43:13 PM
 * Encoding UTF-8
 * Project Aplikasi-Kebudayaan-Aceh
 * Package Expression package is undefined on line 12, column 14 in Templates/Scripting/PHPClass.php.
 * 
 */
class WisataAceh extends CI_Model {

    public function ambilJumlahWisataAceh() {
        return $this->db->count_all_results('tb_wisata_aceh', FALSE);
    }

    public function ambilWisataAceh($page, $size) {
        return $this->db->get('tb_wisata_aceh', $size, $page)->result();
    }

    public function ambilWisataAcehSemua() {
        return $this->db->get('tb_wisata_aceh')->result();
    }

    public function ambilWisataAcehSatu($idWisataAceh) {
        $this->db->where('id_wisata_aceh', $idWisataAceh);
        return $this->db->get('tb_wisata_aceh')->result();
    }

    public function simpanWisataAceh($wisataAceh) {
        $this->db->insert('tb_wisata_aceh', $wisataAceh);
    }

    public function ubahWisataAceh($wisataAceh, $idWisataAceh) {
        $this->db->where('id_wisata_aceh', $idWisataAceh);
        $this->db->update('tb_wisata_aceh', $wisataAceh);
    }

    public function hapusWisataAceh($idWisataAceh) {
        $wisataAceh = array(
            'id_wisata_aceh' => $idWisataAceh
        );
        $this->db->delete('tb_wisata_aceh', $wisataAceh);
    }

}
