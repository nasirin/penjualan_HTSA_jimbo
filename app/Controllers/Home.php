<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'HTSA|Dashboard',
			'active' => 'home'
		];
		return view('backend/pages/home',$data);
	}

}
