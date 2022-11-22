<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;

class LoginController extends BaseController

{

	public function show_auth_login()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Login'])
		];
		return view('auth-login', $data);

	}
	
	public function doLogin()
	{
		$email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
		
		$user = new Users();
		$data = $user->where('email', $email)->first();
		if( $data )
		{
			$session = session();
			if( password_verify($password, $data['password']) )
			{
                                //create session
				$login = [
                                                        'islogin' => true,
							'email'=> $data['email'],
							'name' => $data['name']
						];
				$session->set($login);
				return redirect()->to('/home');

			}else{
				$session->setFlashdata('msg', 'Email/Password invalid');
                return redirect()->to('/login');
			}
		}
	}

	public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

}
