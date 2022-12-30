<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Core_model extends CI_Model
{
    public function getAllMulti($table)
    {
        return $this->db->get($table);
    }

    public function inputMulti($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function detailKurikulum_matkul($id)
    {
        return $this->db->query("SELECT * FROM master_matkul where id_kurikulum ='$id' order by semester");
    }

    public function detailKurikulum($id)
    {
        return $this->db->get_where('master_kurikulum', ['id_kurikulum' => $id]);
    }

    public function ruanganByid($id)
    {
        return $this->db->get_where('master_ruangan', ['id_gedung' => $id]);
    }

    public function gedungById($id)
    {
        return $this->db->get_where('master_gedung', ['id_gedung' => $id]);
    }

    public function ruanganByGedung()
    {
        $this->db->select('*');
        $this->db->from('master_ruangan');
        $this->db->join('master_gedung', 'master_gedung.id_gedung = master_ruangan.id_gedung');
        return $this->db->get();
    }

    public function getKelasPerkuliahan()
    {
        $this->db->select('*');
        $this->db->from('perkuliahan_kelas');
        $this->db->join('master_prodi', 'perkuliahan_kelas.id_prodi = master_prodi.id_prodi', 'left');
        $this->db->join('master_matkuls', 'perkuliahan_kelas.id_matkul = master_matkuls.id_matkul', 'left');
        $this->db->join('master_ruangan', 'perkuliahan_kelas.id_ruangan = master_ruangan.id_ruangan', 'left');
        $this->db->join('master_gedung', 'master_gedung.id_gedung = master_ruangan.id_gedung', 'left');
        // $this->db->join('master_dosen', 'master_dosen.id_dosen = perkuliahan_dosen.id_dosen');
        $get = $this->db->get();
        return $get;
    }

    public function getKelasPerkuliahanDetail($token)
    {
        $this->db->select('*');
        $this->db->from('perkuliahan_kelas');
        $this->db->join('master_prodi', 'perkuliahan_kelas.id_prodi = master_prodi.id_prodi', 'left');
        $this->db->join('master_matkuls', 'perkuliahan_kelas.id_matkul = master_matkuls.id_matkul', 'left');
        $this->db->join('master_ruangan', 'perkuliahan_kelas.id_ruangan = master_ruangan.id_ruangan', 'left');
        $this->db->join('master_gedung', 'master_gedung.id_gedung = master_ruangan.id_gedung', 'left');
        $this->db->where('perkuliahan_kelas.token', $token);
        $get = $this->db->get();
        return $get;
    }

    public function getDosenPerkuliahan($id)
    {
        $this->db->select('*');
        $this->db->from('perkuliahan_dosen');
        $this->db->join('perkuliahan_kelas', 'perkuliahan_kelas.id_perkuliahan_kelas = perkuliahan_dosen.id_perkuliahan_kelas');
        $this->db->join('master_dosen', 'master_dosen.id_dosen = perkuliahan_dosen.id_dosen');
        $this->db->where('perkuliahan_dosen.id_perkuliahan_kelas', $id);
        $get = $this->db->get();
        return $get;
    }

    public function getDetailDosen($id)
    {
        return $this->db->query("SELECT * from perkuliahan_dosen where id_perkuliahan_kelas = '$id'");
    }

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

    public function mahasiswaAutoFill($title)
    {
        $this->db->like('nama_mahasiswa', $title);
        $this->db->or_like('nim', $title);
        $this->db->order_by('nama_mahasiswa', 'ASC');
        $this->db->limit(10);
        return $this->db->get('master_mahasiswa')->result();
    }

    public function getKrs($id_perkuliahan_kelas)
    {
        $this->db->select('*');
        $this->db->from('perkuliahan_mahasiswa');
        $this->db->join('master_mahasiswa', 'perkuliahan_mahasiswa.nim = master_mahasiswa.nim');
        $this->db->order_by('perkuliahan_mahasiswa.nim', 'asc');
        $this->db->where('perkuliahan_mahasiswa.id_perkuliahan_kelas', $id_perkuliahan_kelas);
        return $this->db->get();
    }

    public function getAngkatan()
    {
        return $this->db->query("SELECT SUBSTRING(id_periode, 1,4) as id_periode_crop FROM master_mahasiswa GROUP BY SUBSTRING(id_periode, 1,4)");
    }

    public function select_kolektif_angkatan($angkatan)
    {
        return $this->db->query("SELECT nim, nama_mahasiswa, nama_program_studi, id_mahasiswa, id_periode FROM master_mahasiswa where id_periode like '%$angkatan%' order by nim");
    }

    public function select_kolektif_prodi($angkatan, $prodi)
    {
        return $this->db->query("SELECT nim, nama_mahasiswa, nama_program_studi, id_mahasiswa, id_periode FROM master_mahasiswa where id_periode like '%$angkatan%' and id_prodi = '$prodi' order by nim");
    }

    public function getDetailNilaiPerkuliahan($id)
    {
        $this->db->select('*');
        $this->db->from('perkuliahan_nilai');
        $this->db->join('master_mahasiswa', 'master_mahasiswa.nim = perkuliahan_nilai.nim', 'left');
        $this->db->join('perkuliahan_kelas', 'perkuliahan_kelas.id_perkuliahan_kelas = perkuliahan_nilai.id_perkuliahan_kelas', 'left');
        $this->db->join('master_matkuls', 'master_matkuls.id_matkul = perkuliahan_nilai.id_matkul', 'left');
        $this->db->join('master_prodi', 'perkuliahan_kelas.id_prodi = master_prodi.id_prodi', 'left');
        $this->db->where('perkuliahan_nilai.id_perkuliahan_kelas', $id);
        $this->db->order_by('perkuliahan_nilai.nim', 'ASC');
        return $this->db->get();
    }

    public function getDataUser()
    {
        return $this->db->get('tb_akun');
    }
}


/* End of file Core_model.php and path \application\models\Core_model.php */
