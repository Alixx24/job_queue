<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\LogPostAdmin;
use App\Models\Post;
use App\Repository\PostRepo;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $repo;
    
    public function __construct(PostRepo $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        return $this->repo->index();     
    }

    public function create()
    {
        return $this->repo->create();
    }

    public function store(Request $request)
    {
        return $this->repo->store($request);
    }
}
