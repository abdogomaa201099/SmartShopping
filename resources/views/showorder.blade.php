@extends('layouts.BaseLayout')

@section('title', 'Order Details')
    
@section('content')
    
<div class="container mx-auto font-mono">
    <div class="grid grid-flow-row grid-cols-1 gap-10 my-16 mx-64  bg-slate-100  border-4 border-neutral-200 shadow-xl">
    <table class="table-fixed">
        <thead> 
          <tr class="border-2 hover:bg-slate-400 bg-slate-300 ">
            <th class="pl-10">Product</th>
            <th class="">Ordered On</th>
            <th class="pl-4">Price</th>
            <th class="">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($order->carts as $prod)
          <tr class="border-2 hover:bg-zinc-200 ">
            <td class="pl-28">{{$prod->product->name}}</td>
            <td class="pl-28">{{$prod->updated_at}}</td>
            <td class="pl-20">{{$prod->product->price }}</td>
            <td class=""><a  class="border-4 border-red-500 bg-red-500 rounded-sm flex justify-center w-full hover:bg-slate-100" href="  {{ route('cancelitem', ['prod_id'=>$prod->id]) }}" >Cancel This Item</a></td>
            
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
</div>

@endsection