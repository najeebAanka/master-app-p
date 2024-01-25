<?php
$page_title = "Projects";
$project = App\Models\Project::find(Route::input('id'));
$lang = "en";
if (isset($_GET['lang']))
    $lang = $_GET['lang'];
?>
<!DOCTYPE html>
<html lang="en">
    @include('dashboard.shared/header-css')
    <!-- Plugins css start-->
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
                                        <a href="?lang=en" class="float-end btn btn-<?=($lang=='en')?"success":"default"?> m-5">English</a> 
                                        <a href="?lang=ru" class="float-end btn btn-<?=($lang=='ru')?"success":"default"?>  m-5">Pусский</a> 
                                        <a href="?lang=ar" class="float-end btn btn-<?=($lang=='ar')?"success":"default"?>  m-5">العربية</a>
                                        <h5>{{$project->name_en}} | page design</h5>
                                    </div>
                                    <div >



                                        <div class="padding-10" >
                                            <form enctype="multipart/form-data" method="post"  action="{{url('admin/projects/update')}}">
                                                <input type="file" name="main-header-cover" accept="image/*" id="main-header-cover" style="display: none;" onchange="readURL(this, 'cover-img')" />
                                                <input type="hidden" name="lang"  value="{{$lang}}" />
                                                <input type="hidden" name="id"  value="{{$project->id}}" />
                                                {{ csrf_field() }}
                                                <div class="gray-placeholder" style="min-height: 300px;position: relative; " >
                                                    <button type="submit" class="btn btn-secondary" style=" position: absolute;top : 20px; right: 2%;" >Save changes</button> 
                                                    <img id="cover-img" <?= $project->cover_pic == "" ? "" : "src='" . $project->cover() . "'" ?>" />
                                                    <input type="text" name="name_{{$lang}}" required class="main-header-title" placeholder="Enter name here"
                                                           value="{{$project["name_".$lang]}}"
                                                           />
                                                    <p style="cursor: pointer;
                                                       position: absolute;top : 20px; left: 2%;
                                                       background-color: #000;opacity: 0.8;
                                                       padding: 8px;
                                                       border-radius: 10px;
                                                       color: #fff" onclick="$('#main-header-cover').click()">Click here to change cover photo</p>

                                                </div>  

                                            </form>

                                            <div class="row " style="margin-top: 10px;" >
                                                <div class="col-md-8">
                                                    <form  method="post"  action="{{url('admin/projects/update')}}">
                                                        <input type="file" name="main-header-cover" accept="image/*" id="main-header-cover" style="display: none;" onchange="readURL(this, 'cover-img')" />
                                                        <input type="hidden" name="lang"  value="{{$lang}}" />
                                                        <input type="hidden" name="id"  value="{{$project->id}}" />
                                                        {{ csrf_field() }}
                                                        <input  name="paragraph1-title_{{$lang}}" value="{{$project["paragraph1_title_" . $lang]}}" type="text" class="paragraph-title" placeholder="Enter title of first paragraph" />
                                                        <textarea name="paragraph1-content_{{$lang}}" class="paragraph-content" 
                                                                  placeholder="Enter contents of first paragraph" rows="10" >{{$project["paragraph1_content_" . $lang]}}</textarea>
                                                        <div style="padding: 10px;text-align: right">
                                                            <hr />
                                                            <button type="submit" class="btn btn-secondary"  >Save first paragraph</button> 
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-4">

                                                    <form enctype="multipart/form-data" method="post"  action="{{url('admin/projects/update')}}">
                                                        <input type="file" name="main-header-cover" accept="image/*" id="main-header-cover" style="display: none;" onchange="readURL(this, 'cover-img')" />
                                                        <input type="hidden" name="lang"  value="{{$lang}}" />
                                                        <input type="hidden" name="id"  value="{{$project->id}}" />
                                                        {{ csrf_field() }}

                                                        <div class="gray-placeholder" style="padding: 10px;">
                                                            <video width="100%" height="240" controls id="video-preview" style="border-radius: 10px;">
                                                                @if($project->video_url)
                                                                <source src="{{$project->video()}}" type="video/mp4">
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

                                            <div class="gray-placeholder" style="min-height: 300px;position: relative;

                                                 " >
                                                <img id="slider-imgs" />

                                                <form enctype="multipart/form-data" method="post"  action="{{url('admin/projects/update')}}">
                                                    <input type="file" name="main-header-cover"  accept="image/*" id="main-header-cover" style="display: none;" onchange="readURL(this, 'cover-img')" />
                                                    <input type="hidden" name="lang"  value="{{$lang}}" />
                                                    <input type="hidden" name="id"  value="{{$project->id}}" />
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
                                                    <?php foreach (App\Models\Medium::where('target_type', 1)->where('target_id', $project->id)->get() as $m) { ?>

                                                        <div class="item"><img src="{{$m->lg()}}" alt=""></div>                                            
                                                    <?php } ?>

                                                </div>





                                            </div> 

                                            <div class="row " style="margin-top: 10px;" >
                                                <div class="col-md-8">


                                                    <form  method="post"  action="{{url('admin/projects/update')}}">
                                                       <input type="hidden" name="lang"  value="{{$lang}}" />
                                                        <input type="hidden" name="id"  value="{{$project->id}}" />
                                                        {{ csrf_field() }}

                                                        <input  name="paragraph2-title_{{$lang}}" 
                                                                value="{{$project["paragraph2_title_" . $lang]}}"
                                                                type="text" class="paragraph-title" placeholder="Enter title of second paragraph" />
                                                        <textarea name="paragraph2-content_{{$lang}}" class="paragraph-content" placeholder="Enter contents of second paragraph" rows="10" >
                                                        
