<!DOCTYPE html>
<html lang="en"  class="no-js">
<head>
  @include('frontend.master.includes.head')
</head>
<body>
  @include('frontend.master.includes.header')
  @yield('banner')

  @yield('content')

  @include('frontend.master.includes.footer')
  @include('frontend.master.includes.script')

  @yield('footscript')

</body>
</html>
