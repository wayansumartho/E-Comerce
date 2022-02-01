<?php

class Filter extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mfrontend');
    }

    public function baju()
    {
        $cari['cari'] = 'baju';
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['produk'] = $this->Mfrontend->get_all_cari($cari['cari'])->result();

        $this->template->load('layout_frontend', 'frontend/home', $data);
    }

    public function celana()
    {
        $cari['cari'] = 'celana';
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['produk'] = $this->Mfrontend->get_all_cari($cari['cari'])->result();

        $this->template->load('layout_frontend', 'frontend/home', $data);
    }

    public function cowok()
    {
        $cari['cari'] = 'cowok';
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['produk'] = $this->Mfrontend->get_all_cari($cari['cari'])->result();

        $this->template->load('layout_frontend', 'frontend/home', $data);
    }

    public function cewek()
    {
        $cari['cari'] = 'cewek';
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['produk'] = $this->Mfrontend->get_all_cari($cari['cari'])->result();

        $this->template->load('layout_frontend', 'frontend/home', $data);
    }
}
