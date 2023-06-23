<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_by_id($table, $table_id, $id) {
        $this->db->from($table);
        $this->db->where($table_id, $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_all($table) {
        return $this->db->get($table)->result();
    }

    public function save($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function update($table, $where, $data) {
        $this->db->update($table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($table, $table_id, $id) {
        $this->db->where($table_id, $id);
        $this->db->delete($table);
    }

}
