<?php

class Home extends Controller
{

    public function welcome()
    {
        if (!isset($_SESSION['is_login'])) {
            header('Location: ' . BASEURL);
        } else {
            $data['content'] = 'homepage';
            $this->view('layout/app', $data);
        }
    }
}
