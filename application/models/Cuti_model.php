<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti_model extends CI_Model {

    var $table = 'cuti';
    var $column_order = array('u.nama', 'c.tanggal cuti_awal','c.jumlah_cuti','c.keterangan_cuti', null); //set column field database for datatable orderable
    var $column_search = array(null); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('c.tanggal cuti_awal' => 'DESC'); // default order 

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query() {

//        if ($this->input->post('perangkat_daerah')) {
//            $perangkat_daerah = $this->input->post('perangkat_daerah');
//            $this->db->where('md5(sha1(a.perangkat_daerah))', $perangkat_daerah);
//        }
//        if ($this->session->userdata('id_pengguna_group') == 2) {            
//            $this->db->where('(YEAR(a.mulai) = YEAR(CURDATE()) AND YEAR(a.selesai) = YEAR(CURDATE()))');
//        }
//         $tahun = "AND YEAR(z.waktu_polling) = YEAR(CURDATE())";
//        if ($this->input->post('tahun')) {
//            $tahun = "AND YEAR(z.waktu_polling) = '" . $this->input->post('tahun') . "'";
//        }

        $this->db->select("c.*,u.nama")
                ->join('user u', 'u.id_user = c.id_user')
                ->from('cuti c');

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

    function get_datatables() {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->db->select("c.*,u.nama")
                ->join('user u', 'u.id_user = c.id_user')
                ->from('cuti c');

        return $this->db->count_all_results();
    }

    /*-------------------------------------------------------*/

    public function get_by_id($table, $table_id, $id){
        $this->db->from($table);
        $this->db->where($table_id, $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save($table, $data){
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function update($table, $where, $data){
        $this->db->update($table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($table, $table_id, $id){
        $this->db->where($table_id, $id);
        $this->db->delete($table);
    }

}
