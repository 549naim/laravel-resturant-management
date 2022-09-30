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
      <!-- partial:partials/_sidebar.html -->
        @include('admin.navbar')
        <div style="position:relative" class="p-5 m-5">
            <form action="{{url('/uploadcheif')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div>
                    <label>Name : </label>
                    <input style="color:white" type="text" name="name"class="form-control form-control-lg"
                     placeholder="Enter name">
                </div>
                <div>
                    <label>Speciality : </label>
                    <input style="color:white" type="text" name="speciality"class="form-control form-control-lg"
                        placeholder="Enter Speciality">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input name="image" class="form-control" type="file" id="formFile">
                  </div>
                
                <br>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Add Food</button>
                </div>
            </form>
        </div>
        @include('admin.allcheif')
        </div>
       
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    @include('admin.adminscripts')
  </body>
</html>