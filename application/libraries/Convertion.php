<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Convertion {

    public function pengguna_group($option) {
        $CI = & get_instance();
        $CI->load->model('db_model');

        $query = $CI->db_model->get('pengguna_group', 'nama', array('id_pengguna_group' => $option));
        $row = $query->row();
        $hasil = $row->nama;
        return $hasil;
    }

    public function jenis_survey($option) {
        $CI = & get_instance();
        $CI->load->model('db_model');

        $query = $CI->db_model->get('survey', 'nama_survey', array('id_survey' => $option));
        $row = $query->row();
        $hasil = isset($row->nama_survey) ? $row->nama_survey : '-';
        return $hasil;
    }

    public function jenis_kategori($option) {
        $CI = & get_instance();
        $CI->load->model('db_model');

        $query = $CI->db_model->get('kategori', 'kategori', array('id_kategori' => $option));
        $row = $query->row();
        $hasil = isset($row->kategori) ? $row->kategori : '-';
        return $hasil;
    }

    public function jenis_dimensi($option) {
        $CI = & get_instance();
        $CI->load->model('db_model');

        $query = $CI->db_model->get('dimensi', 'nama_dimensi', array('id_dimensi' => $option));
        $row = $query->row();
        $hasil = isset($row->nama_dimensi) ? $row->nama_dimensi : '-';
        return $hasil;
    }

    public function thn_regulasi($option) {
        $CI = & get_instance();
        $CI->load->model('db_model');

        $query = $CI->db_model->get('peraturan', 'tahun', array('md5(id_peraturan)' => $option));
        $row = $query->row();
        $hasil = isset($row->tahun) ? $row->tahun : '-';
        return $hasil;
    }

    public function regulasi($option) {
        $CI = & get_instance();
        $CI->load->model('db_model');

        $query = $CI->db_model->get('peraturan', 'peraturan', array('md5(id_peraturan)' => $option));
        $row = $query->row();
        $hasil = isset($row->peraturan) ? $row->peraturan : '-';
        return $hasil;
    }

    public function id_regulasi($option) {
        $CI = & get_instance();
        $CI->load->model('db_model');

        $query = $CI->db_model->get('peraturan', 'id_peraturan', array('md5(id_peraturan)' => $option));
        $row = $query->row();
        $hasil = isset($row->id_peraturan) ? $row->id_peraturan : '-';
        return $hasil;
    }

    public function dimensi($option) {
        $CI = & get_instance();
        $CI->load->model('db_model');

        $query = $CI->db_model->get('survey', '*', array('id_survey' => $option));
        $row = $query->row();
        $hasil = isset($row->nama_survey) ? $row->nama_survey : '';
        return $hasil;
    }

    public function decryp_dimensi($hash_id = null) {
        $hasil = '';
        for ($i = 0; $i <= 100; $i++) {
            if (md5($i) == $hash_id)
                $hasil = $i;
        }
        return $hasil;
    }

    public function colspan_dimensi($val = null, $hash_id = null) {
        $CI = & get_instance();
        $query = $CI->db->where('id_survey', $val)
                ->where('md5(id_peraturan)', $hash_id)
                ->get('pertanyaan');

        $hasil = $query->num_rows();

        $n = 0;
        if ($hasil == 0) {
            $query = $CI->db->where('parent', $val)
                    ->where('flag', 0)
                    ->order_by('id_survey')
                    ->get('survey');

            if ($query->num_rows() > 0) {
                foreach ($query->result() AS $row) {
                    $n = $CI->db->where('id_survey', $row->id_survey)
                            ->where('md5(id_peraturan)', $hash_id)
                                    ->get('pertanyaan')->num_rows() + 1;
                    $hasil += $n;
                }
            }
        }
        return $hasil;
    }

    public function colspan_subdimensi($val = null, $hash_id = null) {
        $CI = & get_instance();
        $hasil = $CI->db->where('id_survey', $val)
                ->where('md5(id_peraturan)', $hash_id)
                        ->order_by('no_urut')
                        ->get('pertanyaan')->num_rows();

        return $hasil;
    }

    public function get_nilai($id_responden = null, $id_pertanyaan = null) {
        $CI = & get_instance();

        $query5 = $CI->db_model->get('jawaban', 'jawaban', array("id_kategori" => 1,
                    "id_responden" => $id_responden, "id_pertanyaan" => $id_pertanyaan),'id_jawaban DESC')->row();
        $jawaban = isset($query5->jawaban) ? $query5->jawaban : '';
        $query6 = $CI->db_model->get('pilihan', 'pilihan, nilai', array("id_pilihan" => $jawaban))->row();

        $n = isset($query6->nilai) ? $query6->nilai : '0';
        $n = floatval($n);

        return $n;
    }

    public function get_bobot($id_responden = null, $id_pertanyaan = null) {
        $CI = & get_instance();

        $query5 = $CI->db_model->get('jawaban', 'jawaban', array("id_kategori" => 1,
                    "id_responden" => $id_responden, "id_pertanyaan" => $id_pertanyaan), 'id_jawaban DESC')->row();
        $jawaban = isset($query5->jawaban) ? $query5->jawaban : '';
        $query6 = $CI->db_model->get('pilihan', 'pilihan, nilai, bobot', array("id_pilihan" => $jawaban))->row();

        $n = isset($query6->bobot) ? $query6->bobot : '0';

        return $n;
    }

    public function kategori_nilai($rata2 = null, $hash_id = null) {
        $CI = & get_instance();
        $query7 = $CI->db->where('md5(id_peraturan)', $hash_id)->get('nilai')->result();
        //print_r($query7);
        foreach ($query7 as $row7) {
            $nilai_a = floatval($row7->nilai_a);
            $nilai_b = floatval($row7->nilai_b);

            if ($rata2 >= $nilai_a && $rata2 <= $nilai_b) {
                $kategori_nilai = $row7->nilai;
                $keterangan_nilai = $row7->keterangan;
            }
        }
        return $kategori_nilai;
    }
    
    public function get_perangkatdaerah($hash_id){
        $CI = & get_instance();
        
        $perangkat_daerah = $CI->db
                ->where('md5(perangkat_daerah)', $hash_id)
//                ->group_by('perangkat_daerah')
                ->get('responden')->row();
        
//        echo $CI->db->last_query();
        $hasil = !empty($perangkat_daerah) ? $perangkat_daerah->perangkat_daerah : '-';
         return $hasil;
    }

}
