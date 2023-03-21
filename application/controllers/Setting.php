<?php

/* * ***
 * Version: 1.0.0
 *
 * Description of Auth Controller
 *
 * @author CodersMag Team
 *
 * @email  info@codersmag.com
 *
 * *** */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //load model
        $this->load->model('Setting_model', 'setting');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function jenis_sk(){
        $data['title'] = "Setting - Jenis SK";
        $data['subtitle'] = "Jenis SK";
        $data['page'] = "jenis_sk";
        $this->load->view('setting/jenis_sk', $data);
    }

    public function tipe_pengguna(){
        $data['title'] = "Setting - Tipe Pengguna";
        $data['subtitle'] = "Tipe Pengguna";
        $data['page'] = "tipe_pengguna";
        $data['rows'] = $this->setting->get_all('tipe_user');
        $this->load->view('setting/tipe_pengguna', $data);
    }

    public function jatah_cuti(){
        $data['title'] = "Setting - Jatah Cuti";
        $data['subtitle'] = "Jatah Cuti";
        $data['page'] = "jatah_cuti";
        $this->load->view('setting/jatah_cuti', $data);
    }

    public function ajax_edit($id) {
        $data = $this->setting->get_by_id('tipe_user','id_tipe_user',$id);
       // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }

    public function ajax_add() {
        $this->_validate();

        $data = array(
            'tipe_user' => $this->input->post('tipe_user')
        );

        $insert = $this->setting->save('tipe_user', $data);

        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update() {
        $this->_validate();
        $data = array(
             'tipe_user' => $this->input->post('tipe_pengguna')
        );

        $this->setting->update('tipe_user', array('id_tipe_user' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id) {
        //delete file
        $setting = $this->setting->get_by_id('tipe_user','id_tipe_user', $id);
        
        $this->setting->delete_by_id('tipe_user','id_tipe_user', $id);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('tipe_pengguna') == '') {
            $data['inputerror'][] = 'tipe_pengguna';
            $data['error_string'][] = 'Tipe Pengguna is required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }
}