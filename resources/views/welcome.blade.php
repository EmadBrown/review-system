<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials._head')
    
    @yield('stylesheet')
    
</head>
<body>

    @include('partials._nav')  
    
  <section class="container">
      
        @yield('content')     
       
  </section>
   
  <footer class="footer">
      
       @include('partials._footer') 
       
  </footer>
        
        @yield('script')
        
</body>
</html>