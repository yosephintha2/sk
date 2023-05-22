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

    public function jenis_berkas($option1, $option2) {
        $CI = & get_instance();
        $CI->load->model('db_model');
        //$option[''] = 'Jenis Pertanyaan Kuisioner';
        $query = $CI->db_model->get('jenis_berkas', 'jenis_berkas', array('id_jenis_berkas' => $option1, 'tipe_berkas' => $option2));
        foreach ($query->result() as $data) {
            $option[$data->jenis_berkas] = $data->jenis_berkas;
        }    
    }



     

}