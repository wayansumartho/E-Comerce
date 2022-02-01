<?php

class Saran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
        $this->load->model('Mfrontend');
    }

    private function cek_login()
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('adminpanel/dashboard');
        }
    }



    public function interface()
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['produk_terbaru'] = $this->Mfrontend->get_all_produk_terbaru()->result();

        $this->template->load('layout_frontend', 'admin/saran/saran_add', $data);
    }

    public function add()
    {
        $penilaian = $this->input->post('penilaian');
        $keterangan = $this->input->post('keterangan');
        $pelayanan = $this->input->post('pelayanan');
        $rw = $this->input->post('rw');

        $dataInsert = array('penilaian' => $penilaian, 'pelayanan' => $pelayanan, 'keterangan' => $keterangan, 'rw' => $rw);
        $this->Mcrud->insert('tbl_saran', $dataInsert);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Saran Berhasil diKirim');
        }
        redirect('saran/interface');
    }

    public function index()
    {
        $data['saran'] = $this->Mcrud->get_all_data('tbl_saran')->result();
        $this->template->load('layout_adminB', 'admin/saran/index', $data);
    }
}
