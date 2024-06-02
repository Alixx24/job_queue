<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repository\ProfileRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public $repo;

    public function __construct(ProfileRepo $repo)
    {
        $this->repo = $repo;
    }
    public function index()
    {
        return $this->repo->index();
    }

    public function birthDayUpdate(Request $request)
    {
    }

    public function update(Request $request)
    {
        return $this->repo->update($request);
    }
}
