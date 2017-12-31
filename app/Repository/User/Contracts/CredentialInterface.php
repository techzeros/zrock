<?php

namespace App\Repository\User\Contracts;

interface CredentialInterface 
{
	public function activateUser();
	public function userAgent();
}
