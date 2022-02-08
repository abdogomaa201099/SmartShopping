@extends('layouts.BaseLayout')

@section('title', 'Cart')
    
@section('content')
    

<div class="container mx-auto font-mono">
    <div class="grid grid-flow-row grid-cols-1 gap-10 my-16 mx-64 pb-2 bg-slate-100  border-4 border-neutral-200 shadow-xl">
    <table class="table-fixed">
        <thead> 
          <tr class="border-2 hover:bg-slate-400 bg-slate-300 ">
            <th class="pr-10">Product</th>
            <th class="">Quantity</th>
            <th class="">Total Price</th>
            <th class="">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $total=0?>
          @foreach ($cart_products as $cprod)
          <tr class="border-2 hover:bg-zinc-200 ">
            <td class="pl-28">{{$cprod->product->name}}</td>
            <td class="pl-28">{{$cprod->qty}}</td>
            <td class="pl-28">{{$cprod->product->price *$cprod->qty }}</td>
            <?php  $total=$total+($cprod->product->price *$cprod->qty);?>
            <td class=""><a  class="border-4 border-red-500 bg-red-500 rounded-sm flex justify-center w-full hover:bg-slate-100" href="  {{ route('removefromcart', ['id'=>$cprod->id]) }}" >Remove from Cart</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="flex justify-center mb-4">
      <?php if ($total==0) {
        echo 'Nothing To Display!!';
      }else{?>
      </div>
      <div class="flex justify-center mb-4">
        <span class="mr-2 border-4 bg-slate-200"><?php echo 'Total: RM' , $total;?></span>
        <a  class="border-4 border-green-400  rounded-sm flex justify-center w-40 bg-green-400 hover:bg-slate-100" href="{{ route('placeorder',['tot_price'=>$total]) }}" >Place Order</a>
      </div>
    <?php }?>
    </div>
</div>

@endsection