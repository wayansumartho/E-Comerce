<?php

class TopUp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mfrontend');
    }

    public function pulsa()
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $this->template->load('layout_frontend', 'frontend/TopUp/pulsa', $data);
    }
    public function listrik()
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $this->template->load('layout_frontend', 'frontend/TopUp/listrik', $data);
    }
    public function air()
    {
        $data['kota'] = $this->Mfrontend->get_all_kota()->result();
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $this->template->load('layout_frontend', 'frontend/TopUp/air', $data);
    }
    public function wifi_tv()
    {
        $data['perusahaan'] = $this->Mfrontend->get_all_perusahaan()->result();
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $this->template->load('layout_frontend', 'frontend/TopUp/wifi_tv', $data);
    }
}
