<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Register extends BaseController
{
    public function index()
    {
        $data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Register'])
		];
        return view('auth-register',$data);
    }
}