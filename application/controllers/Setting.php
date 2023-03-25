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
        $data['rows'] = $this->setting->get_all('jenis_berkas');
        $this->load->view('setting/jenis_sk', $data);
    }

    public function tipe_pengguna(){
        $data['title'] = "Setting - Tipe Pengguna";
        $data['subtitle'] = "Tipe Pengguna";
        $data['page'] = "tipe_pengguna";
        $data['rows'] = $this->setting->get_all('tipe_user');
        // $data['footer'] = $this->load->view('layout/footer', $data, true);
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
        $this->_validate($this->input->post('form'));

        if ($this->input->post('form') == 'tipe_pengguna'){
            $data = array(
                'tipe_user' => $this->input->post('tipe_pengguna')
            );
            $tabel = 'tipe_user';
        }   

        if ($this->input->post('form') == 'jenis_sk'){
            $data = array(
                'jenis_berkas' => $this->input->post('jenis_sk'),
                'tipe_berkas' => $this->input->post('tipe_sk'),
                'keterangan' => $this->input->post('keterangan')
            );
            $tabel = 'jenis_berkas';
        } 

        $insert = $this->setting->save($tabel, $data);

        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update() {
        $this->_validate($this->input->post('form'));
        if ($this->input->post('form') == 'tipe_pengguna'){
            $data = array(
                'tipe_user' => $this->input->post('tipe_pengguna')
            );
            $where = array(
                'id_tipe_user' => $this->input->post('id')
            );
            $tabel = 'tipe_user';
        }   

        if ($this->input->post('form') == 'jenis_sk'){
            $data = array(
                'jenis_berkas' => $this->input->post('jenis_sk'),
                'tipe_berkas' => $this->input->post('tipe_sk'),
                'keterangan' => $this->input->post('keterangan')
            );
            $where = array(
                'id_jenis_berkas' => $this->input->post('id')
            );
            $tabel = 'jenis_berkas';
        } 

        $this->setting->update($tabel, $where, $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id) {
        $form = $_POST['form'];
        if ($form == 'tipe_pengguna'){
            $tabel = 'tipe_user';
            $tabel_id = 'id_tipe_user';
        }   

        if ($form == 'jenis_sk'){
            $tabel = 'jenis_berkas';
            $tabel_id = 'id_jenis_berkas';
        } 
        //exit();
        // $setting = $this->setting->get_by_id('tipe_user','id_tipe_user', $id);
        
        $this->setting->delete_by_id($tabel, $tabel_id, $id);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate($form) {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($form == 'tipe_pengguna'){
            if ($this->input->post('tipe_pengguna') == '') {
                $data['inputerror'][] = 'tipe_pengguna';
                $data['error_string'][] = 'Tipe Pengguna is required';
                $data['status'] = FALSE;
            }
        }

        if ($form == 'jenis_sk'){
            if ($this->input->post('jenis_sk') == '') {
               $data['inputerror'][] = 'jenis_sk';
               $data['error_string'][] = 'Jenis SK is required';
               $data['status'] = FALSE;
            }

            if ($this->input->post('tipe_sk') == '') {
               $data['inputerror'][] = 'tipe_sk';
               $data['error_string'][] = 'Tipe SK is required';
               $data['status'] = FALSE;
            }
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }
}