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

class Berkas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //load model
        // $this->load->model('Berkas_pribadi_model', 'pribadi');
        // $this->load->model('Berkas_bersama_model', 'bersama');
        $this->load->model('Berkas_model', 'berkas');
        $this->load->library('form_option', 'conversion');
        $this->load->helper('url', 'form', 'download');
    }

    public function home($tipe) {
        $title = $subtitle = $page = "";
        if ($tipe == "bersama") {
            $title = $subtitle = "SK Bersama";
            $page = "sk_bersama";
            $url = "berkas/bersama_view";
            $tipe_berkas = 0;
        } elseif ($tipe == "pribadi") {
            $title = $subtitle = "SK Pribadi";
            $page = "sk_pribadi";
            $url = "berkas/pribadi_view";
            $tipe_berkas = 1;
            $data['user'] = $this->form_option->list_user();
        }

        $data['jenis'] = $this->form_option->list_jenis_berkas($tipe_berkas);
        $data['title'] = $title;
        $data['subtitle'] = $subtitle;
        $data['page'] = $page;
        $data['data'] = $this->berkas->get_all($tipe);
        $data['tipe'] = $tipe;

        // var_dump($data['data']);exit;
        // $data['tipe_sk'] = $this->form_option->tipe_berkas('');
        $this->load->view($url, $data);
    }

    public function tambah($tipe) {
        $title = $subtitle = $page = "";
        if ($tipe == "bersama") {
            $title = $subtitle = "SK Bersama - Tambah";
            $page = "sk_bersama";
            $url = "berkas/bersama_tambah";
            $tipe_berkas = 0;
        } elseif ($tipe == "pribadi") {
            $title = $subtitle = "SK Pribadi - Tambah";
            $page = "sk_pribadi";
            $url = "berkas/pribadi_tambah";
            $tipe_berkas = 1;
        }

        $data['user'] = $this->form_option->list_user();
        $data['jenis'] = $this->form_option->list_jenis_berkas($tipe_berkas);
        $data['tipe'] = $tipe;
        $data['title'] = $title;
        $data['subtitle'] = $subtitle;
        $data['page'] = $page;
        //$data['rows'] = $this->berkas->get_all($tipe);
        // $data['tipe_sk'] = $this->form_option->tipe_berkas('');
        $this->load->view($url, $data);
    }

    public function ajax_add() {
        $this->_validate($this->input->post('form'));

        $data = array(
                'no_berkas' => $this->input->post('nomor_sk'),
                'nama_berkas' => $this->input->post('nama_sk'),
                'id_jenis_berkas' => $this->input->post('jenis_sk'),
                'keterangan_berkas' => $this->input->post('keterangan_sk'),
                'tanggal_berkas' => $this->input->post('tanggal_sk'),
                'publish' => $this->input->post('publish'),
            );

        if ($this->input->post('form') == 'pribadi') {
             $data['id_user'] = $this->input->post('nama');
        }

            $tabel = 'berkas';

        if (!empty($_FILES['file_sk']['name'])) {
            $upload = $this->_do_upload();
            $data['url_berkas'] = $upload;
        }

        $insert = $this->berkas->save($data);

        echo json_encode(array("status" => TRUE));
    }

    public function edit($tipe="",$id="") {
        $title = $subtitle = $page = "";
        if ($tipe == "bersama") {
            $title = $subtitle = "SK Bersama - Edit";
            $page = "sk_bersama";
            $url = "berkas/bersama_edit";
            $tipe_berkas = 0;
        } elseif ($tipe == "pribadi") {
            $title = $subtitle = "SK Pribadi - Edit";
            $page = "sk_pribadi";
            $url = "berkas/pribadi_edit";
            $tipe_berkas = 1;
        }

        $data['user'] = $this->form_option->list_user();
        $data['jenis'] = $this->form_option->list_jenis_berkas($tipe_berkas);
        $data['tipe'] = $tipe;
        $data['title'] = $title;
        $data['subtitle'] = $subtitle;
        $data['page'] = $page;
        $data['row'] = $this->berkas->get_by_id($id);
        // $data['tipe_sk'] = $this->form_option->tipe_berkas('');
        $this->load->view($url, $data);
    }

    public function ajax_update() {
        $this->_validate($this->input->post('form'));

        $data = array(
                'no_berkas' => $this->input->post('nomor_sk'),
                'nama_berkas' => $this->input->post('nama_sk'),
                'id_jenis_berkas' => $this->input->post('jenis_sk'),
                'keterangan_berkas' => $this->input->post('keterangan_sk'),
                'tanggal_berkas' => $this->input->post('tanggal_sk'),
                'publish' => $this->input->post('publish'),
            );

        if ($this->input->post('form') == 'pribadi') {
             $data['id_user'] = $this->input->post('nama');
        }

            $tabel = 'berkas';

        // if ($this->input->post('remove')) { // if remove photo checked
        //     if (file_exists('upload/' . $this->input->post('remove')) && $this->input->post('remove'))
        //         unlink('upload/' . $this->input->post('remove'));
        //     $data['url_berkas'] = '';
        // }

        if (!empty($_FILES['file_sk']['name'])) {
            $upload = $this->_do_upload();

            //delete file
            $file = $this->berkas->get_by_id(md5($this->input->post('id_berkas')));
            if (file_exists('upload/' . $file->url_berkas) && $file->url_berkas)
                unlink('upload/' . $file->url_berkas);

            $data['url_berkas'] = $upload;
        }

        $this->berkas->update(array('id_berkas' => $this->input->post('id_berkas')), $data);
        // echo $this->db->last_query();exit();
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id) {
        $this->berkas->delete_by_id(md5($id));
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_detail($id) {
        $data = $this->berkas->get_by_id(md5($id));
        // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }

    private function _do_upload() {
        // set path to store uploaded files
        $config['upload_path'] = './upload/'; // set allowed file types
        $config['allowed_types'] = 'pdf'; // set upload limit, set 0 for no limit
        $config['max_size'] = 2100;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file_sk')) { //upload and validate
            $data['inputerror'][] = 'files';
            $data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

    /*
      public function ajax_edit($id) {
      $form = $_POST['form'];
      if ($form == 'tipe_pengguna'){
      $tabel = 'tipe_user';
      $tabel_id = 'id_tipe_user';
      }

      if ($form == 'jenis_sk'){
      $tabel = 'jenis_berkas';
      $tabel_id = 'id_jenis_berkas';
      }

      if ($form == 'jatah_cuti'){
      $id = 1;
      $tabel = 'config';
      $tabel_id = 'id_config';
      }

      $data = $this->setting->get_by_id($tabel, $tabel_id, $id);
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

      if ($this->input->post('form') == 'jatah_cuti'){
      $data = array(
      'jatah_cuti' => $this->input->post('jatah_cuti')
      );
      $where = array(
      'id_config' => 1
      );
      $tabel = 'config';
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
     */

    private function _validate($form) {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($form == 'pribadi') {
            if ($this->input->post('nama') == '') {
                $data['inputerror'][] = 'Nama';
                $data['error_string'][] = 'Nama Guru/Karyawan is required';
                $data['status'] = FALSE;
            }
        }

        // if (empty($_FILES['file_sk']['name'])) {
        //      $data['inputerror'][] = 'File';
        //      $data['error_string'][] = 'File is required';
        //      $data['status'] = FALSE;
        // }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    public function ajax_list($tipe) {
        $this->load->helper('url');

        $list = $this->berkas->get_datatables($tipe);
        // echo $this->db->last_query();exit();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $berkas) {
            $no++;
            $row = array();
            $row[] = $berkas->no_berkas;
            $row[] = $berkas->nama_berkas;
            $row[] = $berkas->jenis_berkas;
            $row[] = "<center>" . $berkas->tanggal_berkas . "</center>";
            if($tipe == "pribadi")
                $row[] = $berkas->nama;
            $row[] = $berkas->keterangan_berkas;

            if ($berkas->publish == 0)
                $row[] = "<td><center><small class='badge badge-secondary'>Hide</small></center></td>";
            if ($berkas->publish == 1)
                $row[] = "<td><center><small class='badge badge-success'>Show</small></center></td>";

            //add html for action

            $row[] = "<center><a class='btn btn-outline-dark btn-sm' href='".base_url()."upload/".$berkas->url_berkas."' target='_blank' title='Download'><i class='fas fa-file-pdf'></i></a>
                <a class='btn btn-outline-info btn-sm' href='".site_url('berkas/edit/') . $tipe."/".md5($berkas->id_berkas)."' title='Edit'><i class='fas fa-edit'></i></a>
                  <a class='btn btn-outline-danger btn-sm' href='javascript:void(0)' title='Hapus' onclick='del($berkas->id_berkas)'><i class='fas fa-trash-alt'></i></a></center>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->berkas->count_all($tipe),
            "recordsFiltered" => $this->berkas->count_filtered($tipe),
            "data" => $data,
        );
        //output to json format

        echo json_encode($output);
    }

}
