<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repository\PanelRepo;
use Illuminate\Http\Request;


class PanelControoler extends Controller
{
    private $repo;
    public function __construct(PanelRepo $repo)
    {
        $this->repo = $repo;
    }
    public function index()
    {
        return $this->repo->index();
    }
}
