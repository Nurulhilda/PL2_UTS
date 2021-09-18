<?php

class KelasController extends Controller
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
            $data['title'] = 'Kelas';
            $data['content'] = 'kelas/index';
            $data['kelas'] = $this->model('KelasModel')->getKelas();
            $this->view('layout/app', $data);
        }
    }

    public function tambah()
    {
        if (!isset($_SESSION['is_login'])) {
            header('Location: ' . BASEURL);
        } else {
            $this->model('KelasModel')->tambahKelas($_POST);
            header('Location: ' . BASEURL . 'KelasController');
            exit;
        }
    }

    public function hapus($id_kelas)
    {
        if (!isset($_SESSION['is_login'])) {
            header('Location: ' . BASEURL);
        } else {
            $this->model('KelasModel')->hapusKelas(base64_decode($id_kelas));
            header('Location: ' . BASEURL . 'KelasController');
            exit;
        }
    }

    public function getUbah($id_kelas)
    {
        $url = $this->parseUrl();
        $data['uri_segment'] = $url['1'];
        $data['getkelas'] = $this->model('KelasModel')->getKelasById(base64_decode($id_kelas));
        $data['kelas'] = $this->model('KelasModel')->getKelas();
        $data['title'] = 'Kelas';
        $data['content'] = 'kelas/index';
        $this->view('layout/app', $data);
    }

    public function ubahData()
    {
        if (!isset($_SESSION['is_login'])) {
            header('Location: ' . BASEURL);
        } else {
            $this->model('KelasModel')->ubahKelas($_POST);
            header('Location: ' . BASEURL . 'KelasController');
            exit;
        }
    }
}
