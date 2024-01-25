<?php
$page_title = "Properties";
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
                                                <form class="form theme-form" method="post" action="{{url('admin/properties/insert')}}">
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
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlSelect9">Category</label>
                                                                        <select  class="form-select digits"  name="category_id">
                                                                            <?php foreach (App\Models\Category::orderBy('name_en')->get() as $area) { ?>
                                                                                <option value="{{$area->id}}"> {{$area->name_en}}</option>
                                                                            <?php } ?>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlSelect9">Project</label>
                                                                        <select  class="form-select digits"  name="project_id">
                                                                            <option value="-1">Unknown</option>
                                                                            <?php foreach (App\Models\Project::orderBy('name_en')->get() as $area) { ?>
                                                                                <option value="{{$area->id}}"> {{$area->name_en}}</option>
                                                                            <?php } ?>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Luxury level</label>
                                                                        <select  class="form-select digits"  name="level">                                                                       

                                                                            <option value="1">Affordable</option>
                                                                            <option value="2">Luxury</option>
                                                                            <option value="3">Ultra luxury</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Bedrooms</label>
                                                                        <select  class="form-select digits"  name="no_bedrooms">
                                                                            <?php for ($i = 1; $i < 10; $i++) { ?>
                                                                                <option value="{{$i}}"> {{$i}} bedrooms</option>
                                                                            <?php } ?>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Bathrooms</label>
                                                                        <select  class="form-select digits"  name="no_bathrooms">                                                                       
                                                                            <?php for ($i = 1; $i < 10; $i++) { ?>
                                                                                <option value="{{$i}}"> {{$i}} bathrooms</option>
                                                                            <?php } ?>
                                                                        </select>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Type</label>
                                                                        <select  class="form-select digits"  name="rent_or_sell">                                                                       

                                                                            <option value="sell">For sell</option>
                                                                            <option value="rent">For rent</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Is new launch</label>
                                                                        <select  class="form-select digits"  name="launch">                                                                       

                                                                            <option value="New launch">Yes</option>
                                                                            <option value="">No</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Status</label>
                                                                        <select  class="form-select digits"  name="status">                                                                       

                                                                            <option value="offplan">Offplan</option>
                                                                            <option value="ready">Ready</option>

                                                                        </select>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Area (M)</label>
                                                                        <input class="form-control" id="area_m" name="area_m" type="number" placeholder="Area...">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Area (SQFT)</label>
                                                                        <input class="form-control" id="area_ft" name="area_ft" type="number" placeholder="Area...">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Price (AED)</label>
                                                                        <input class="form-control"  id="price_aed"  name="price_aed" type="number" placeholder="Price...">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Price (USD)</label>
                                                                        <input class="form-control"  id="price_usd" name="price_usd" type="number" placeholder="Price...">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Price (EURO)</label>
                                                                        <input class="form-control"  id="price_euro" name="price_euro" type="number" placeholder="Price...">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        



                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <input  name="a1" type="checkbox" checked="true" /> High-Speed Elevators <br />
                                                                        <input  name="a2" type="checkbox" checked="true" /> Event Space <br />
                                                                        <input  name="a3" type="checkbox" checked="true" /> Balcony <br />
                                                                        <input  name="a4" type="checkbox" checked="true" /> Dishwasher <br />
                                                                        <input  name="a5" type="checkbox" checked="true" /> Concierge & Guest Services 
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <input  name="a6" type="checkbox" checked="true" /> Bedding <br />
                                                                        <input  name="a7" type="checkbox" checked="true" /> Parking <br />
                                                                        <input  name="a8" type="checkbox" checked="true" /> Security and  AC Services <br />
                                                                        <input  name="a9" type="checkbox" checked="true" /> Gym & Fitness Facilities. <br />
                                                                        <input  name="a10" type="checkbox" checked="true" /> Internet 
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <input  name="a11" type="checkbox" checked="true" /> Lifestyle Amenities <br />
                                                                        <input  name="a12" type="checkbox" checked="true" /> Pet-Friendly. <br />
                                                                        <input  name="a13" type="checkbox" checked="true" /> Cable TV. <br />
                                                                        <input  name="a14" type="checkbox" checked="true" /> Pool  
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
                                                    <th scope="col">Project</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $items = \App\Models\Property::where('id', '>', 0);

                                                $start = 0;
                                                if (isset($_GET['start']))
                                                    $start = $_GET['start'];


                                                $total = $items->count();
                                                $items = $items->take(20)->offset($start)->get();
                                                foreach ($items as $item) {
                                                    ?>   
                                                    <tr>
                                                        <th scope="row">{{$item->id}}</th>
                                                        <td>{{$item->title_en}}</td>

                                                        <td><?= $item->project_id != -1 ? App\Models\Project::find($item->project_id)->name_en : "Unknown" ?></td>

                                                        <td>
                                                            <form class="form theme-form" method="post" 
                                                                  action="{{url('admin/properties/delete')}}">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="id" value="{{$item->id}}" />
                                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                                                                <a class="btn btn-success" href="{{url('admin/single-property/'.$item->id)}}"

                                                                   >Design</a>

                                                            </form>

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
                
                
                    <script>

                                                                $('#price_aed').on('input', function (e) {
                                                                    
                                                                    var val = parseInt(  $('#price_aed').val());
                                                                    $('#price_usd').val(parseInt(  val*3.67));
                                                                    $('#price_euro').val(parseInt(  val*4.12));
                                                                });
                                                                    $('#area_m').on('input', function (e) {
                                                                    
                                                                    var val = parseInt(  $('#area_m').val());
                                                                    $('#area_ft').val(parseInt(  val*10.7639));
                                                                   
                                                                });
                                                                 

                                                            </script>
                </body>
                </html>