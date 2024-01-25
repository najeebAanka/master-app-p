<?php
$item = \App\Models\Property::find(Route::input('id'));
$page_title = $item->title_en;
$lang = "en";
if (isset($_GET['lang']))
    $lang = $_GET['lang'];
?>
<!DOCTYPE html>
<html lang="en">
    @include('dashboard.shared/header-css')
    <link rel="stylesheet" type="text/css" href="{{url('public/dashboard/assets')}}/css/owlcarousel.css">
    <style>
        .gray-placeholder{
            background-color: #ccc;
            border-radius: 20px;
            margin-top: 10px;
            margin-bottom: 10px;

        }
        .padding-10{
            padding: 10px;
        }
        .main-header-title{
            position: absolute;
            top: 38%;
            left: 2%;
            background-color: transparent;
            border: none;
            color: #fff;
            font-size: 3rem;
            text-shadow: 0 0 0.5rem #000;
        }


        .paragraph-title{
            background-color: transparent;
            border: none;
            color: #000;
            font-size: 1rem;
            font-weight: bold;
            width: 100%;
            margin: 8px;
        }
        .paragraph-content{
            background-color: #f4f4f4;
            border-radius: 10px;
            border: none;
            color: #000;
            padding: 10px;
            font-size: 1rem;
            width: 100%;
            margin: 8px;

        }

        #cover-img{
            width : 100%
        }
        .main-header-title::placeholder {
            color: #fff;

        }
        .h100{
            height: 120px;
            width : 100%;
            background-color: #ccc;
            border-radius: 10px;


        }


        .center-cropped {

            background-position: center center;
            background-repeat: no-repeat;
            overflow: hidden;
        }

        /* Set the image to fill its parent and make transparent */
        .center-cropped img {
            min-height: 100%;
            min-width: 100%;
            /* IE 8 */
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
            /* IE 5-7 */
            filter: alpha(opacity=0);
            /* modern browsers */
            opacity: 0;
        }

    </style>
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



                        </div>
                    </div>
                    <!-- Container-fluid starts-->
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="?lang=en" class="float-end btn btn-<?= ($lang == 'en') ? "success" : "default" ?> m-5">English</a> 
                                        <a href="?lang=ru" class="float-end btn btn-<?= ($lang == 'ru') ? "success" : "default" ?>  m-5">Pусский</a> 
                                        <a href="?lang=ar" class="float-end btn btn-<?= ($lang == 'ar') ? "success" : "default" ?>  m-5">العربية</a>
                                        <h3>{{$item["title_".$lang]}} | page design</h3>
                                    </div>
                                    <div class="card-body">
                                        <form class="form theme-form" method="post" action="{{url('admin/properties/update')}}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{$item->id}}" />

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Title</label>
                                                        <input class="form-control" value="{{$item["title_".$lang]}}" name="name_{{$lang}}" type="text" placeholder="Name...">
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="row">
                                                <div class="col-md-12">

                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Description</label>

                                                        <textarea id="editor1" class="form-control" name="description_{{$lang}}" 
                                                                  type="text" placeholder="Content..." 
                                                                  cols="30" rows="10">{{$item["description_".$lang]}}</textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="m-20">


                                                        <button class="btn btn-secondary" type="submit">Save changes</button>       
                                                        <hr />
                                                    </div></div>
                                            </div>



                                        </form>






                                        <form class="form theme-form" method="post" action="{{url('admin/properties/update')}}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{$item->id}}" />          






                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlSelect9">Category</label>
                                                        <select  class="form-select digits"  name="category_id">
                                                            <?php foreach (App\Models\Category::orderBy('name_en')->get() as $area) { ?>
                                                                <option value="{{$area->id}}"  {{$item->category_id == $area->id ? "selected" : "" }}> {{$area->name_en}}</option>
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
                                                                <option value="{{$area->id}}"  {{$item->project_id == $area->id ? "selected" : "" }}> {{$area->name_en}}</option>
                                                            <?php } ?>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Luxury level</label>
                                                        <select  class="form-select digits"  name="level">                                                                       

                                                            <option value="1"  {{$item->p_level == 1? "selected" : "" }}>Affordable</option>
                                                            <option value="2"  {{$item->p_level == 2? "selected" : "" }}>Luxury</option>
                                                            <option value="3"  {{$item->p_level == 3? "selected" : "" }}>Ultra luxury</option>

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
                                                                <option   {{$item->no_bedrooms == $i? "selected" : "" }} value="{{$i}}"> {{$i}} bedrooms</option>
                                                            <?php } ?>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Bathrooms</label>
                                                        <select  class="form-select digits"  name="no_bathrooms">                                                                       
                                                            <?php for ($i = 1; $i < 10; $i++) { ?>
                                                                <option value="{{$i}}" {{$item->no_bathrooms == $i? "selected" : "" }}> {{$i}} bathrooms</option>
                                                            <?php } ?>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Type</label>
                                                        <select  class="form-select digits"  name="rent_or_sell">                                                                       

                                                            <option value="sell"  {{$item->rent_or_sell == "sell"? "selected" : "" }}>For sell</option>
                                                            <option value="rent"   {{$item->rent_or_sell == "rent"? "selected" : "" }}>For rent</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Is new launch</label>
                                                        <select  class="form-select digits"  name="launch">                                                                       

                                                            <option value="New launch"   {{$item->launch == "New launch"? "selected" : "" }}>Yes</option>
                                                            <option value="" {{$item->launch == ""? "selected" : "" }}>No</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Status</label>
                                                        <select  class="form-select digits"  name="status">                                                                       

                                                            <option value="offplan" {{$item->status == "offplan"? "selected" : "" }}>Offplan</option>
                                                            <option value="ready" {{$item->status == "ready"? "selected" : "" }}>Ready</option>

                                                        </select>
                                                    </div>
                                                </div>

                                            </div>




                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Area (M)</label>
                                                        <input class="form-control" id="area_m" value="{{$item->area_m}}" name="area_m" type="number" placeholder="Area...">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Area (SQFT)</label>
                                                        <input class="form-control" id="area_ft" value="{{$item->area_ft}}" name="area_ft" type="number" placeholder="Area...">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Price (AED)</label>
                                                        <input class="form-control" value="{{$item->price_aed}}"  id="price_aed"  name="price_aed" type="number" placeholder="Price...">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Price (USD)</label>
                                                        <input class="form-control" value="{{$item->price_usd}}"  id="price_usd" name="price_usd" type="number" placeholder="Price...">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlInput1">Price (EURO)</label>
                                                        <input class="form-control" value="{{$item->price_euro}}"  id="price_euro" name="price_euro" type="number" 
                                                               placeholder="Price...">
                                                    </div>
                                                </div>

                                            </div>









                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="m-20">


                                                        <button class="btn btn-secondary" type="submit">Save changes</button>       
                                                        <hr />
                                                    </div></div>
                                            </div>



                                        </form>

                                        <div class="gray-placeholder" style="min-height: 300px;position: relative;

                                             " >
                                            <img id="slider-imgs" />

                                            <form enctype="multipart/form-data" method="post"  action="{{url('admin/properties/update')}}">
                                                <input type="file" name="main-header-cover"  accept="image/*" id="main-header-cover" style="display: none;" onchange="readURL(this, 'cover-img')" />
                                                <input type="hidden" name="lang"  value="{{$lang}}" />
                                                <input type="hidden" name="id"  value="{{$item->id}}" />
                                                {{ csrf_field() }}
                                                <input type="file"  accept="image/*" multiple name="main-slider-cover[]" id="main-slider-cover" style="display: none;" onchange="previewImages(this)" />
                                                <button type="submit" class="btn btn-secondary" style=" position: absolute;top : 20px; right: 2%;z-index: 2" >Upload new Images</button> 
                                                <p style="cursor: pointer;
                                                   position: absolute;top : 20px; left: 2%;
                                                   background-color: #000;opacity: 0.8;
                                                   padding: 8px;
                                                   z-index: 2;
                                                   border-radius: 10px;
                                                   color: #fff" onclick="$('#main-slider-cover').click()">Click here to upload main slider images</p>
                                            </form>


                                            <div class="owl-carousel owl-theme" id="Homeslider" style="left: 0;right: 0;border-radius: 10px;margin: 10px;">
                                                <?php foreach (App\Models\Medium::where('target_type', 2)->where('target_id', $item->id)->get() as $m) { ?>

                                                    <div class="item"><img src="{{$m->sm()}}" alt=""></div>                                            
                                                <?php } ?>

                                            </div>





                                        </div> 
                                        <div class="row " style="margin-top: 10px;padding: 10px;" >
                                            <div class="col-md-8">
                                                <div id="map" style=" width: 100%;
                                                     height: 480px;"></div>
                                            </div>
                                            <div class="col-md-4" style="padding-top: 50px;">



                                                <form  method="post"  action="{{url('admin/properties/update')}}">

                                                    <input type="hidden" name="lang"  value="{{$lang}}" />
                                                    <input type="hidden" name="id"  value="{{$item->id}}" />
                                                    <input type="hidden" name="lat" id="lat-in"  value="{{$item->lat}}" />
                                                    <input type="hidden" name="lng" id="lng-in" value="{{$item->lng}}" />
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-secondary" id="confirmPosition">Confirm Position</button>
                                                </form>
                                                <hr />
                                                <p>On idle position: <span id="onIdlePositionView"></span></p>
                                                <hr />
                                                <p>On click position: <span id="onClickPositionView"></span></p>


                                            </div>
                                        </div>

                                        <div class="row " style="margin-top: 10px;" >
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <input  name="a1" type="checkbox" checked="true" /> High-Speed Elevators <br />
                                                    <input  name="a2" type="checkbox" checked="true" /> Event Space <br />
                                                    <input  name="a3" type="checkbox" checked="true" /> Balcony <br />
                                                    <input  name="a4" type="checkbox" checked="true" /> Dishwasher <br />
                                                    <input  name="a5" type="checkbox" checked="true" /> Concierge & Guest Services 
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <input  name="a6" type="checkbox" checked="true" /> Bedding <br />
                                                    <input  name="a7" type="checkbox" checked="true" /> Parking <br />
                                                    <input  name="a8" type="checkbox" checked="true" /> Security and  AC Services <br />
                                                    <input  name="a9" type="checkbox" checked="true" /> Gym & Fitness Facilities. <br />
                                                    <input  name="a10" type="checkbox" checked="true" /> Internet 
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <input  name="a11" type="checkbox" checked="true" /> Lifestyle Amenities <br />
                                                    <input  name="a12" type="checkbox" checked="true" /> Pet-Friendly. <br />
                                                    <input  name="a13" type="checkbox" checked="true" /> Cable TV. <br />
                                                    <input  name="a14" type="checkbox" checked="true" /> Pool  
                                                </div>
                                            </div>
                                            <div class="col-md-3">

                                                <form enctype="multipart/form-data" method="post"  action="{{url('admin/properties/update')}}">
                                                    <input type="file" name="main-header-cover" accept="image/*" id="main-header-cover" style="display: none;" onchange="readURL(this, 'cover-img')" />
                                                    <input type="hidden" name="lang"  value="{{$lang}}" />
                                                    <input type="hidden" name="id"  value="{{$item->id}}" />
                                                    {{ csrf_field() }}

                                                    <div class="gray-placeholder" style="padding: 10px;">
                                                        <video width="100%" height="240" controls id="video-preview" style="border-radius: 10px;">
                                                            @if($item->video_url)
                                                            <source src="{{$item->video()}}" type="video/mp4">
                                                            @endif
                                                            Your browser does not support the video tag.

                                                        </video>
                                                        <input name="videoFile" required class="form-control" type="file" accept="video/*" onchange="loadVideo(this)" />
                                                    </div>
                                                    <div style="padding: 10px;text-align: right">
                                                        <hr />
                                                        <button type="submit" class="btn btn-secondary"  >Save new video</button> 
                                                    </div>
                                                </form>

                                            </div>
                                        </div>     

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Container-fluid Ends-->
                </div>
                <!-- footer start-->
                @include('dashboard.shared/footer')    
                <!-- Plugins JS start-->
                <script src="{{url('public/dashboard')}}/assets/js/editor/ckeditor/ckeditor.js"></script>
                <script src="{{url('public/dashboard')}}/assets/js/editor/ckeditor/adapters/jquery.js"></script>
                <script src="{{url('public/dashboard')}}/assets/js/editor/ckeditor/styles.js"></script>
                <script src="{{url('public/dashboard/assets')}}/js/owlcarousel/owl.carousel.js"></script>
                <script src="{{url('public/dashboard/assets')}}/js/owlcarousel/owl-custom.js"></script>
                <script type="text/javascript"
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB92RmiHZBLdQEd_UiEoH0qx4dIKuWjT6I"></script>
                <script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>
                <script>
                                                                function loadVideo(caller) {
                                                                var $source = $('#video-preview');
                                                                $source[0].src = URL.createObjectURL(caller.files[0]);
                                                                $source.parent()[0].load();
                                                                }





                                                                function previewImages(c) {

                                                                $('#Homeslider').html("");
                                                                if (c.files) {
                                                                size = c.files.length;
                                                                parsed = 0;
                                                                [].forEach.call(c.files, readAndPreview);
                                                                }


                                                                }
                                                                var parsed = 0, size = 100;
                                                                function check() {
                                                                console.log(parsed + "vs" + size);
                                                                if (parsed >= size) {
                                                                var $owl = $('#Homeslider').owlCarousel({
                                                                loop: true,
                                                                        margin: 10,
                                                                        items: 5,
                                                                        nav: false,
                                                                        responsive: {
                                                                        320: {
                                                                        items: 1
                                                                        },
                                                                                576: {
                                                                                items: 2
                                                                                },
                                                                                768: {
                                                                                items: 2
                                                                                },
                                                                                992: {
                                                                                items: 3
                                                                                }
                                                                        }
                                                                });
                                                                $owl.trigger('refresh.owl.carousel');
                                                                }
                                                                }
                                                                function readAndPreview(file) {

                                                                // Make sure `file.name` matches our extensions criteria
                                                                if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                                                                return alert(file.name + " is not an image");
                                                                } // else...

                                                                var reader = new FileReader();
                                                                reader.addEventListener("load", function () {
                                                                $('#Homeslider').html($('#Homeslider').html() + '<div class="item"><img src="' + this.result + '" alt=""></div>');
                                                                console.log("pivc added");
                                                                parsed++;
                                                                check();
                                                                });
                                                                reader.readAsDataURL(file);
                                                                }
                                                                // maps 


                                                                // Get element references
                                                                var confirmBtn = document.getElementById('confirmPosition');
                                                                var onClickPositionView = document.getElementById('onClickPositionView');
                                                                var onIdlePositionView = document.getElementById('onIdlePositionView');
                                                                var map = document.getElementById('map');
                                                                // Initialize LocationPicker plugin
                                                                var lp = new locationPicker(map, {
                                                                setCurrentPosition: true, // You can omit this, defaults to true
<?php if ($item->lat != "") { ?>
                                                                    lat: {{$item -> lat}},
                                                                            lng: {{$item -> lng}}
<?php } else { ?>
                                                                    lat: 25.1950,
                                                                            lng: 55.2784
<?php } ?>
                                                                }, {
                                                                zoom: 15 // You can set any google map options here, zoom defaults to 15
                                                                });
                                                                // Listen to button onclick event
                                                                confirmBtn.onclick = function () {
                                                                // Get current location and show it in HTML
                                                                var location = lp.getMarkerPosition();
                                                                onClickPositionView.innerHTML = '<br />The chosen location is ' + location.lat + ',' + location.lng;
                                                                };
                                                                // Listen to map idle event, listening to idle event more accurate than listening to ondrag event
                                                                google.maps.event.addListener(lp.map, 'idle', function (event) {
                                                                // Get current location and show it in HTML
                                                                var location = lp.getMarkerPosition();
                                                                onIdlePositionView.innerHTML = '<br />The chosen location is ' + location.lat + ',' + location.lng;
                                                                document.getElementById('lat-in').value = location.lat;
                                                                document.getElementById('lng-in').value = location.lng;
                                                                });
