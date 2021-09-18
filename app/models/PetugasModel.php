<?php

class PetugasModel
{
    private $table = 'petugas';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function loginPetugas($inputUsername)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username=:username ');
        $this->db->bind('username', $inputUsername);
        return $this->db->single();
    }

    public function getPetugas()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPetugasById($id_petugas)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_petugas=:id_petugas ');
        $this->db->bind('id_petugas', $id_petugas);
        return $this->db->single();
    }

    public function tambahDataPetugas($data)
    {
        $this->db->query("INSERT INTO petugas VALUES ('', :username, :password, :nama_petugas, :level)");
        $this->db->bind('username', $data['inputUsername']);
        $this->db->bind('password', password_hash($data['inputPassword'], PASSWORD_DEFAULT));
        $this->db->bind('nama_petugas', $data['inputNamaPetugas']);
        $this->db->bind('level', $data['selectLevel']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPetugas($id_petugas)
    {
        $this->db->query("DELETE FROM petugas WHERE id_petugas = :id_petugas");
        $this->db->bind('id_petugas', $id_petugas);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataPetugas($data)
    {
        $this->db->query("UPDATE petugas SET username = :username, password = :password, nama_petugas = :nama_petugas, level = :level WHERE id_petugas = :id_petugas");
        $this->db->bind('id_petugas', $data['id_petugas']);
        $this->db->bind('username', $data['inputUsername']);
        $this->db->bind('password', password_hash($data['inputPassword'], PASSWORD_DEFAULT));
        $this->db->bind('nama_petugas', $data['inputNamaPetugas']);
        $this->db->bind('level', $data['selectLevel']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
