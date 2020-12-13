<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Models\UserModel;

class User extends BaseController
{

	protected $userModel;

	public function __construct()
	{
		$this->userModel = new UserModel();
	}

	public function index()
	{
		echo "user";
	}
}
