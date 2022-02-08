<!doctype html>
<html>
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>@yield('title', 'Unknown Page')</title>
</head>
<body class="">
<!-- Nav bar -->
<div class="container mx-auto p-5 bg-gray-100 font-mono">
  <div class="flex justify-between flex-wrap mx-4">
      <div class="flex justify-start">
          <a href="{{route('index')}}" class="font-extrabold text-2xl">SmartShopping</a>
      </div>
      <div class="flex gap-3">
          <a class="border-2 hover:bg-slate-200 h-full shadow-lg p-2" href=" {{route('index')}}">Products</a>
          <a  class="border-2 hover:bg-slate-200 h-full shadow-lg p-2" href=" {{ route('showcart') }}">Cart</a>
          <a class="border-2 hover:bg-slate-200 h-full shadow-lg p-2" href="{{route('showorders')}}">Orders</a>
      </div>
  </div>
</div>
<!-- End Nav bar -->
@yield('content')
</body>
</html>