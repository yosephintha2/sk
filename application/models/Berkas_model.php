<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas_model extends CI_Model {

    var $table = 'berkas';
    var $column_order = array('no_berkas', 'nama_berkas', 'nama', 'tanggal_berkas', 'publish', null); //set column field database for datatable orderable
    var $column_search = array('no_berkas', 'nama_berkas', 'nama', 'tanggal_berkas', 'publish'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('id_berkas' => 'desc'); // default order 

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query($tipe) {

        // $this->db->from($this->table);

        if ($tipe == "pribadi") {
            //$column_order = array('no_berkas','nama_berkas','nama_user','tanggal_berkas','publish',null); //set column field database for datatable orderable	
            $this->db->where('j.tipe_berkas', 1);
            $this->db->where('b.id_user >= ', 1);
        } elseif ($tipe == "bersama") {
            //$column_order = array('no_berkas','nama_berkas','tanggal_berkas','publish',null); //set column field database for datatable orderable	
            $this->db->where('j.tipe_berkas', 0);
            $this->db->where('b.id_user = ', 0);
        }

        /*
          if !admin OR !hrd -> publish 1 ; id_user > 0
         */

        if ($this->input->post('cari_nomor')) {
            $this->db->where('b.nomor_berkas', $this->input->post('cari_nomor'));
        }

        if ($this->input->post('cari_sk')) {
            $this->db->where('b.nama_berkas', $this->input->post('cari_sk'));
        }

        if ($this->input->post('cari_nama')) {
            $this->db->where('u.nama', $this->input->post('cari_nama'));
        }

        if ($this->input->post('cari_tahun')) {
            $this->db->where('YEAR(b.tanggal_berkas)', $this->input->post('cari_tahun'));
        }

        $this->db->select('b.*, j.jenis_berkas, j.tipe_berkas, u.nama ');
        $this->db->from('berkas b');
        $this->db->join('jenis_berkas j', 'j.id_jenis_berkas = b.id_jenis_berkas', 'left');
        $this->db->join('user u', 'u.id_user = b.id_user', 'left');

        $i = 0;

        foreach ($this->column_search as $item) { // loop column 
            if ($_POST['search']['value']) { // if datatable send POST for search

                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables($tipe) {
        $this->_get_datatables_query($tipe);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($tipe) {
        $this->_get_datatables_query($tipe);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($tipe) {
        // $this->db->from($this->table);
        if ($tipe == "pribadi") {
            //$column_order = array('no_berkas','nama_berkas','nama_user','tanggal_berkas','publish',null); //set column field database for datatable orderable	
            $this->db->where('j.tipe_berkas', 1);
        } elseif ($tipe == "bersama") {
            //$column_order = array('no_berkas','nama_berkas','tanggal_berkas','publish',null); //set column field database for datatable orderable	
            $this->db->where('j.tipe_berkas', 0);
        }

        /*
          if !admin OR !hrd -> publish 1 ; id_user > 0
         */

        $this->db->select('b.*, j.jenis_berkas, j.tipe_berkas, u.nama ');
        $this->db->from('berkas b');
        $this->db->join('jenis_berkas j', 'j.id_jenis_berkas = b.id_jenis_berkas', 'left');
        $this->db->join('user u', 'u.id_user = b.id_user', 'left');

        return $this->db->count_all_results();
    }

//------------------------------------------------------------------------------------------------------------------

    public function get_all($tipe) {

        // SELECT b.*, j.jenis_berkas, j.tipe_berkas, u.nama FROM berkas b LEFT JOIN jenis_berkas j ON j.id_jenis_berkas = b.id_jenis_berkas LEFT JOIN user u ON u.id_user = b.id_user;

        if ($tipe == "pribadi") {
            $this->db->where('j.tipe_berkas', 1);
        } elseif ($tipe == "bersama") {
            $this->db->where('j.tipe_berkas', 0);
        }

        /*
          if !admin OR !hrd -> publish 1 ; id_user > 0
         */

        $this->db->select('b.*, j.jenis_berkas, j.tipe_berkas, u.nama ');
        $this->db->from('berkas b');
        $this->db->join('jenis_berkas j', 'j.id_jenis_berkas = b.id_jenis_berkas', 'left');
        $this->db->join('user u', 'u.id_user = b.id_user', 'left');

        $query = $this->db->get();

        return $query->result();
    }

    public function get_by_id($id) {
        $this->db->from($this->table);
        $this->db->where('md5(id_berkas)', $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data) {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id) {
        $this->db->where('md5(id_berkas)', $id);
        $this->db->delete($this->table);
    }

}
