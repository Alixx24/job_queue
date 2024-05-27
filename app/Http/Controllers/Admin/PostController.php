<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\PostRequest;
use App\Jobs\LogPostAdmin;
use App\Models\Post;
use App\Models\User;
use App\Repository\PostRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private $repo;

    public function __construct(PostRepo $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        // $user = Auth::user();
        // if ($user->hasRole('manager')) {
        //     return $this->repo->index();
        // }


        return $this->repo->index();
    }

    public function create()
    {
        return $this->repo->create();
    }

    public function store(PostRequest $request)
    {
        return $this->repo->store($request);
    }
}
