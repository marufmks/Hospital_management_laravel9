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

           <div class="container" align="senter" style="padding: 100px">
            @if(session()->has('message'))
            <div class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert">x
               </button> 
               {{session()->get('message')}}
            </div>  
            @endif 
            <form action="{{url('editdoctor',$data->id)}} " method="POST" enctype="multipart/form-data">
                @csrf
                <div style="padding:15PX;">
                  <label >Doctor Name</label>
                  <input type="text" value="{{$data->name}}"  style="color: black" name="name" >
                </div>
                <div style="padding:15PX;">
                  <label >Phone</label>
                  <input type="number" value="{{$data->phone}}" style="color: black" name="number" >
                </div>
                <div style="padding:15PX;">
                  <label >Speciality</label>
                  <select name="speciality" style="color: black; width:200px; width:220px;">
                    <option >{{$data->speciality}}</option>
                    <option value="skin">skin</option>
                    <option value="heart">heart</option>
                    <option value="eye">eye</option>
                    <option value="nose">nose</option>
                  </select>
 
                </div>
                <div style="padding:15PX;">
                  <label >Room No</label>
                  <input type="text" value="{{$data->room}}" style="color: black" name="room" >
                </div>
                <div style="padding:15PX;">
                  <label >Old Image</label>
                  <img height="100" width="100" src="doctorimage/{{$data->image}}" >
                </div>
                
                <div style="padding:15PX;">
                  <label >Change Image </label>
                  <input type="file" name="file" >
                </div>

                <div style="padding:15PX;">
                  <input type="submit" class="btn btn-success">
                </div>
              </form>
            </div> 
        </div>
    <!-- plugins:js -->
      @include('admin.script')
  </body>
</html>