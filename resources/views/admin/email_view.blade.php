<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
    <style type="text/css">
    label{
      display: inline-block;
      width: 200px;
    }
    </style>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
     @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">



          <div class="container" align="center " style="padding-top: 100px";>
           
            @if(session()->has('message'))
            <div class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert"> x
               </button> 
               {{session()->get('message')}}
            </div>  
            @endif 
            
            <form action="{{url('sendemail',$data->id)}} " method="POST">
                @csrf
                <div style="padding:15PX;">
                  <label >Greeting</label>
                  <input type="text"  style="color: black" name="greeting">
                </div>
                <div style="padding:15PX;">
                  <label >Body</label>
                  <input type="text"  style="color: black" name="body">
                </div>
               
                <div style="padding:15PX;">
                  <label >Action text</label>
                  <input type="text" style="color: black" name="actiontext" >
                </div>
                <div style="padding:15PX;">
                  <label >Action Url</label>
                  <input type="text" style="color: black" name="actionurl" >
                </div>
                <div style="padding:15PX;">
                  <label >End Part</label>
                  <input type="text" style="color: black" name="endpart" >
                </div>
                
                <div style="padding:15PX;">
                  <label style="padding-right: 150px">Submit </label>
                  <input type="submit"  class="btn btn-success">
                </div>
              </form>
            </div>
        </div>
    <!-- plugins:js -->
      @include('admin.script')
  </body>
</html>