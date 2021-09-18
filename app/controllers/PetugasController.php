<?php

class PetugasController extends Controller
{

    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }

    public function index()
    {
        if (!isset($_SESSION['is_login'])) {
            header('Location: ' . BASEURL);
        } else {
            $url = $this->parseUrl();
            $data['uri_segment'] = $url['0'];
            $data['title'] = 'Petugas';
            $data['content'] = 'petugas/index';
            $data['petugas'] = $this->model('PetugasModel')->getPetugas();
            $this->view('layout/app', $data);
        }
    }

    public function detail($id_petugas)
    {
        if (!isset($_SESSION['is_login'])) {
            header('Location: ' . BASEURL);
        } else {
            $data['title'] = 'Detail Petugas';
            $data['content'] = 'petugas/detail';
            $data['petugas'] = $this->model('PetugasModel')->getPetugasById(base64_decode($id_petugas));
            $this->view('layout/app', $data);
        }
    }

    public function tambah()
    {
        if (!isset($_SESSION['is_login'])) {
            header('Location: ' . BASEURL);
        } else {
            $this->model('PetugasModel')->tambahDataPetugas($_POST);
            header('Location: ' . BASEURL . 'PetugasController');
            exit;
        }
    }

    public function hapus($id_petugas)
    {
        if (!isset($_SESSION['is_login'])) {
            header('Location: ' . BASEURL);
        } else {
            $this->model('PetugasModel')->hapusDataPetugas(base64_decode($id_petugas));
            header('Location: ' . BASEURL . 'PetugasController');
            exit;
        }
    }

    public function getUbah($id_petugas)
    {
        $url = $this->parseUrl();
        $data['uri_segment'] = $url['1'];
        $data['getpetugas'] = $this->model('PetugasModel')->getPetugasById(base64_decode($id_petugas));
        $data['petugas'] = $this->model('PetugasModel')->getPetugas();
        $data['title'] = 'Petugas';
        $data['content'] = 'petugas/index';
        $this->view('layout/app', $data);
    }

    public function ubahData()
    {
        if (!isset($_SESSION['is_login'])) {
            header('Location: ' . BASEURL);
        } else {
            if ($this->model('PetugasModel')->ubahDataPetugas($_POST) > 0) {
                Flasher::setFlash('Data petugas', 'berhasil diubahkan', 'success');
                header('Location: ' . BASEURL . 'PetugasController');
                exit;
            } else {
                Flasher::setFlash('Data petugas', 'gagal diubahkan', 'danger');
                header('Location: ' . BASEURL . 'PetugasController');
                exit;
            }
        }
    }
}
