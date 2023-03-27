<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Form_option {
    public function tipe_berkas($option) {
        $option = array(
            '' => '--',
            0 => 'Bersama',
            1 => 'Pribadi'
        );
        return $option;
    }

    // public function responden($option) {
    //     $CI = & get_instance();
    //     $CI->load->model('db_model');
    //     //$option[''] = 'Jenis Pertanyaan Kuisioner';
    //     $query = $CI->db_model->get('responden', 'nama_perusahaan');
    //     foreach ($query->result() as $data) {
    //         $option[$data->nama_perusahaan] = $data->nama_perusahaan;
    //     }    
    // }

     

}