<?php

/**
 *
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Mar 29, 2016
 * Time 10:42:57 PM
 * Encoding UTF-8
 * Project Aplikasi-Kebudayaan-Aceh
 * Package Expression package is undefined on line 12, column 14 in Templates/Scripting/PHPClass.php.
 * 
 */
class MusikAceh extends CI_Model {

    public function ambilJumlahMusikAceh() {
        return $this->db->count_all_results('tb_musik_aceh', FALSE);
    }

    public function ambilMusikAceh($page, $size) {
        return $this->db->get('tb_musik_aceh', $size, $page)->result();
    }

    public function ambilMusikAcehSemua() {
        return $this->db->get('tb_musik_aceh')->result();
    }

    public function ambilMusikAcehSatu($idMusikAceh) {
        $this->db->where('id_musik_aceh', $idMusikAceh);
        return $this->db->get('tb_musik_aceh')->result();
    }

    public function simpanMusikAceh($musikAceh) {
        $this->db->insert('tb_musik_aceh', $musikAceh);
    }

    public function ubahMusikAceh($musikAceh, $idMusikAceh) {
        $this->db->where('id_musik_aceh', $idMusikAceh);
        $this->db->update('tb_musik_aceh', $musikAceh);
    }

    public function hapusMusikAceh($idMusikAceh) {
        $musikAceh = array(
            'id_musik_aceh' => $idMusikAceh
        );
        $this->db->delete('tb_musik_aceh', $musikAceh);
    }

}
