<?php

class SppModel
{
    private $table = 'spp';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getSpp()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getSppById($id_spp)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_spp=:id_spp ');
        $this->db->bind('id_spp', $id_spp);
        return $this->db->single();
    }

    public function tambahDataSpp($data)
    {
        $this->db->query("INSERT INTO spp VALUES ('', :tahun, :nominal)");
        $this->db->bind('tahun', $data['inputTahun']);
        $this->db->bind('nominal', $data['inputNominal']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataSpp($id_spp)
    {
        $this->db->query("DELETE FROM spp WHERE id_spp = :id_spp");
        $this->db->bind('id_spp', $id_spp);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataSpp($data)
    {
        $this->db->query("UPDATE spp SET tahun = :tahun, nominal = :nominal WHERE id_spp = :id_spp");
        $this->db->bind('id_spp', $data['id_spp']);
        $this->db->bind('tahun', $data['inputTahun']);
        $this->db->bind('nominal', $data['inputNominal']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
