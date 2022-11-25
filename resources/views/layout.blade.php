

<!DOCTYPE HTML>
<head>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <title>GSC</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	
    <link rel="stylesheet" type="text/css" href="style.css">
   
{{-- Vue component files --}}
<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/http-vue-loader"></script>
  {{-- Vue component files --}}
  
</head>
<body>
<div class="container-fluid">
    
    
       
  <div class="row " style="background-color: #02784e;">
<nav class=" navbar navbar-expand-lg navbar-light w-100">
  
  <div class=" collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav links">
      <li class="nav-item h4  text-light  mr-5">
        Welkom Koffi 
      </li>

      <li class="nav-item ">
        <a class="nav-link text-light" href="home">Home </a>
      </li>

      <li class="nav-item">
        <a class="nav-link  text-light" href="equipments">Equipments</a>
      </li>

      <li class="nav-item">
        <a class="nav-link  text-light" href="contract">Contract</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link  text-light" href="breakdown">Breakdown</a>
      </li>

      <li class="nav-item">
        <a class="nav-link  text-light" href="about">About</a>
      </li>

    </ul>

   

<ul class="links ml-auto"><li class="nav-item">
       
                                    <a class="nav-link text-light" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                
      </li></ul>

  </div>
</nav>
</div>

 @if(Session::has('success'))<p class="m-auto text-warning font-weight-bold text-center">  {{Session::get('success') }}
    @php Session::forget('success'); @endphp</p>@endif


    @yield('page')


<div class="container-fluid px-0 ">
       
        
        <footer>
            <div class="row fixed-bottom" style="background: #e5efef57;">
                <p class="m-auto small text-dark py-3">&copy; Copyright 2020. Radio Monitoring, All Rights Reserved</p>
            </div>
        </footer>
        
    </div>
    </div>
    
    
    


<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
       
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    

{{-- Vue files --}}
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.23.0/axios.min.js"></script>

<script type="text/javascript" src="js/vue-router.js"></script>
<script type="module" src="js/routerCode.js"></script>
{{-- Vue files --}}


<script>


</script>



</body>
</html>
