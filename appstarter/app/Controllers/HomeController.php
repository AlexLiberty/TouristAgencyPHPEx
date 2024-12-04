<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Welcome to Our Tourism Agency',
            'menuItems' => [
                'login' => 'Login',
                'register' => 'Register'
            ]
        ];

        return view('home', $data);
    }
}
