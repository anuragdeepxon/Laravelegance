<!DOCTYPE html>
<html>

<head>
 <x-app.master />
</head>

<body class="overflow-y-hidden max-h-[91vh]">

 <x-app.header />

 <div class="mx-auto bg-[#f5f7fb] transition-all ease-in-out delay-500  ">
  <div class="flex flex-col ">
   <div class="flex">

    <x-app.sidebar />

    <div class="flex-grow p-5 overflow-y-scroll max-h-[91vh] h-[91vh]">
     @yield('content')
    </div>

   </div>
  </div>
 </div>

 <x-app.footer />

</body>

</html>
