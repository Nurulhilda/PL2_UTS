<?php

class KelasModel
{
    private $table = 'kelas';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getKelas()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getKelasById($id_kelas)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_kelas=:id_kelas ');
        $this->db->bind('id_kelas', $id_kelas);
        return $this->db->single();
    }

    public function tambahKelas($data)
    {
        $this->db->query("INSERT INTO kelas VALUES ('', :nama_kelas, :kompetensi_keahlian)");
        $this->db->bind('nama_kelas', $data['nama_kelas']);
        $this->db->bind('kompetensi_keahlian', $data['kompetensi_keahlian']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusKelas($id_kelas)
    {
        $this->db->query('DELETE FROM kelas WHERE id_kelas = :id_kelas');
        $this->db->bind('id_kelas', $id_kelas);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahKelas($data)
    {
        $this->db->query('UPDATE kelas SET nama_kelas = :nama_kelas, kompetensi_keahlian = :kompetensi_keahlian WHERE id_kelas = :id_kelas');
        $this->db->bind('id_kelas', $data['id_kelas']);
        $this->db->bind('nama_kelas', $data['nama_kelas']);
        $this->db->bind('kompetensi_keahlian', $data['kompetensi_keahlian']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
