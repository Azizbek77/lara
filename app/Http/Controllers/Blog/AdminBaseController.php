<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Blog\BaseController;

 abstract  class AdminBaseController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('status');
    }
 }
