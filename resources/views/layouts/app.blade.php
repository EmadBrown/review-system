<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.partials._head')
    
    @yield('stylesheet')
    
</head>
<body>

    @include('layouts.partials._nav')  
    
  <section class="container">
      
    @include('layouts.partials._messages')
    
    <div id='app'>
        
         @yield('content')     
        
    </div>
    
  </section>
   
  <footer class="footer">
      
       @include('layouts.partials._footer') 
       
  </footer>
        
     @include('layouts.partials._javascript') 
     
        @yield('script')
        
</body>
</html>
