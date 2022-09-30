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
                        <a href="https://www.bootstrapdash.com/product/corona-free/"><i
                                class="mdi mdi-home me-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="mdi mdi-close text-white me-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial:partials/_sidebar.html -->
        @include('admin.navbar')
        <div style="position:relative" class="p-5 m-5">
            <form action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div>
                    <label>Title : </label>
                    <input style="color:white" type="text" name="title"class="form-control form-control-lg"
                     placeholder="Enter name">
                </div>
                <div>
                    <label>Price : </label>
                    <input style="color:white" type="text" name="price"class="form-control form-control-lg"
                        placeholder="Enter Price">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input name="image" class="form-control" type="file" id="formFile">
                  </div>
                <div>
                    <label>Description : </label>
                    <input style="color:white" type="text" name="description"class="form-control form-control-lg"
                     placeholder="Enter name">
                </div>
                <br>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Add Food</button>
                </div>
            </form>
        </div>
        <br>
        <div>
            <div  style="margin-top: 80px; right:50px">
                <table  class="table table-dark" >
                    <tbody>
                     
                      <tr>
                        <th class="table-active">ID</th>
                        <th >Title</th>
                        <th class="table-active">Price</th>
                        <th>Image</th>
                        <th>Descriptions</th>
                        <th>Action</th>
                        <th>Action 2</th>
                      </tr>
                      @foreach ($food as $item)
                      <tr>
                        <td  class="table-active">{{$item->id}}</td>
                        <td>{{$item->title}}</td>
                        <td  class="table-active">{{$item->price}}</td>
                        <td><img height="100" width="100"src="/foodimage/{{$item->image}}" alt="food"></td>
                        <td  class="table-active">{{$item->description}}</td>
                        <td><a href="{{url('/deletefood',$item->id)}}">Delete</a></td>
                        <td><a href="{{url('/updatefood',$item->id)}}">update</a></td>
                        
                       
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
        <!-- partial -->
    </div>

    <!-- main-panel ends -->
    </div>

    <!-- page-body-wrapper ends -->
    </div>

    @include('admin.adminscripts')
</body>

</html>
