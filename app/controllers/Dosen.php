<?php

namespace App\Controllers;

use App\Core\Controller;

class Dosen extends Controller
{
	public function index()
	{
		$this->dashboard('dosen/index');
	}
}
