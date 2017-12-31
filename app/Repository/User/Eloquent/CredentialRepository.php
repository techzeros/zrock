<?php

namespace App\Repository\User\Eloquent;

use App\Models\User\Credential;
use App\Repository\User\Contracts\CredentialInterface;

class CredentialRepository implements CredentialInterface
{
	protected $credential;

    /**
     * Create a new credential Repository instance
     * 
     * @return void
     */
	public function __construct(Credential $credential)
	{
		$this->credential = $credential;
	}

    /**
     * Set the verified status to true and make the email token null
     * 
     * @return void
     */
    
    



}