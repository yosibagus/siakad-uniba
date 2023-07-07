<div class="sidebar-body pt-0 data-scrollbar">
    <div class="sidebar-list">
        <!-- Sidebar Menu Start -->
        <ul class="navbar-nav iq-main-menu" id="sidebar-menu">

            <?php
            $level = $this->session->userdata('level_operator');
            if ($level == 'admin') :
                // home
                $this->load->view('layout/menu/home/home_header');
                $this->load->view('layout/menu/home/home_sub_dashboard');
                $this->load->view('layout/menu/home/home_sub_sdm');
                // master
                $this->load->view('layout/menu/master/master_header');
                $this->load->view('layout/menu/master/master_sub_keuangan');
                $this->load->view('layout/menu/master/master_sub_referensi');
                // $this->load->view('layout/menu/master/master_sub_pengaturan');
                //akademik
                $this->load->view('layout/menu/akademik/akademik_header');
                $this->load->view('layout/menu/akademik/akademik_sub_mahasiswa');
                $this->load->view('layout/menu/akademik/akademik_sub_perkuliahan');
                $this->load->view('layout/menu/akademik/akademik_sub_dosenwali');
                $this->load->view('layout/menu/akademik/akademik_sub_validasi_krs');
                //laporan
                $this->load->view('layout/menu/laporan/laporan_header');
                $this->load->view('layout/menu/laporan/laporan_sub_mhs');
                $this->load->view('layout/menu/laporan/laporan_sub_dosen');
                //setting
                $this->load->view('layout/menu/setting/setting_header');
                $this->load->view('layout/menu/setting/setting_sub_setglobal');
                $this->load->view('layout/menu/setting/setting_sub_manajemen_user');
            elseif ($level == 'keuangan') :
                //home
                $this->load->view('layout/menu/home/home_header');
                $this->load->view('layout/menu/home/home_sub_dashboard');
                //master
                $this->load->view('layout/menu/master/master_header');
                $this->load->view('layout/menu/master/master_sub_keuangan');
                $this->load->view('layout/menu/akademik/akademik_header');
                $this->load->view('layout/menu/akademik/akademik_sub_mahasiswa');
            elseif ($level == 'akademik') :
                // home
                $this->load->view('layout/menu/home/home_header');
                $this->load->view('layout/menu/home/home_sub_dashboard');
                //akademik
                $this->load->view('layout/menu/akademik/akademik_header');
                $this->load->view('layout/menu/akademik/akademik_sub_mahasiswa');
                $this->load->view('layout/menu/akademik/akademik_sub_perkuliahan');
                $this->load->view('layout/menu/akademik/akademik_sub_dosenwali');
                //laporan
                $this->load->view('layout/menu/laporan/laporan_header');
                $this->load->view('layout/menu/laporan/laporan_sub_mhs');
                $this->load->view('layout/menu/laporan/laporan_sub_dosen');
            elseif ($level == 'dosen') :
                // home
                $data['detail'] = $this->db->get_where('tb_akun', ['id_user' => $this->session->userdata('id_user')])->row_array();
                $this->load->view('layout/menu/home/sub_header', $data);
                $this->load->view('layout/menu/home/home_header');
                $this->load->view('layout/menu/home/home_sub_dashboard');
                //akademik
                $this->load->view('layout/menu/akademik/akademik_header');
                $this->load->view('layout/menu/akademik/akademik_sub_mahasiswa');
                $this->load->view('layout/menu/akademik/akademik_sub_perkuliahan');

                $this->load->view('layout/menu/akademik/akademik_sub_validasi_krs');
            endif;
            ?>
        </ul>

        <!-- Sidebar Menu End -->
    </div>
</div>