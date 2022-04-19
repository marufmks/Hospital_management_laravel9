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
                    <tr style="background-color: black">
                        <th style="padding:10px">Customer Name</th>
                        <th style="padding:10px">Email</th>
                        <th style="padding:10px">Phone</th>
                        <th style="padding:10px">Doctor</th>
                        <th style="padding:10px">Date</th>
                        <th style="padding:10px">Message</th>
                        <th style="padding:10px">Status</th>
                        <th style="padding:10px">Approve</th>
                        <th style="padding:10px">Cancel</th>
                        <th style="padding:10px">Send Mail</th>
                    </tr>
                    @foreach ($data as $appoint)
                        
                    
                    <tr align="center" style="background-color: skyblue">
                        <td style="padding:10px">{{$appoint->name}}</td>
                        <td style="padding:10px">{{$appoint->email}}</td>
                        <td style="padding:10px">{{$appoint->phone}}</td>
                        <td style="padding:10px">{{$appoint->doctor}}</td>
                        <td style="padding:10px">{{$appoint->date}}</td>
                        <td style="padding:10px">{{$appoint->message}}</td>
                        <td  style="padding:10px;background-color:rgb(19, 194, 162);color:black;">{{$appoint->status}}</td>
                        <td><a class="btn btn-success"
                             href="{{url('approved',$appoint->id)}} ">Approve</a></td>
                        <td>
                          <a class="btn btn-danger" href="{{url('canceled',$appoint->id)}}">Cancel</a>
                        </td>
                        <td>
                          <a class="btn btn-primary" href="{{url('emailview',$appoint->id)}}">Send Email</a>
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