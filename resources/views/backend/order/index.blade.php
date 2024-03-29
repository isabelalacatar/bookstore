@extends('layouts.app')

@section('content')
<table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Orders</th>
        </tr>
        @foreach ($orders as $order)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $order->quantity }}</td>
            <td>{{ $order->totalprice }}</td>
            <td>{{ $order->orderdate }}</td>
        </tr>
        @endforeach
    </table>
    
    {!! $orders->links() !!}
        
@endsection