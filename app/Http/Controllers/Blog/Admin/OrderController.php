<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\AdminBaseController;
use App\Repositories\Admin\MainRepository;
use App\Repositories\Admin\OrderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends AdminBaseController
{

    private $orderRepository;


    public function __construct()
    {
        parent::__construct();
        $this->orderRepository = app(OrderRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prepage = 5;
        \MetaTag::setTags(['title'=>'Список заказов']);
        $countOrders = MainRepository::getCountOrders();
        $paginator = $this->orderRepository->getAllOrders(5);
        return view('admin.order.index',compact('countOrders','paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->orderRepository->getById($id);
        if(empty($item)){
            abort(404);
        }
        $order = $this->orderRepository->getOneOrder($item->id);
        $order_products = $this->orderRepository->getallOrderProductsId($item->id);

        \MetaTag::setTags(['title'=>"Заказ № {$item->id}"]);

        return view('admin.order.edit',compact('order','order_products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
