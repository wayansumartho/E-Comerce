<?php
class Mfrontend extends CI_Model
{
    public function get_all_kategori()
    {
        return $this->db->get('tbl_kategori');
    }
    public function get_all_kota()
    {
        return $this->db->get('tbl_kota');
    }
    public function get_all_perusahaan()
    {
        return $this->db->get('tbl_perusahaan');
    }
    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }
    public function get_all_produk_terbaru()
    {
        $this->db->order_by('idProduk', 'DESC');
        $this->db->limit(4);
        return $this->db->get('tbl_produk');
    }
    public function get_all_cari($cari)
    {
        $this->db->order_by('idProduk', 'DESC');
        $this->db->limit(4);
        $this->db->like('namaProduk', $cari);
        return $this->db->get('tbl_produk');
    }
    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tbl_produk');
        $this->db->like('namaProduk', $keyword);
        return $this->db->get()->result();
    }
    public function get_toko()
    {
        $q = $this->db->query("select tbl_toko.idToko, tbl_member.namaKonsumen, tbl_toko.namaToko, tbl_toko.logo, tbl_toko.deskripsi, tbl_toko.StatusAktif
        from tbl_toko
        join tbl_member on tbl_toko.idKonsumen = tbl_member.idKonsumen 
        group by tbl_toko.idToko, tbl_member.namaKonsumen, tbl_toko.namaToko, tbl_toko.logo, tbl_toko.deskripsi, tbl_toko.StatusAktif");
        return $q;
    }

    public function detail_produk($dataProduk)
    {
        return $this->db->get_where('tbl_produk', $dataProduk);
    }
}
