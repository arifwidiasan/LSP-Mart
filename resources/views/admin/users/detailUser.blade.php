@extends('admin.layout')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Riwayat Transaksi {{$user->name}} <span class="display-6 text-secondary">({{$user->email}})</span></h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash')
                    <table class="table table-bordered table-stripped">
                        <thead>
                            <th>Order</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Tanggal</th>
                        </thead>
                        <tbody>
                            @forelse ($user->order as $order)
                            <tr>
                                <td><a href="/admin/orders/{{$order->id}}">{{ $order->no_order }}</a></td>
                                <td>{{ $order->orderDetails->sum('qty') }}</td>
                                <td>{{ $order->grand_total }}</td>
                                <td>{{ $order->created_at }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">No records found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection