<?php

class SppController extends Controller
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
            $data['title'] = 'SPP';
            $data['content'] = 'spp/index';
            $data['spp'] = $this->model('SppModel')->getSpp();
            $this->view('layout/app', $data);
        }
    }

    public function tambah()
    {
        if (!isset($_SESSION['is_login'])) {
            header('Location: ' . BASEURL);
        } else {
            if ($this->model('SppModel')->tambahDataSpp($_POST) > 0) {
                Flasher::setFlash('Data SPP', 'berhasil ditambahkan', 'success');
                header('Location: ' . BASEURL . 'SppController');
                exit;
            } else {
                Flasher::setFlash('Data SPP', 'gagal ditambahkan', 'danger');
                header('Location: ' . BASEURL . 'SppController');
                exit;
            }
        }
    }

    public function getUbah($id_spp)
    {
        $url = $this->parseUrl();
        $data['uri_segment'] = $url['1'];
        $data['getspp'] = $this->model('SppModel')->getSppById(base64_decode($id_spp));
        $data['spp'] = $this->model('SppModel')->getSpp();
        $data['title'] = 'Petugas';
        $data['content'] = 'spp/index';
        $this->view('layout/app', $data);
    }

    public function ubahData()
    {
        if (!isset($_SESSION['is_login'])) {
            header('Location: ' . BASEURL);
        } else {
            $this->model('SppModel')->ubahDataSpp($_POST);
            header('Location: ' . BASEURL . 'SppController');
            exit;
        }
    }

    public function hapus($id_spp)
    {
        if (!isset($_SESSION['is_login'])) {
            header('Location: ' . BASEURL);
        } else {
            $this->model('SppModel')->hapusDataSpp(base64_decode($id_spp));
            header('Location: ' . BASEURL . 'SppController');
            exit;
        }
    }
}
