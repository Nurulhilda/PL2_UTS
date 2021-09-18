<?php

class PembayaranModel
{
    private $table = 'pembayaran';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPembayaran()
    {
        $this->db->query('SELECT * FROM ' . $this->table);

        return $this->db->resultSet();
    }

    public function getPembayaranById($id_pembayaran)
    {
        $this->db->query(' SELECT * FROM ' . $this->table . ' WHERE id_pembayaran=:id_pembayaran ');
        $this->db->bind('id_pembayaran', $id_pembayaran);

        return $this->db->single();
    }

    public function tambahPembayaran($data)
    {
        $this->db->query("INSERT INTO pembayaran VALUES ('', :id_petugas, :nisn, :tgl_bayar, :bulan_bayar, :tahun_bayar, :id_spp, :jumlah_bayar)");
        $this->db->bind('id_petugas', $_SESSION['id_petugas']);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('tgl_bayar', $data['tgl_bayar']);
        $this->db->bind('bulan_bayar', $data['bulan_bayar']);
        $this->db->bind('tahun_bayar', $data['tahun_bayar']);
        $this->db->bind('id_spp', $data['id_spp']);
        $this->db->bind('jumlah_bayar', $data['jumlah_bayar']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusPembayaran($id_pembayaran)
    {
        $this->db->query('DELETE FROM pembayaran WHERE id_pembayaran = :id_pembayaran');
        $this->db->bind('id_pembayaran', $id_pembayaran);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahPembayaran($data)
    {
        $this->db->query('UPDATE pembayaran SET id_petugas = :id_petugas, nisn = :nisn, tgl_bayar = :tgl_bayar, bulan_bayar = :bulan_bayar, tahun_bayar = :tahun_bayar, id_spp = :id_spp, jumlah_bayar = :jumlah_bayar WHERE id_pembayaran = :id_pembayaran');
        $this->db->bind('id_pembayaran', $data['id_pembayaran']);
        $this->db->bind('id_petugas', $_SESSION['id_petugas']);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('tgl_bayar', $data['tgl_bayar']);
        $this->db->bind('bulan_bayar', $data['bulan_bayar']);
        $this->db->bind('tahun_bayar', $data['tahun_bayar']);
        $this->db->bind('id_spp', $data['id_spp']);
        $this->db->bind('jumlah_bayar', $data['jumlah_bayar']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
