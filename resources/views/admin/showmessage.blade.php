<!DOCTYPE html>
<html lang="en">
  <head>
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
            <div align="center" style="padding-top:100px;">
                <table>
                    <tr style="background-color: rgb(111, 224, 40)">
                        <th style="padding:10px">Customer Name</th>
                        <th style="padding:10px">Email</th>
                        <th style="padding:10px">Subject</th>
                        <th style="padding:10px">Message</th>
                        <th style="padding:10px">delete Mail</th>
                    </tr>
                    @foreach ($data as $msg)
                        
                    
                    <tr align="center" style="background-color: skyblue">
                        <td style="padding:10px">{{$msg->name}}</td>
                        <td style="padding:10px">{{$msg->email}}</td>
                        <td style="padding:10px">{{$msg->subject}}</td>
                        <td style="padding:10px">{{$msg->message}}</td>
                        <td>
                          <a class="btn btn-primary" href="{{route('deletemail',$msg->id)}}">delete Email</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    <!-- plugins:js -->
      @include('admin.script')
  </body>
</html>