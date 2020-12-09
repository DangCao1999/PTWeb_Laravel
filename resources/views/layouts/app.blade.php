<!DOCTYPE html>
<html lang="en">
<head>
  @include('includes.head')
</head>
  <body class="">
    <div class="wrapper ">
      <div class="sidebar" data-color="orange">
        @include('includes.sidebar')
      </div>
      <div class="main-panel" id="main-panel">
       
        @yield('content')
        @include('includes.footer')
      </div>
  @include('includes.script')
  
</body>
</html>