<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Conversion {

    public function tipe_berkas($option) {
        $hasil = '--';
        if ($option == '0')
            $hasil = 'Bersama';
        elseif ($option == '1')
            $hasil = 'Pribadi';
        return $hasil;
    }

    public function jenis_berkas($jenis_berkas) {
        $hasil = '--';

        $CI = & get_instance();
        $query = $CI->db_model->get('jenis_berkas', 'jenis_berkas', array('id_jenis_berkas' => $jenis_berkas));
        $hasil = $query->row();
        return $hasil;
    }

}
