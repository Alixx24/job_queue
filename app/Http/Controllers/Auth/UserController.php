<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repository\UserRepo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class UserController extends Controller
{
    private $repo;

    public function __construct(UserRepo $repo)
    {
        $this->repo = $repo;
       
        
    }
    public function index()
    {
        return $this->repo->index();
    }

    public function login()
    {
        return $this->repo->login();
    }

    public function checkLogin(Request $request, Response $response)
    {
        $this->repo->checkLogin($request, $response);
    }

    public function store(Request $request)
    {
        return $this->repo->store($request);
    }

    public function logOut(Request $request)
    {
        return $this->repo->logOut($request);
    }
}
