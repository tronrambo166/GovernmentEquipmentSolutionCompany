@extends('layout') 
@section('page')



<div class="row " style="background: #e5efef57;">  
         <div class="col-md-7 m-auto"> 

   <div class="login-right">
              <div class="login-right-wrap">
                <h1>Create a contract</h1>
               
                
                <!-- Form -->
                <form action="{{route('contract')}}">
                  <div class="form-group">
                    <input required="" class="form-control" name="user_name" type="text" placeholder="Your Name">
                  </div>
                  <div class="form-group">
                    <input required="" class="form-control" name="email"  type="text" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input required="" class="form-control" name="eqp_details"  type="text" placeholder="Enter equipment ids separeated by comma, ex- EQO#12,EQ0#13">
                  </div>
                  
                  <div class="form-group mb-0">
                    <button class="btn btn-primary btn-block" type="submit">Create</button>
                  </div>
                </form>
                <!-- /Form -->
                
               
              </div>
                        </div>   
          
</div>



          @endsection
        
       

