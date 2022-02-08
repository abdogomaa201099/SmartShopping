@extends('layouts.BaseLayout')

@section('title', 'Orders')
    
@section('content')
    
<div class="container mx-auto font-mono">
    <div class="grid grid-flow-row grid-cols-1 gap-10 my-16 mx-64  bg-slate-100  border-4 border-neutral-200 shadow-xl">
    <table class="table-fixed">
        <thead> 
          <tr class="border-2 hover:bg-slate-400 bg-slate-300 ">
            <th class="pl-10">Order Id</th>
            <th class="">Issued On</th>
            <th class="">Total Price</th>
            <th class="">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $total=0;?>
          @foreach ($orders as $order)
          <tr class="border-2 hover:bg-zinc-200 ">
            <td class="pl-28">{{$order->id}}</td>
            <td class="pl-28">{{$order->updated_at}}</td>
            <td class="pl-14">RM{{$order->total_price }}</td>
            <td class=""><a  class="border-4 border-green-400 bg-green-400 rounded-sm flex justify-center w-full hover:bg-slate-100" href="  {{ route('showorderdetails', ['order_id'=>$order->id]) }}" >Show Order Details</a></td>
            
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
</div>

@endsection