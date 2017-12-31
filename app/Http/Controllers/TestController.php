<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\User\Contracts\UserInterface;

class TestController extends Controller
{
    protected $user;

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Test method
     */
    public function index()
    {
        dd($this->user->all());
    }
}
