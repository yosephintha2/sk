<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Conversion {
    public function tipe_berkas($option) {
         // switch ($option) {
         //    case '0' : $hasil = "Bersama";
         //        break;
         //    case '1' : $hasil = "Pribadi";
         //        break;
         //    default: $hasil = "--";
         // }

        $hasil = '--';
        if($option == '0')
            $hasil = 'Bersama';
        elseif($option == '1')
            $hasil = 'Pribadi';
        return $hasil;
    }

    // public function pengguna_group($option) {
    //     $CI = & get_instance();
    //     $CI->load->model('db_model');

    //     $query = $CI->db_model->get('pengguna_group', 'nama', array('id_pengguna_group' => $option));
    //     $row = $query->row();
    //     $hasil = $row->nama;
    //     return $hasil;
    // }

    // public function jenis_survey($option) {
    //     $CI = & get_instance();
    //     $CI->load->model('db_model');

    //     $query = $CI->db_model->get('survey', 'nama_survey', array('id_survey' => $option));
    //     $row = $query->row();
    //     $hasil = isset($row->nama_survey) ? $row->nama_survey : '-';
    //     return $hasil;
    // }

    // public function jenis_kategori($option) {
    //     $CI = & get_instance();
    //     $CI->load->model('db_model');

    //     $query = $CI->db_model->get('kategori', 'kategori', array('id_kategori' => $option));
    //     $row = $query->row();
    //     $hasil = isset($row->kategori) ? $row->kategori : '-';
    //     return $hasil;
    // }

}
