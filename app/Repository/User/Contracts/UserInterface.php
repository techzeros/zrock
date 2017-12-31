<?php

namespace App\Repository\User\Contracts;

interface UserInterface 
{
	public function all();
	public function userAgent();
	public function activateUser();
}
