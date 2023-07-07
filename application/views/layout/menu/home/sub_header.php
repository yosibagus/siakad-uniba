<div class="sidebar-profile-card mt-3">
    <div class="sidebar-profile-body">
        <div class="mb-3 d-flex justify-content-center">
            <div class="rounded rounded-3 border border-primary p-2">
                <img src="<?= base_url('assets/admin/foto/') . $detail['foto_akun'] ?>" alt="User-Profile" class="img-fluid rounded" loading="lazy">
            </div>
        </div>
        <div class="sidebar-profile-detail">
            <h6 class="sidebar-profile-name"><?= $this->session->userdata('nama_akun') ?></h6>
            <span class="sidebar-profile-username"><?= $this->session->userdata('tipe'); ?></span>
        </div>
    </div>
</div>
<hr class="hr-horizontal">