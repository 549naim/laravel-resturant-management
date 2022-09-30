<x-app-layout>
   
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.admincss')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">           
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      
        @include('admin.navbar')
        <div  style="margin-top: 80px; right:50px">
            <table  class="table table-dark" >
                <tbody>
                 
                  <tr>
                    <th class="table-active">ID</th>
                    <th >Name</th>
                    <th class="table-active">Email</th>
                    <th>Action</th>
                  </tr>
                  @foreach ($data as $item)
                  <tr>
                    <td  class="table-active">{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td  class="table-active">{{$item->email}}</td>
                    @if ($item->usertype == '0')
                    <td><a href="{{url('/deleteuser',$item->id)}}">Delete</a></td>
                    @else
                    <td>Not Allowed</td>
                    @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    @include('admin.adminscripts')
  </body>
</html>