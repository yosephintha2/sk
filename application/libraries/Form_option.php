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

    /*
      public function tipe_berkas($option) {
      $CI = & get_instance();
      $CI->load->model('db_model');
      //$option[''] = 'Jenis Pertanyaan Kuisioner';
      $query = $CI->db_model->get('jenis_berkas', 'jenis_berkas', array('tipe_berkas' => $option));
      foreach ($query->result() as $data) {
      $option[$data->jenis_berkas] = $data->jenis_berkas;
      }
      return $option;
      }
     */

    public function list_user() {
        $CI = & get_instance();
        $CI->load->model('db_model');
        //$option[''] = 'Jenis Pertanyaan Kuisioner';
        $query = $CI->db_model->get('user', '*', "");
        // foreach ($query->result() as $data) {
        //     $option[$data->jenis_berkas] = $data->jenis_berkas;
        // }   
        // return $option;
        return $query->result();
    }

}
