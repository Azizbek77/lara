<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\AdminBaseController;
use App\Repositories\Admin\OrderRepository;
use App\Repositories\Admin\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\MainRepository;
use MetaTag;
class MainController extends AdminBaseController
{
    private $orderRepository;
    private $productRepository;


    public function __construct()
    {
        parent::__construct();
        $this->productRepository = app(ProductRepository::class);
        $this->orderRepository = app(OrderRepository::class);
    }


    public function index(){

        $countOrders = MainRepository::getCountOrders();
        $countUsers = MainRepository::getCountUsers();
        $countProducts = MainRepository::getCountProducts();
        $countCategories = MainRepository::getCountCategories();

        $perpage = 4;
        $last_orders = $this->orderRepository->getAllOrders($perpage);
        $last_products = $this->productRepository->getLastProducts($perpage);
        MetaTag::setTags([
            'title' => 'Админ панел',
        ]);
        return view('admin.main.index',compact(
            'countOrders',
            'countProducts',
            'countUsers',
            'countCategories',
            'last_orders',
            'last_products'
        ));
    }
}
