<?php

class Mtoko extends CI_Model
{
    public function get_toko($idToko)
    {
        $q = $this->db->get_where('tbl_toko', array('idToko' => $idToko));
        return $q;
    }
    public function get_produk_by_toko($idToko)
    {
        $q = $this->db->get_where('tbl_produk', array('idToko' => $idToko));
        return $q;
    }
    public function insert_produk($data)
    {
        $this->db->insert('tbl_produk', $data);
    }
    public function get_produk_by_id($idProduk)
    {
        $q = $this->db->get_where('tbl_produk', array('idProduk' => $idProduk));
        return $q;
    }
    public function update_produk($tabel, $data, $pk, $id)
    {
        $this->db->where($pk, $id);
        $this->db->update($tabel, $data);
    }
    public function delete_produk($idProduk)
    {
        $this->db->where('idProduk', $idProduk);
        $this->db->delete('tbl_produk');
    }
    public function get_transaksi_by_toko($idToko)
    {
        return $this->db->query("SELECT * FROM tbl_order o, tbl_member m WHERE o.idKonsumen = m.idKonsumen AND o.idToko=$idToko");
    }
    public function invoice($idOrder)
    {
        return $this->db->query("SELECT * FROM tbl_detail_order d, tbl_produk p WHERE d.idProduk=p.idProduk AND d.idOrder=$idOrder");
    }
}
