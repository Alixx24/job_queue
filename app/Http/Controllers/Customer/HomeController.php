<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repository\CusomerHomeRepo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $repo;

    public function __construct(CusomerHomeRepo $repo)
    {
        $this->repo = $repo;
    }
    public function index()
    {
         
       return $this->repo->index();
    }

    public function showPost(Post $post)
    {
       return $this->repo->showPost($post);
    }
}
