<!DOCTYPE html>
<html lang="en">
  <head>
    <style type="text/css">
    label{
      display: inline-block;
      width: 200px;
    }
    
    </style>
    @include('admin.css')
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
             <button type="button" class="close" data-dismiss="alert">x
               </button> 
               {{session()->get('message')}}
            </div>  
            @endif 
            
            <form action="{{url('upload_doctor')}} " method="POST" enctype="multipart/form-data">
                @csrf
                <div style="padding:15PX;">
                  <label >Doctor Name</label>
                  <input type="text"  style="color: black" name="name" placeholder="enter the name">
                </div>
                <div style="padding:15PX;">
                  <label >Phone</label>
                  <input type="number"  style="color: black" name="number" placeholder="enter the number">
                </div>
                <div style="padding:15PX;">
                  <label >Speciality</label>
                  <select name="speciality"  style="color: black; width:200px; width:220px;">
                    <option >--select--</option>
                    <option value="skin">skin</option>
                    <option value="heart">heart</option>
                    <option value="eye">eye</option>
                    <option value="nose">nose</option>
                  </select>
                </div>
                <div style="padding:15PX;">
                  <label >Room No</label>
                  <input type="text" style="color: black" name="room" placeholder="enter the room no.">
                </div>
                <div style="padding:15PX;padding-left:120px;">
                  <label >Doctor Image</label>
                  <input type="file" name="file">
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