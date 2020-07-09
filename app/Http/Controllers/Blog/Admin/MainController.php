<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\AdminBaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends AdminBaseController
{
    public function index(){
        return view('admin.main.index');
    }
}
