<?php
 
namespace App\Controllers;
 
use CodeIgniter\Controller;
 
class helloworld extends Controller
{
    public function index()
    {
        $data['title']  = 'SALMAN ALFARISI - 211511059';
        $data['msg1']    = 'PPL';
        $data['msg2']    = 'HELLO WORLD';
        echo view('helloworld', $data);
    }
}