<?php

namespace App\controllers;

use App\Controllers\BaseController;

class CHome extends BaseController
{
    public function index()
    {
        $session = session();
        $data['tittle'] = "Page Home";
        echo view('layout/v_header', $data);
        echo view('layout/v_navbar');
        echo view('v_home', $data);
        echo "Welcome back, ".$session->get('username');
        echo view('layout/v_footer');
    }
}