<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ServerSide_Perkuliahan_model extends CI_Model
{

    // serverside dataperkuliahan kelas

    var $column_order_perkuliahan = array('perkuliahan_kelas.semester_perkuliahan', 'master_matkuls.kode_mata_kuliah', 'master_matkuls.nama_mata_kuliah', 'perkuliahan_kelas.nama_kelas', 'perkuliahan_kelas.kuota_kelas', 'master_ruangan.nama_ruangan', 'perkuliahan_kelas.jam_awal');
    var $order_perkuliahan = array('perkuliahan_kelas.semester_perkuliahan', 'master_matkuls.kode_mata_kuliah', 'master_matkuls.nama_mata_kuliah', 'perkuliahan_kelas.nama_kelas', 'perkuliahan_kelas.kuota_kelas', 'master_ruangan.nama_ruangan', 'perkuliahan_kelas.jam_awal');


    public function getDataPerkuliahan()
    {
        $this->_get_data_query_perkuliahan();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    private function _get_data_query_perkuliahan()
    {
        $this->db->from('perkuliahan_kelas');
        $this->db->join('master_prodi', 'perkuliahan_kelas.id_prodi = master_prodi.id_prodi', 'left');
        $this->db->join('master_matkuls', 'perkuliahan_kelas.id_matkul = master_matkuls.id_matkul', 'left');
        // $this->db->join('master_kurikulum', 'master_kurikulum.id_kurikulum = master_matkul.id_kurikulum', 'left');
        $this->db->join('master_ruangan', 'perkuliahan_kelas.id_ruangan = master_ruangan.id_ruangan', 'left');
        $this->db->join('master_gedung', 'master_gedung.id_gedung = master_ruangan.id_gedung', 'left');
        if (isset($_POST['search']['value'])) {
            $this->db->like('semester_perkuliahan', $_POST['search']['value']);
            $this->db->or_like('kode_mata_kuliah', $_POST['search']['value']);
            $this->db->or_like('nama_mata_kuliah', $_POST['search']['value']);
            $this->db->or_like('nama_kelas', $_POST['search']['value']);
            $this->db->or_like('nama_ruangan', $_POST['search']['value']);
            $this->db->or_like('kuota_kelas', $_POST['search']['value']);
            $this->db->or_like('jam_awal', $_POST['search']['value']);
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_perkuliahan[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('semester_perkuliahan', 'DESC');
        }
    }

    public function count_filtered_data_perkuliahan()
    {
        $this->_get_data_query_perkuliahan();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_perkuliahan()
    {
        $this->db->from('perkuliahan_kelas');
        $this->db->join('master_prodi', 'perkuliahan_kelas.id_prodi = master_prodi.id_prodi', 'left');
        $this->db->join('master_matkuls', 'perkuliahan_kelas.id_matkul = master_matkuls.id_matkul', 'left');
        $this->db->join('master_ruangan', 'perkuliahan_kelas.id_ruangan = master_ruangan.id_ruangan', 'left');
        $this->db->join('master_gedung', 'master_gedung.id_gedung = master_ruangan.id_gedung', 'left');
        return $this->db->count_all_results();
    }

    // serverside data mahasiswa

    var $column_order = array('nama_mahasiswa', 'nim', 'jenis_kelamin', 'nama_agama', 'tanggal_lahir', 'nama_program_studi', 'nama_periode_masuk');
    var $order = array('nama_mahasiswa', 'nim', 'jenis_kelamin', 'nama_agama', 'tanggal_lahir', 'nama_program_studi', 'nama_periode_masuk');


    public function getDataMahasiswa()
    {
        $this->_get_data_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    private function _get_data_query()
    {
        $this->db->from('master_mahasiswa');
        if (isset($_POST['search']['value'])) {
            $this->db->like('nama_mahasiswa', $_POST['search']['value']);
            $this->db->or_like('nim', $_POST['search']['value']);
            $this->db->or_like('jenis_kelamin', $_POST['search']['value']);
            $this->db->or_like('nama_agama', $_POST['search']['value']);
            $this->db->or_like('tanggal_lahir', $_POST['search']['value']);
            $this->db->or_like('nama_program_studi', $_POST['search']['value']);
            $this->db->or_like('nama_periode_masuk', $_POST['search']['value']);
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('nim', 'ASC');
        }
    }

    public function count_filtered_data()
    {
        $this->_get_data_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data()
    {
        $this->db->from('master_mahasiswa');
        return $this->db->count_all_results();
    }

    // serverside table user akun

    var $column_order_user = array('username_akun', 'email_akun', 'nama_akun', 'role');
    var $order_user = array('username_akun', 'email_akun', 'nama_akun', 'role');

    public function getDataUser()
    {
        $this->_get_data_query_user();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }


    private function _get_data_query_user()
    {
        $this->db->from('tb_akun');
        if (isset($_POST['search']['value'])) {
            $this->db->like('username_akun', $_POST['search']['value']);
            $this->db->or_like('email_akun', $_POST['search']['value']);
            $this->db->or_like('nama_akun', $_POST['search']['value']);
            $this->db->or_like('role', $_POST['search']['value']);
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id_akun', 'ASC');
        }
    }

    public function count_filtered_data_user()
    {
        $this->_get_data_query_user();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_user()
    {
        $this->db->from('tb_akun');
        return $this->db->count_all_results();
    }

    //data dosen

    var $column_order_dosen = array('nama_dosen', 'nidn', 'jenis_kelamin', 'nama_agama', 'tanggal_lahir', 'status');
    var $order_dosen = array('nama_dosen', 'nidn', 'jenis_kelamin', 'nama_agama', 'tanggal_lahir', 'status');

    public function getDataDosen()
    {
        $this->_get_data_query_dosen();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }


    private function _get_data_query_dosen()
    {
        $this->db->from('master_dosen');
        if (isset($_POST['search']['value'])) {
            $this->db->like('nama_dosen', $_POST['search']['value']);
            $this->db->or_like('nidn', $_POST['search']['value']);
            $this->db->or_like('jenis_kelamin', $_POST['search']['value']);
            $this->db->or_like('nama_agama', $_POST['search']['value']);
            $this->db->or_like('tanggal_lahir', $_POST['search']['value']);
            $this->db->or_like('status', $_POST['search']['value']);
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('nidn', 'ASC');
        }
    }

    public function count_filtered_data_dosen()
    {
        $this->_get_data_query_dosen();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_dosen()
    {
        $this->db->from('master_dosen');
        return $this->db->count_all_results();
    }
}


/* End of file ServerSide_Perkuliahan_model.php and path \application\models\ServerSide_Perkuliahan_model.php */