{{$project["paragraph2_content_" . $lang]}}

                                                        </textarea>
                                                        <div style="padding: 10px;text-align: right">
                                                            <hr />
                                                            <button type="submit" class="btn btn-secondary"  >Save second paragraph</button> 
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-4" style="padding-top: 50px;">

                                                    <div class="row">
                                                        <div class="col-md-6 ">
                                                            <img class=" h100"
                                                            <?= $project->pic1_url == "" ? "" : 'src="' . $project->pic(1) . '"' ?>
                                                                 id="cover-img-paragraph2pic1" style="margin-bottom: 10px;" onclick="$('#paragraph2pic1').click()"/>
                                                            <img class=" h100" 
                                                            <?= $project->pic2_url == "" ? "" : 'src="' . $project->pic(2) . '"' ?>
                                                                 id="cover-img-paragraph2pic2"  onclick="$('#paragraph2pic2').click()"/>

                                                        </div>
                                                        <div class="col-md-6" >
                                                            <img class="h100"
                                                            <?= $project->pic3_url == "" ? "" : 'src="' . $project->pic(3) . '"' ?>
                                                                 style="height: 250px"  id="cover-img-paragraph2pic3"  onclick="$('#paragraph2pic3').click()"/>
                                                        </div>

                                                    </div>
                                                    <form enctype="multipart/form-data" method="post"  action="{{url('admin/projects/update')}}">
                                                        {{ csrf_field() }}
                                                        <input type="file"  accept="image/*"  name="paragraph2pic1" id="paragraph2pic1" style="display: none;"
                                                               onchange="readURL(this, 'cover-img-paragraph2pic1')" />
                                                        <input type="file"  accept="image/*"  name="paragraph2pic2" id="paragraph2pic2" 
                                                               style="display: none;" onchange="readURL(this, 'cover-img-paragraph2pic2')" />
                                                        <input type="file"  accept="image/*"  name="paragraph2pic3"
                                                               id="paragraph2pic3" style="display: none;" onchange="readURL(this, 'cover-img-paragraph2pic3')" />

                                                        <input type="hidden" name="lang"  value="{{$lang}}" />
                                                        <input type="hidden" name="id"  value="{{$project->id}}" />




                                                        <div style="padding: 10px;text-align: right">
                                                            <hr />
                                                            <button type="submit" class="btn btn-secondary"  >Save photos</button> 
                                                        </div>    


                                                    </form>

                                                </div>
                                            </div>

                                            <div class="row " style="margin-top: 10px;padding: 10px;" >
                                                <div class="col-md-8">
                                                    <div id="map" style=" width: 100%;
                                                         height: 480px;"></div>
                                                </div>
                                                <div class="col-md-4" style="padding-top: 50px;">



                                                    <form  method="post"  action="{{url('admin/projects/update')}}">
                                                     
                                                        <input type="hidden" name="lang"  value="{{$lang}}" />
                                                        <input type="hidden" name="id"  value="{{$project->id}}" />
                                                        <input type="hidden" name="lat" id="lat-in"  value="" />
                                                        <input type="hidden" name="lng" id="lng-in" value="" />
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
                                                <div class="col-md-4" style="padding-top: 50px;">
                                                    <div class="row">
                                                        <div class="col-md-6 ">
                                                            <img class=" h100" id="cover-img-paragraph3pic1" 
                                                            <?= $project->pic4_url == "" ? "" : 'src="' . $project->pic(4) . '"' ?>
                                                                 style="margin-bottom: 10px;" onclick="$('#paragraph3pic1').click()"/>
                                                            <img class=" h100"  id="cover-img-paragraph3pic2" 

                                                                 <?= $project->pic5_url == "" ? "" : 'src="' . $project->pic(5) . '"' ?>
                                                                 onclick="$('#paragraph3pic2').click()"/>

                                                        </div>
                                                        <div class="col-md-6" >
                                                            <img class="h100" style="height: 250px" 

                                                                 <?= $project->pic6_url == "" ? "" : 'src="' . $project->pic(6) . '"' ?>
                                                                 id="cover-img-paragraph3pic3"  onclick="$('#paragraph3pic3').click()"/>
                                                        </div>

                                                    </div>
                                                    <form enctype="multipart/form-data" method="post"  action="{{url('admin/projects/update')}}">
                                                        {{ csrf_field() }}
                                                        <input type="file"  accept="image/*"  name="paragraph3pic1" id="paragraph3pic1" style="display: none;"
                                                               onchange="readURL(this, 'cover-img-paragraph3pic1')" />
                                                        <input type="file"  accept="image/*"  name="paragraph3pic2" id="paragraph3pic2" 
                                                               style="display: none;" onchange="readURL(this, 'cover-img-paragraph3pic2')" />
                                                        <input type="file"  accept="image/*"  name="paragraph3pic3"
                                                               id="paragraph3pic3" style="display: none;" onchange="readURL(this, 'cover-img-paragraph3pic3')" />

                                                        <input type="hidden" name="lang"  value="{{$lang}}" />
                                                        <input type="hidden" name="id"  value="{{$project->id}}" />


                                                        <div style="padding: 10px;text-align: right">
                                                            <hr />
                                                            <button type="submit" class="btn btn-secondary"  >Save photos</button> 
                                                        </div>    


                                                    </form>

                                                </div>

                                                <div class="col-md-8">
                                                    <form  method="post"  action="{{url('admin/projects/update')}}">
                                                        <input type="hidden" name="lang"  value="{{$lang}}" />
                                                        <input type="hidden" name="id"  value="{{$project->id}}" />
                                                        {{ csrf_field() }}

                                                        <input  name="paragraph3-title_{{$lang}}" 
                                                                value="{{$project["paragraph3_title_" . $lang]}}"
                                                                type="text" class="paragraph-title" placeholder="Enter title of third paragraph" />
                                                        <textarea name="paragraph3-content_{{$lang}}" class="paragraph-content" placeholder="Enter contents of third paragraph"
                                                                  rows="10" >{{$project["paragraph3_content_" . $lang]}}</textarea>
                                                        <div style="padding: 10px;text-align: right">
                                                            <hr />
                                                            <button type="submit" class="btn btn-secondary"  >Save Third paragraph</button> 
                                                        </div>
                                                    </form>
                                                </div>

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
<?php if ($project->lat != "") { ?>
                                                                lat: {{$project -> lat}},
                                                                        lng: {{$project -> lng}}
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
<?php if (App\Models\Medium::where('target_type', 1)->where('target_id', $project->id)->count() > 0) { ?>
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
                </body>
                </html>