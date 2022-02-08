@extends('layouts.BaseLayout')

@section('title', 'Products')
    
@section('content')
    

<!-- Product Section-->

<div class="container mx-auto font-mono">
    
  <div class="grid grid-flow-row grid-cols-3 gap-10 mx-64 pt-10 pb-10">
    @foreach($products as $product)  
    <div class="shadow-lg shadow-slate-300 rounded-lg border-8 bg-slate-200">
      <div class="flex justify-center ">
        <img class=" rounded-b-none w-full h-80" src="images/{{$product->image_name}}" alt="image{{$product->id}}" >
      </div>
      <div class="flex flex-col hover:flex-col">
        <span class="mx-3">{{$product->name}}</span>
        <span class="mx-3">RM{{$product->price}}</span>
        <a  class="border-4 bg-slate-400 rounded-sm flex justify-center w-full hover:bg-slate-200" href="  {{ route('addtocart', ['id'=>$product->id]) }}" >Add to Cart</a>
      </div>
    </div>
    @endforeach
  </div>

  

</div>
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<!-- End Product Section-->

@endsection