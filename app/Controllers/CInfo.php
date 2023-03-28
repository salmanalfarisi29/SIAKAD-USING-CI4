<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CInfo extends BaseController
{
    public function index()
    {
        $data['tittle'] = 'Page Info';
        echo view('layout/v_header', $data);
        echo view('layout/v_navbar');
        echo view('v_info', $data);
        echo view('layout/v_footer');
    }
}