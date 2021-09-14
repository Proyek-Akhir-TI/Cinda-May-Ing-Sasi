<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        echo view('home');
    }

    public function generate(){
        echo password_hash('12345', PASSWORD_BCRYPT);
    }
}

