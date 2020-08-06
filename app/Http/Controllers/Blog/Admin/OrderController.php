<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\AdminBaseController;
use App\Http\Requests\AdminOrderSaveRequest;
use App\Models\Admin\Order;
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
        $prepage = 10;
        \MetaTag::setTags(['title'=>'Список заказов']);
        $countOrders = MainRepository::getCountOrders();
        $paginator = $this->orderRepository->getAllOrders($prepage);
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

        return view('admin.order.edit',compact('order','order_products','item'));
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
        $item = $this->orderRepository->changeStatusOnDelete($id);

        if($item){
            $res = Order::destroy($id);
            return redirect()
                ->route('blog.admin.orders.index')
                ->with(['success'=>'Запис {$id} удаления']);

        }else{
            return back()->withErrors(['msg'=>'Ошибка удаления']);
        }



    }

    public function change($id){
        $result = $this->orderRepository->changeStatusOrder($id);

        if($result){
            return redirect()
                ->route('blog.admin.orders.edit',$id)
                ->with(['success'=>'Успешно сохранено']);
        }else{
            return back()
                ->withErrors(['msg'=>'Ошибка сохранентя']);
        }

    }


    public function save(AdminOrderSaveRequest $request ,$id){
        $res = $this->orderRepository->saveOrderComment($id);

        if($res){
            return redirect()
                ->route('blog.admin.orders.edit',$id)
                ->with(['success'=>'Успешно сохранено']);
        }else{
            return back()
                ->withErrors(['msg'=>'Ошибка сохранентя']);
        }
    }

    public function forcedestroy($id){
        if(empty($id)){
            return back()->withErrors(['msg'=>'zapis ne naydeno']);
        }
        $res = \DB::table('orders')->delete($id);

        return back();
    }

}
