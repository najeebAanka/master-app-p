<?php
$page_title = "Projects";
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
                                    <p>This is a list of {{$page_title}} published in Masterpiece</p>
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
                                                <form class="form theme-form" method="post" action="{{url('admin/projects/insert')}}">
                                                    {{ csrf_field() }}
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">New Project</h5>
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
                                                                        <label class="form-label" for="exampleFormControlSelect9">Area</label>
                                                                        <select  class="form-select digits"  name="area_id">
                                                                            <?php foreach (App\Models\Area::orderBy('name_en')->get() as $area) { ?>
                                                                                <option value="{{$area->id}}"> {{$area->name_en}}</option>
                                                                            <?php } ?>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            <div class="col-md-6">
                                                                         <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlSelect9">Developer</label>
                                                                        <select  class="form-select digits"  name="developer_id">
                                                                            <?php foreach (App\Models\Developer::orderBy('name_en')->get() as $area) { ?>
                                                                                <option value="{{$area->id}}"> {{$area->name_en}}</option>
                                                                            <?php } ?>

                                                                        </select>
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
                                                    <th scope="col">Developer</th>
                                                    <th scope="col">Area</th>
                                                
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $items = \App\Models\Project::where('id', '>', 0);

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

                                                        <td><?= App\Models\Developer::find($item->developer_id)->name_en ?></td>
                                                        <td><?= App\Models\Area::find($item->area_id)->name_en ?></td>
                                                        <td>
                                                            <form class="form theme-form" method="post" 
                                                                  action="{{url('admin/projects/delete')}}">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="id" value="{{$item->id}}" />
                                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                                                                <button class="btn btn-warning" type="button"
                                                                        data-bs-toggle="modal" data-original-title="test" data-bs-target="#EditRowModal{{$item->id}}"
                                                                        >Update</button>
                                                                <a class="btn btn-success" href="{{url('admin/projects/design/'.$item->id)}}"

                                                                   >Design</a>
                                                            </form>
                                                            <div class="modal fade" id="EditRowModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <form class="form theme-form" method="post" action="{{url('admin/projects/update')}}">
                                                                            {{ csrf_field() }}
                                                                            <input type="hidden" name="id" value="{{$item->id}}" />
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Edit project</h5>
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
                                                                                        <div class="col">
                                                                                            <div class="mb-3">
                                                                                                <label class="form-label" for="exampleFormControlSelect9">Area</label>
                                                                                                <select  class="form-select digits"  name="area_id">
                                                                                                    <?php foreach (\App\Models\Area::get() as $emirate) { ?>
                                                                                                        <option {{$item->area_id == $emirate->id ? "selected" : ""}}
                                                                                                            value="{{$emirate->id}}">{{$emirate->name_en}}</option>
                                                                                                    <?php } ?>

                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col">
                                                                                            <div class="mb-3">
                                                                                                <label class="form-label" for="exampleFormControlSelect9">Area</label>
                                                                                                <select  class="form-select digits"  name="developer_id">
                                                                                                    <?php foreach (\App\Models\Developer::get() as $emirate) { ?>
                                                                                                        <option {{$item->developer_id == $emirate->id ? "selected" : ""}}
                                                                                                            value="{{$emirate->id}}">{{$emirate->name_en}}</option>
                                                                                                    <?php } ?>

                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!--                                                            <div class="row">
                                                                                                                                                    <div class="col">
                                                                                                                                                        <div>
                                                                                                                                                            <label class="form-label" for="exampleFormControlTextarea4">Example textarea</label>
                                                                                                                                                            <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"></textarea>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                </div>-->
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