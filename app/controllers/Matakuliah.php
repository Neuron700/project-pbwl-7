<?php

namespace App\Controllers;

use App\Core\Controller;

class Matakuliah extends Controller
{
	public function index()
	{
		$this->dashboard('matakuliah/index');
	}
}
