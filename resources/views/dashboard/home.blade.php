<?php
$page_title = "Developers";
?>
<!DOCTYPE html>
<html lang="en">
    @include('dashboard.shared/header-css')

    <body>
        <!-- Loader starts-->
        <div class="loader-wrapper">
            <div class="theme-loader">    
                <div class="loader-p"></div>
            </div>
        </div>
        <!-- Loader ends-->
        <!-- page-wrapper Start-->
        <div class="page-wrapper" id="pageWrapper">
            @include('dashboard.shared/top-bar')                 
            <!-- Page Body Start-->
            <div class="page-body-wrapper horizontal-menu">
                @include('dashboard.shared/side-bar')  
                <div class="page-body">
                    <div class="container-fluid">
                        <div class="page-header">

                            @include('dashboard.shared/message-header')      


                            <div class="row">
                                <div class="col-sm-6">
                                    <h3>{{$page_title}}</h3>
                                    <p>This is a list of {{$page_title}}</p>
                                </div>
                                <div class="col-sm-6">
                                    <!-- Bookmark Start-->
                                    <div class="bookmark">
                                        <ul>


                                            <li><a href="#" data-bs-toggle="modal" data-original-title="test" data-bs-target="#CreateNewModal"
                                                   ><i class="bookmark-search" data-feather="plus"></i></a>

                                        </ul>
                                    </div>
                                    <!-- Bookmark Ends-->




                                    <div class="modal fade" id="CreateNewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <form class="form theme-form" method="post" enctype="multipart/form-data" action="{{url('admin/developers/insert')}}">
                                                    {{ csrf_field() }}
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">New Developer</h5>
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">



                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Name (English)</label>
                                                                        <input class="form-control" name="name_en" type="text" placeholder="Name...">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Name (Russian)</label>
                                                                        <input class="form-control" name="name_ru" type="text" placeholder="Name...">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Name (Arabic)</label>
                                                                        <input class="form-control" name="name_ar" type="text" placeholder="Name...">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Developer icon</label>
                                                                        <input class="form-control" name="image" type="file" onchange="readURL(this, 'preview')">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3" style="background-color: #ccc;min-height: 300px;">
                                                                        <img id="preview" style="width : 100%;"/>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                
                                                        </div>




                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                                                        <button class="btn btn-secondary" type="submit">Create</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Container-fluid starts-->
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>All {{$page_title}}</h5>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Icon</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $items = \App\Models\Developer::where('id', '>', 0);

                                                $start = 0;
                                                if (isset($_GET['start']))
                                                    $start = $_GET['start'];

                                                $total = $items->count();
                                                $items = $items->take(20)->offset($start)->get();
                                                foreach ($items as $item) {
                                                    ?>   
                                                    <tr>
                                                        <th scope="row">{{$item->id}}</th>
                                                        <td>{{$item->name_en}}-{{$item->name_ru}}-{{$item->name_ar}}</td>
                                                        <td><img class="td-img" src="{{$item->image()}}" /></td>
                                                        <td>
                                                            <form class="form theme-form" method="post" 
                                                                  action="{{url('admin/developers/delete')}}">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="id" value="{{$item->id}}" />
                                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                                                                <button class="btn btn-warning" type="button"
                                                                        data-bs-toggle="modal" data-original-title="test" data-bs-target="#EditRowModal{{$item->id}}"
                                                                        >Update</button>
                                                            </form>
                                                            <div class="modal fade" id="EditRowModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <form class="form theme-form" method="post" enctype="multipart/form-data" action="{{url('admin/developers/update')}}">
                                                                            {{ csrf_field() }}
                                                                                   <input type="hidden" name="id" value="{{$item->id}}" />
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">New Area</h5>
                                                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">

                                                                                <div class="card-body">
                                                                                    <div class="row">
                                                                                        <div class="col-md-4">
                                                                                            <div class="mb-3">
                                                                                                <label class="form-label" for="exampleFormControlInput1">Name (English)</label>
                                                                                                <input value="{{$item->name_en}}" class="form-control" name="name_en" type="text" placeholder="Name...">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="mb-3">
                                                                                                <label class="form-label" for="exampleFormControlInput1">Name (Russian)</label>
                                                                                                <input  value="{{$item->name_ru}}"class="form-control" name="name_ru" type="text" placeholder="Name...">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="mb-3">
                                                                                                <label class="form-label" for="exampleFormControlInput1">Name (Arabic)</label>
                                                                                                <input value="{{$item->name_ar}}" class="form-control" name="name_ar" type="text" placeholder="Name...">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-6">
                                                                                            <div class="mb-3">
                                                                                                <label class="form-label" for="exampleFormControlInput1">Change icon</label>
                                                                                                <input class="form-control" name="image" type="file" onchange="readURL(this ,'preview{{$item->id}}')">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <div class="mb-3" style="background-color: #ccc;min-height: 300px;">
                                                                                                <img src="{{$item->image()}}" id="preview{{$item->id}}" style="width : 100%;"/>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>

                                                                                </div>




                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                                                                                <button class="btn btn-secondary" type="submit">Save changes</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                        @include('dashboard.shared/pagination-footer')    
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Container-fluid Ends-->
                </div>
                <!-- footer start-->
                @include('dashboard.shared/footer')    
                </body>
                </html>