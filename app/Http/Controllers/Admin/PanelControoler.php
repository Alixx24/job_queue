<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repository\PanelRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanelControoler extends Controller
{
    private $repo;
    public function __construct(PanelRepo $repo)
    {
        $this->repo = $repo;
    }
    public function index(Request $request)
    {
        // dd(Auth::user()->id);
        return $this->repo->index($request);
    }

}
