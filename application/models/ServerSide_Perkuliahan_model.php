<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ServerSide_Perkuliahan_model extends CI_Model
{

    public function getSemesterAktif()
    {
        $data = $this->db->query("SELECT * FROM settings where status_setting = 1")->row_array();
        return $data['id_semester'];
    }

    // serverside dataperkuliahan kelas
    var $column_order_perkuliahan = array('master_semester.nama_semester', 'master_matkuls.kode_mata_kuliah', 'master_matkuls.nama_mata_kuliah', 'perkuliahan_kelas.nama_kelas', 'perkuliahan_kelas.kuota_kelas', 'master_ruangan.nama_ruangan', 'perkuliahan_kelas.jam_awal');
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
        $semester = $this->getSemesterAktif();
        $this->db->select('master_semester.nama_semester, perkuliahan_dosen.id_dosen, master_dosen.nama_dosen, master_matkuls.kode_mata_kuliah, master_matkuls.nama_mata_kuliah, perkuliahan_kelas.nama_kelas, perkuliahan_kelas.kuota_kelas, master_gedung.nama_gedung, master_ruangan.nama_ruangan, perkuliahan_kelas.id_perkuliahan_kelas, perkuliahan_kelas.token, perkuliahan_kelas.hari, perkuliahan_kelas.jam_awal, perkuliahan_kelas.jam_akhir, master_matkuls.sks_mata_kuliah, master_semester.id_semester');
        $this->db->from('perkuliahan_kelas');
        $this->db->join('master_prodi', 'perkuliahan_kelas.id_prodi = master_prodi.id_prodi');
        $this->db->join('master_matkuls', 'perkuliahan_kelas.id_matkul = master_matkuls.id_matkul');
        $this->db->join('master_ruangan', 'perkuliahan_kelas.id_ruangan = master_ruangan.id_ruangan', 'left');
        $this->db->join('master_gedung', 'master_gedung.id_gedung = master_ruangan.id_gedung', 'left');
        $this->db->join('perkuliahan_dosen', 'perkuliahan_dosen.id_perkuliahan_kelas = perkuliahan_kelas.id_perkuliahan_kelas', 'left');
        $this->db->join('master_dosen', 'master_dosen.id_dosen = perkuliahan_dosen.id_dosen', 'left');
        $this->db->join('master_semester', 'master_semester.id_semester = perkuliahan_kelas.id_semester', 'left');
        $this->db->where('master_semester.id_semester', $this->getSemesterAktif());

        $i = 0;

        foreach ($this->column_order_perkuliahan as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_order_perkuliahan) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_perkuliahan[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $order = $this->order;
            $this->db->order_by('master_semester.id_semester', 'DESC');
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
        $this->db->where('id_semester', $this->getSemesterAktif());
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
        $this->db->select('id_mahasiswa, nama_mahasiswa, nim, jenis_kelamin, nama_agama, tanggal_lahir, nama_periode_masuk, nama_program_studi');
        $this->db->from('master_mahasiswa');
        $this->db->join('master_prodi', 'master_prodi.id_prodi = master_mahasiswa.id_prodi');
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
            $this->db->order_by('nim', 'DESC');
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

    //serverside matakuliah

    var $column_order_matakuliah = array('nama_mahasiswa', 'nim', 'jenis_kelamin', 'nama_agama', 'tanggal_lahir', 'nama_program_studi', 'nama_periode_masuk');
    var $order_matakuliah = array('nama_mahasiswa', 'nim', 'jenis_kelamin', 'nama_agama', 'tanggal_lahir', 'nama_program_studi', 'nama_periode_masuk');


    public function getDataMataKuliah()
    {
        $this->_get_data_query_matakuliah();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    private function _get_data_query_matakuliah()
    {
        $this->db->select('master_matkuls.kode_mata_kuliah, master_matkuls.sks_mata_kuliah, master_matkuls.nama_mata_kuliah, master_prodi.nama_program_studi');
        $this->db->from('master_matkuls');
        $this->db->join('master_prodi', 'master_prodi.id_prodi = master_matkuls.id_prodi');
        if (isset($_POST['search']['value'])) {
            $this->db->like('kode_mata_kuliah', $_POST['search']['value']);
            $this->db->or_like('nama_mata_kuliah', $_POST['search']['value']);
            // $this->db->or_like('nama_program_studi', $_POST['search']['value']);
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('kode_mata_kuliah', 'DESC');
        }
    }

    public function count_filtered_data_matakuliah()
    {
        $this->_get_data_query_matakuliah();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_matakuliah()
    {
        $this->db->from('master_matkuls');
        return $this->db->count_all_results();
    }
}


/* End of file ServerSide_Perkuliahan_model.php and path \application\models\ServerSide_Perkuliahan_model.php */
