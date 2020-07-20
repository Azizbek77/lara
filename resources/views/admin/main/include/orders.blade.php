<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Последие заказы</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>

        </div>
    </div>

    <div class="box-body">
        <div class="table-responsive">
            <table class="table no-margin">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Покупател</th>
                    <th>Статус</th>
                    <th>Сумма</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($last_orders as $order)
                        <tr>
                            <td> <a href="">{{$order->id}}</a></td>
                            <td> <a href="">{{$order->name}}</a></td>
                            <td> <span class="label label-success">
                                    @if($order->status == 0) Новий @endif
                                    @if($order->status == 1) Завершен @endif
                                        @if($order->status == 2)<b style="">Удален</b>@endif

                                </span></td>

                            <td>
                                <div class="sparkbar" data-color="#00a64a" data-height="20">{{$order->sum}}</div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <br>
    </div>
    <div class="box-footer clearfix">
        <a href="" class="btn btn-sm btn-info btn-flat pull-left">Все заказы</a>
    </div>
</div>
