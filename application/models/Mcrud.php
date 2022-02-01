<?php

class Mcrud extends CI_Model
{
    public function get_all_data($tabel)
    {
        $q = $this->db->get($tabel);
        return $q;
    }

    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

    public function get_by_id($tabel, $id)
    {
        return $this->db->get_where($tabel, $id);
    }

    public function get_ongkir()
    {
        $q = $this->db->query("SELECT b.idBiayaKirim, r.namaKurir, k.namaKota AS asal, t.namaKota AS tujuan, b.biaya FROM tbl_biaya_kirim b 
            JOIN tbl_kota k ON b.idKotaAsal=k.idKota JOIN tbl_kota t ON b.idKotaTujuan=t.idKota JOIN tbl_kurir r ON b.idKurir=r.idKurir");
        return $q;
    }

    public function cek_duplicate_ongkir($idKurir, $idKotaAsal, $idKotaTujuan)
    {
        $q = $this->db->query("SELECT * FROM tbl_biaya_kirim WHERE idKurir=$idKurir AND idKotaAsal=$idKotaAsal And idKotaTujuan=$idKotaTujuan");
        return $q;
    }
    public function update($tabel, $data, $pk, $id)
    {
        $this->db->where($pk, $id);
        $this->db->update($tabel, $data);
    }
    public function delete_kategori($idkat)
    {
        $this->db->where('idKat', $idkat);
        $this->db->delete('tbl_kategori');
    }
    public function delete_kota($idKota)
    {
        $this->db->where('idKota', $idKota);
        $this->db->delete('tbl_kota');
    }

    public function delete_ongkir($idBiayaKirim)
    {
        $this->db->where('idBiayaKirim', $idBiayaKirim);
        $this->db->delete('tbl_biaya_kirim');
    }
}
