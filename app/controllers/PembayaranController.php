<?php

class PembayaranController extends Controller
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
            $data['title'] = 'Pembayaran';
            $data['content'] = 'pembayaran/index';
            $data['pembayaran'] = $this->model('PembayaranModel')->getPembayaran();
            $this->view('layout/app', $data);
        }
    }

    public function tambah()
    {
        if (!isset($_SESSION['is_login'])) {
            header('Location: ' . BASEURL);
        } else {
            $this->model('PembayaranModel')->tambahPembayaran($_POST);
            header('Location: ' . BASEURL . 'PembayaranController');
            exit;
        }
    }

    public function hapus($id_pembayaran)
    {
        if (!isset($_SESSION['is_login'])) {
            header('Location: ' . BASEURL);
        } else {
            $this->model('PembayaranModel')->hapusPembayaran(base64_decode($id_pembayaran));
            header('Location: ' . BASEURL . 'PembayaranController');
            exit;
        }
    }

    public function getUbah($id_pembayaran)
    {
        $url = $this->parseUrl();
        $data['uri_segment'] = $url['1'];
        $data['getpembayaran'] = $this->model('PembayaranModel')->getPembayaranById(base64_decode($id_pembayaran));
        $data['pembayaran'] = $this->model('PembayaranModel')->getPembayaran();
        $data['title'] = 'Pembayaran';
        $data['content'] = 'pembayaran/index';
        $this->view('layout/app', $data);
    }

    public function ubah()
    {
        if (!isset($_SESSION['is_login'])) {
            header('Location: ' . BASEURL);
        } else {
            $this->model('PembayaranModel')->ubahPembayaran($_POST);
            header('Location: ' . BASEURL . 'PembayaranController');
            exit;
        }
    }
}
