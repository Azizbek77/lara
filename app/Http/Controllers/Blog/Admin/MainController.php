<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\AdminBaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MetaTag;
class MainController extends AdminBaseController
{


    public function index(){
        MetaTag::setTags([
            'title' => 'Админ панел',
        ]);
        return view('admin.main.index');
    }
}
