<ul class="iq-nav-menu list-unstyled">

    <?php
    $level = $this->session->userdata('level_operator');

    if ($level == 'admin') {
        $this->load->view('layout/top_menu/home/menu_home');
        $this->load->view('layout/top_menu/master/menu_master');
        $this->load->view('layout/top_menu/akademik/menu_akademik');
        $this->load->view('layout/top_menu/laporan/menu_laporan');
        $this->load->view('layout/top_menu/setting/menu_setting');
    } else if ($level == 'akademik') {
        $this->load->view('layout/top_menu/akademik/menu_akademik');
        $this->load->view('layout/top_menu/laporan/menu_laporan');
    }




    ?>

</ul>