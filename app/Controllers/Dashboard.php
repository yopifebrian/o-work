<?php namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{
		$data = [];

		echo view('partials/header', $data);
		echo view('dashboard');
		echo view('partials/vendor-scripts');
	}

	//--------------------------------------------------------------------

}