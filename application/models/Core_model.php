<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Core_model extends CI_Model
{

    public function getSemesterAktif()
    {
        $data = $this->db->query("SELECT * FROM settings where status_setting = 1")->row_array();
        return $data['id_semester'];
    }

    public function semesterDetail($semester = null)
    {
        if (empty($semester)) {
            $filter = $this->getSemesterAktif();
        } else {
            $filter = $semester;
        }
        $this->db->select('*');
        $this->db->from('master_semester');
        $this->db->where('id_semester', $filter);
        return $this->db->get()->row_array();
    }

    public function getMhsByJurusan($id_jurusan)
    {
        $this->db->select('id_mahasiswa');
        $this->db->from('master_mahasiswa');
        $this->db->where('id_prodi', $id_jurusan);
        return $this->db->get();
    }

    public function getAllSetting()
    {
        $this->db->select('*');
        $this->db->from('setting_akses');
        $this->db->join('master_prodi', 'master_prodi.id_prodi = setting_akses.id_prodi');
        return $this->db->get();
    }

    public function update_akses($id, $tipestatus, $status)
    {
        $this->db->where('id_prodi', $id);
        $this->db->update('setting_akses', [$tipestatus => $status]);
    }

    public function getJumlahDosen($tipe = null)
    {
        $this->db->select('id_dosen');
        $this->db->from('master_dosen');
        if ($tipe == 'nidn') {
            $this->db->where('nidn !=', '');
        } else {
            $this->db->where('nidn', '');
        }
        return $this->db->get();
    }

    public function getAllMulti($table)
    {
        return $this->db->get($table);
    }

    public function inputMulti($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function getSkalaNilai($id_prodi, $nilai)
    {
        $data = $this->db->query("SELECT * FROM tb_skalanilai where id_prodi = '$id_prodi'");

        return $data;
    }

    public function infoMahasiswa($nim)
    {
        $this->db->select('*');
        $this->db->from('master_mahasiswa');
        $this->db->join('master_prodi', 'master_mahasiswa.id_prodi = master_prodi.id_prodi');
        $this->db->where('nim', $nim);
        return $this->db->get();
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
        $this->db->select('*, master_prodi.nama_program_studi as nama_prodi');
        $this->db->from('perkuliahan_kelas');
        $this->db->join('master_prodi', 'perkuliahan_kelas.id_prodi = master_prodi.id_prodi', 'left');
        $this->db->join('master_matkuls', 'perkuliahan_kelas.id_matkul = master_matkuls.id_matkul', 'left');
        $this->db->join('master_ruangan', 'perkuliahan_kelas.id_ruangan = master_ruangan.id_ruangan', 'left');
        $this->db->join('master_gedung', 'master_gedung.id_gedung = master_ruangan.id_gedung', 'left');
        $this->db->join('master_semester', 'master_semester.id_semester = perkuliahan_kelas.id_semester', 'left');
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

    public function getDetailMahasiswa($nim)
    {
        $this->db->where('nim', $nim);
        return $this->db->get('master_mahasiswa');
    }

    public function mahasiswaAutoFill($title)
    {
        $this->db->like('nama_mahasiswa', $title);
        $this->db->or_like('nim', $title);
        $this->db->order_by('nama_mahasiswa', 'ASC');
        $this->db->limit(10);
        return $this->db->get('master_mahasiswa')->result();
    }

    public function dosenAutoFill($title)
    {
        $this->db->like('nama_dosen', $title);
        $this->db->or_like('nidn', $title);
        $this->db->order_by('nama_dosen', 'ASC');
        $this->db->limit(10);
        return $this->db->get('master_dosen')->result();
    }

    public function getKrs($id_perkuliahan_kelas)
    {
        $this->db->select('*');
        $this->db->from('perkuliahan_mahasiswa');
        $this->db->join('master_mahasiswa', 'perkuliahan_mahasiswa.nim = master_mahasiswa.nim');
        $this->db->join('master_prodi', 'master_prodi.id_prodi = master_mahasiswa.id_prodi');
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
        return $this->db->query("SELECT mhs.nim, mhs.nama_mahasiswa, mhs.id_mahasiswa, mhs.id_periode, p.nama_program_studi FROM master_mahasiswa mhs join master_prodi p on p.id_prodi = mhs.id_prodi where mhs.id_periode like '%$angkatan%' order by mhs.nim");
    }

    public function select_kolektif_prodi($angkatan, $prodi)
    {
        return $this->db->query("SELECT mhs.nim, mhs.nama_mahasiswa, mhs.id_mahasiswa, mhs.id_periode, p.nama_program_studi FROM master_mahasiswa mhs join master_prodi p on p.id_prodi = mhs.id_prodi where mhs.id_periode like '%$angkatan%' and mhs.id_prodi = '$prodi' order by mhs.nim");
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

    public function getInputNilaiMahasiswa($id)
    {
        $this->db->select('*');
        $this->db->from('perkuliahan_mahasiswa');
        $this->db->join('master_mahasiswa', 'master_mahasiswa.nim = perkuliahan_mahasiswa.nim', 'left');
        $this->db->join('master_prodi', 'master_prodi.id_prodi = master_mahasiswa.id_prodi', 'left');
        $this->db->where('perkuliahan_mahasiswa.id_perkuliahan_kelas', $id);
        $this->db->order_by('perkuliahan_mahasiswa.nim', 'asc');

        return $this->db->get();
    }

    public function update_nilai($token, $nim, $data)
    {
        $where = ['id_perkuliahan_kelas' => $token, 'nim' => $nim];
        return $this->db->update('perkuliahan_nilai', $data, $where);
    }

    //cek nilai apakah ada atau tidak
    public function getNilaiMahasiswa($id, $nim)
    {
        return $this->db->query("SELECT * FROM perkuliahan_nilai where nim = '$nim' and id_perkuliahan_kelas='$id'");
    }

    public function getDataUser()
    {
        return $this->db->get('tb_akun');
    }

    public function cekDosenWali($id_dosen, $semester)
    {
        return $this->db->query("SELECT token from dosen_wali where id_dosen = '$id_dosen' AND semester_krs='$semester'");
    }

    public function getMahasiswaDosenWali($token)
    {
        $this->db->select('*');
        $this->db->from('perkuliahan_wali');
        $this->db->join('master_mahasiswa', 'master_mahasiswa.nim = perkuliahan_wali.nim');
        $this->db->join('master_prodi', 'master_prodi.id_prodi = master_mahasiswa.id_prodi');
        $this->db->where('token', $token);
        return $this->db->get();
    }

    public function getDataDosenWali()
    {
        $this->db->select('*');
        $this->db->from('dosen_wali');
        $this->db->join('master_dosen', 'master_dosen.id_dosen = dosen_wali.id_dosen');
        return $this->db->get();
    }

    public function getDetailWaliKolektif($token)
    {
        $this->db->select('*');
        $this->db->from('dosen_wali');
        $this->db->join('master_dosen', 'master_dosen.id_dosen = dosen_wali.id_dosen');
        $this->db->where('token', $token);
        return $this->db->get();
    }

    public function getDataDosenGenerate($kategori)
    {
        if ($kategori == 'non') {
            return $this->db->get_where('master_dosen', ['nidn' => 0]);
        } else {
            return $this->db->query("SELECT * FROM master_dosen where nidn != 0");
        }
    }

    public function getDosenWaliMahasiswa($id, $role)
    {
        $this->db->select('id_mahasiswa, perkuliahan_wali.nim, nama_mahasiswa, master_mahasiswa.nama_status_mahasiswa, master_mahasiswa.id_prodi');
        $this->db->from('perkuliahan_wali');
        $this->db->join('dosen_wali', 'dosen_wali.token = perkuliahan_wali.token');
        $this->db->join('master_mahasiswa', 'perkuliahan_wali.nim = master_mahasiswa.nim');
        if ($role == "dosen") {
            $this->db->where('dosen_wali.id_dosen', $id);
        }
        return $this->db->get();
    }

    public function hitungSksPengajuanKRS($nim, $id_prodi)
    {
        $semester = $this->getSemesterAktif();
        $this->db->select('SUM(master_matkul.sks_mata_kuliah) as totalSks');
        $this->db->from('perkuliahan_mahasiswa');
        $this->db->join('perkuliahan_kelas', 'perkuliahan_kelas.id_perkuliahan_kelas = perkuliahan_mahasiswa.id_perkuliahan_kelas', 'left');
        $this->db->join('master_prodi', 'perkuliahan_kelas.id_prodi = master_prodi.id_prodi', 'left');
        $this->db->join('master_matkuls', 'perkuliahan_kelas.id_matkul = master_matkuls.id_matkul', 'left');
        $this->db->join('master_matkul', 'master_matkul.id_matkul = master_matkuls.id_matkul', 'left');
        $this->db->join('master_ruangan', 'perkuliahan_kelas.id_ruangan = master_ruangan.id_ruangan', 'left');
        $this->db->where('perkuliahan_mahasiswa.nim', $nim);
        $this->db->where('perkuliahan_kelas.id_semester', $semester);
        $this->db->where('master_matkul.id_prodi', $id_prodi);
        $this->db->order_by('master_matkul.semester', 'asc');
        return $this->db->get();
    }

    public function getDataKrsMhs($nim, $id_prodi)
    {
        $semester = $this->getSemesterAktif();
        $this->db->select('*, perkuliahan_mahasiswa.status as statusKrs');
        $this->db->from('perkuliahan_mahasiswa');
        $this->db->join('perkuliahan_kelas', 'perkuliahan_kelas.id_perkuliahan_kelas = perkuliahan_mahasiswa.id_perkuliahan_kelas', 'left');
        $this->db->join('master_prodi', 'perkuliahan_kelas.id_prodi = master_prodi.id_prodi', 'left');
        $this->db->join('master_matkuls', 'perkuliahan_kelas.id_matkul = master_matkuls.id_matkul', 'left');
        $this->db->join('master_matkul', 'master_matkul.id_matkul = master_matkuls.id_matkul', 'left');
        $this->db->join('master_ruangan', 'perkuliahan_kelas.id_ruangan = master_ruangan.id_ruangan', 'left');
        $this->db->where('perkuliahan_mahasiswa.nim', $nim);
        $this->db->where('perkuliahan_kelas.id_semester', $semester);
        $this->db->where('master_matkul.id_prodi', $id_prodi);
        $this->db->order_by('master_matkul.semester', 'asc');
        return $this->db->get();
    }

    public function getDataDosenKrs($idperkuliahan)
    {
        $this->db->select('*');
        $this->db->from('perkuliahan_dosen');
        $this->db->join('master_dosen', 'master_dosen.id_dosen = perkuliahan_dosen.id_dosen');
        $this->db->where('perkuliahan_dosen.id_perkuliahan_kelas', $idperkuliahan);
        return $this->db->get();
    }

    public function getJumlahMhsKelas($idperkuliahan)
    {
        $data = $this->db->query("SELECT COUNT(id_perkuliahan_kelas) as jumlahMhsKelas from perkuliahan_mahasiswa where id_perkuliahan_kelas = '$idperkuliahan'")->row_array();
        return $data['jumlahMhsKelas'];
    }

    public function getJumlahMhsNilai($idperkuliahan)
    {
        $data = $this->db->query("SELECT COUNT(id_perkuliahan_kelas) as jumlahNilaiKelas from perkuliahan_nilai where id_perkuliahan_kelas = '$idperkuliahan'")->row_array();
        return $data['jumlahNilaiKelas'];
    }

    public function getSemesterKhs($nim)
    {
        return $this->db->query("SELECT perkuliahan_nilai.id_semester, nama_semester from perkuliahan_nilai join master_semester on master_semester.id_semester = perkuliahan_nilai.id_semester where nim = '$nim' group by id_semester");
    }

    public function getKhsMahasiswa($nim, $semester, $prodi)
    {
        $this->db->select('*');
        $this->db->from('perkuliahan_nilai');
        $this->db->join('master_matkul', 'master_matkul.id_matkul = perkuliahan_nilai.id_matkul');
        $this->db->join('master_kurikulum', 'master_kurikulum.id_kurikulum = master_matkul.id_kurikulum');
        $this->db->where('perkuliahan_nilai.nim', $nim);
        $this->db->where('perkuliahan_nilai.id_semester', $semester);
        $this->db->where('master_matkul.id_prodi', $prodi);
        return $this->db->get();
    }

    public function getJumlahKhs($nim, $semester)
    {
        $this->db->select('SUM(master_matkuls.sks_mata_kuliah) as jumlahSks');
        $this->db->from('perkuliahan_nilai');
        $this->db->join('master_matkuls', 'master_matkuls.id_matkul = perkuliahan_nilai.id_matkul');
        $this->db->where('perkuliahan_nilai.nim', $nim);
        $this->db->where('perkuliahan_nilai.id_semester', $semester);
        $data = $this->db->get()->row_array();

        return $data['jumlahSks'];
    }

    public function getinfoDosen($token)
    {
        return $this->db->query("SELECT master_dosen.nama_dosen, master_dosen.nidn, master_dosen.nik, master_dosen.id_dosen from master_dosen join dosen_wali on dosen_wali.id_dosen = master_dosen.id_dosen where dosen_wali.token = '$token'");
    }

    public function getDetailWali($token)
    {
        $this->db->select('master_mahasiswa.nim, master_mahasiswa.nama_mahasiswa, master_prodi.nama_program_studi');
        $this->db->from('perkuliahan_wali');
        $this->db->join('master_mahasiswa', 'master_mahasiswa.nim = perkuliahan_wali.nim');
        $this->db->join('master_prodi', 'master_prodi.id_prodi = master_mahasiswa.id_prodi');
        $this->db->where('perkuliahan_wali.token', $token);
        return $this->db->get();
    }

    public function getKelasPerkuliahanDosen($id_dosen)
    {
        $this->db->select('perkuliahan_kelas.semester_perkuliahan, perkuliahan_dosen.id_dosen, master_dosen.nama_dosen, master_matkuls.kode_mata_kuliah, master_matkuls.nama_mata_kuliah, perkuliahan_kelas.nama_kelas, perkuliahan_kelas.kuota_kelas, master_gedung.nama_gedung, master_ruangan.nama_ruangan, perkuliahan_kelas.id_perkuliahan_kelas, perkuliahan_kelas.token, perkuliahan_kelas.hari, perkuliahan_kelas.jam_awal, perkuliahan_kelas.jam_akhir, master_matkuls.sks_mata_kuliah');
        $this->db->from('perkuliahan_kelas');
        $this->db->join('master_prodi', 'perkuliahan_kelas.id_prodi = master_prodi.id_prodi', 'left');
        $this->db->join('master_matkuls', 'perkuliahan_kelas.id_matkul = master_matkuls.id_matkul', 'left');
        $this->db->join('master_ruangan', 'perkuliahan_kelas.id_ruangan = master_ruangan.id_ruangan', 'left');
        $this->db->join('master_gedung', 'master_gedung.id_gedung = master_ruangan.id_gedung', 'left');
        $this->db->join('perkuliahan_dosen', 'perkuliahan_dosen.id_perkuliahan_kelas = perkuliahan_kelas.id_perkuliahan_kelas', 'left');
        $this->db->join('master_dosen', 'master_dosen.id_dosen = perkuliahan_dosen.id_dosen', 'left');
        $this->db->where('perkuliahan_dosen.id_dosen', $id_dosen);
        $this->db->where('perkuliahan_kelas.id_semester', $this->getSemesterAktif());

        return $this->db->get();
    }

    public function getDataSetting()
    {
        $this->db->select('*');
        $this->db->from('settings');
        $this->db->join('master_semester', 'master_semester.id_semester = settings.id_semester');
        $this->db->where('status_setting', '1');
        return $this->db->get();
    }

    public function getSemester($id = null)
    {
        if (empty($id)) {
            $this->db->order_by('id_semester', 'desc');
        } else {
            $this->db->where('id_semester', $id);
        }
        return $this->db->get('master_semester');
    }

    public function getKrsLaporan($nim, $semester)
    {
        $this->db->select('*');
        $this->db->from('perkuliahan_mahasiswa');
        $this->db->join('perkuliahan_kelas', 'perkuliahan_kelas.id_perkuliahan_kelas = perkuliahan_mahasiswa.id_perkuliahan_kelas', 'left');
        $this->db->join('master_matkuls', 'master_matkuls.id_matkul = perkuliahan_kelas.id_matkul', 'left');
        $this->db->where('perkuliahan_mahasiswa.nim', $nim);
        $this->db->where('perkuliahan_kelas.id_semester', $semester);
        $this->db->order_by("master_matkuls.kode_mata_kuliah", "asc");
        return $this->db->get();
    }

    public function getDataSemesterKrsPrint($nim, $id_prodi, $semester)
    {
        $this->db->select('master_matkul.semester, perkuliahan_kelas.id_prodi');
        $this->db->from('perkuliahan_mahasiswa');
        $this->db->join('perkuliahan_kelas', 'perkuliahan_kelas.id_perkuliahan_kelas = perkuliahan_mahasiswa.id_perkuliahan_kelas', 'left');
        $this->db->join('master_matkuls', 'master_matkuls.id_matkul = perkuliahan_kelas.id_matkul', 'left');
        $this->db->join('master_matkul', 'master_matkul.id_matkul = master_matkuls.id_matkul', 'left');
        $this->db->where('master_matkul.id_prodi', $id_prodi);
        $this->db->where('perkuliahan_kelas.id_prodi', $id_prodi);
        $this->db->where('perkuliahan_kelas.id_semester', $semester);
        $this->db->where('perkuliahan_mahasiswa.nim', $nim);
        $this->db->group_by('master_matkul.semester');
        $this->db->order_by('master_matkul.semester', 'asc');
        return $this->db->get();
    }

    public function getMatkulKrsMhs($id_prodi, $semester_get, $nim, $semester)
    {
        $this->db->select('*');
        $this->db->from('perkuliahan_kelas');
        $this->db->join('perkuliahan_mahasiswa', 'perkuliahan_mahasiswa.id_perkuliahan_kelas = perkuliahan_kelas.id_perkuliahan_kelas', 'left');
        $this->db->join('master_matkuls', 'master_matkuls.id_matkul = perkuliahan_kelas.id_matkul', 'left');
        $this->db->join('master_matkul', 'master_matkul.id_matkul = master_matkuls.id_matkul', 'left');
        $this->db->join('master_ruangan', 'master_ruangan.id_ruangan = perkuliahan_kelas.id_ruangan', 'left');
        $this->db->where('master_matkul.id_prodi', $id_prodi);
        $this->db->where('perkuliahan_kelas.id_prodi', $id_prodi);
        $this->db->where('perkuliahan_kelas.id_semester', $semester);
        $this->db->where('master_matkul.semester', $semester_get);
        $this->db->where('perkuliahan_mahasiswa.nim', $nim);
        $this->db->order_by('master_matkul.semester', 'asc');
        return $this->db->get();
    }
}

  
/* End of file Core_model.php and path \application\models\Core_model.php */