<?php if (App\Models\Medium::where('target_type', 2)->where('target_id', $item->id)->count() > 0) { ?>
                                                                    var $owl = $('#Homeslider').owlCarousel({
                                                                    loop: true,
                                                                            margin: 10,
                                                                            items: 5,
                                                                            nav: false,
                                                                            responsive: {
                                                                            320: {
                                                                            items: 1
                                                                            },
                                                                                    576: {
                                                                                    items: 2
                                                                                    },
                                                                                    768: {
                                                                                    items: 2
                                                                                    },
                                                                                    992: {
                                                                                    items: 3
                                                                                    }
                                                                            }
                                                                    });
                                                                    $owl.trigger('refresh.owl.carousel');
<?php } ?>

                </script>
                <script>



                    // Default ckeditor
                    CKEDITOR.replace('editor1', {
                    on: {
                    contentDom: function(evt) {
                    // Allow custom context menu only with table elemnts.
                    evt.editor.editable().on('contextmenu', function(contextEvent) {
                    var path = evt.editor.elementPath();
                    if (!path.contains('table')) {
                    contextEvent.cancel();
                    }
                    }, null, null, 5);
                    }
                    }
                    });
                </script>


                <script>

                    $('#price_aed').on('input', function (e) {

                    var val = parseInt($('#price_aed').val());
                    $('#price_usd').val(parseInt(val * 3.67));
                    $('#price_euro').val(parseInt(val * 4.12));
                    });
                    $('#area_m').on('input', function (e) {

                    var val = parseInt($('#area_m').val());
                    $('#area_ft').val(parseInt(val * 10.7639));
                    });


                </script>

                <!-- Plugins JS Ends-->
                </body>
                </html>