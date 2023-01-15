<!DOCTYPE html>
<html>

<head>
 <x-app.master />
</head>

<body>

 <div class="mx-auto transition-all ease-in-out delay-500 ">
  <div class="flex flex-col">
   <div class="flex">

    <div class="flex-grow p-5">
     @yield('content')
    </div>

   </div>
  </div>
 </div>

</body>

</html>