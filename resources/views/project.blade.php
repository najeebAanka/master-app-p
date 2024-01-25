<!DOCTYPE html>
<?php 
$lang =  Illuminate\Support\Facades\App::getLocale();

$p = App\Models\Project::find(Route::input('id')) ?>
<!-- Start HTML-->
<html>
    <!-- Start head-->
    <?php $name_pref = 'name_' . $lang ;$desc_pref = 'description_' . $lang ;?>
    <head>
        <!-- Arabic Meta-->
        <meta charset="UTF-8">
        <!-- Title-->
        <title>{{$p->$name_pref}} | Masterpiece</title>
        <!-- Theme color-->
        <meta name="theme-color" content="#13434A">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Primary Meta Tags-->
        <meta name="title" content="Masterpiece Realty">
        <meta name="description" content="Masterpiece Real Estate is an award-winning real estate brokerage located in Dubai. Al Rabeea Street, Onyx Tower 1, Dubai, 009711 Dubai, United Arab Emirates    ">
        <!-- Open Graph / Facebook-->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://www.facebook.com/masterpiecerealestatedubai">
        <meta property="og:title" content="Masterpiece Realty">
        <meta property="og:description" content=" Masterpiece Real Estate is an award-winning real estate brokerage located in Dubai. Al Rabeea Street, Onyx Tower 1, Dubai, 009711 Dubai, United Arab Emirates  ">
        <meta property="og:image" content="https://scontent.fdxb1-1.fna.fbcdn.net/v/t39.30808-6/259328974_102221632299919_3941102367350876252_n.png?_nc_cat=109&amp;ccb=1-5&amp;_nc_sid=09cbfe&amp;_nc_ohc=o0NCScckGwEAX-bwSdA&amp;_nc_ht=scontent.fdxb1-1.fna&amp;oh=00_AT9iq98EWMC-Z0LAhKBgKsTZpnkJmm7_ZirMYzJgBkUvvg&amp;oe=61F3F6BC">
        <!-- Twitter-->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://twitter.com/masterpiecedxb">
        <meta property="twitter:title" content="Masterpiece Realty">
        <meta property="twitter:description" content="Masterpiece Real Estate is an award-winning real estate brokerage located in Dubai. Al Rabeea Street, Onyx Tower 1, Dubai, 009711 Dubai, United Arab Emirates    ">
        <meta property="twitter:image" content=" https://pbs.twimg.com/profile_images/1465659028432953346/eDr735B8_400x400.jpg">
        <!-- Fav icon-->

        @include('shared/css')
        <style>

            .checkIsActive {
                border: 1px solid #13434a;
                color: #13434a;
            }

            .property-for-sale-holder {
                width : 100%;
                border-radius: 20px;
                min-height: 200px;
            }
            #g76 table tr td{
                padding: 10px;
            }

        </style>
    </head>
    <!-- Start body-->
    <body> 
        <div class="subPage" id="project">
            @include('shared/nav')
            <!-- Header-->
 <section class="relative overflow-hidden max-h-screen" id="header"> <img class="absolute w-full h-full object-cover" src="{{$p->cover()}}" alt="" srcset="">
        <div class="container mx-auto relative h-screen">
          <!-- Project Details-->
          <div class="ProjectDetails absolute left-0 top-2/4">
            <h3 class="font-bold text-white p-4 pr-8 inline-block"> {{__('home.properties_for_sale_in')}}</h3>
            <h1 class="font-black text-white my-4">{{$p->$name_pref}}</h1><a class="btn inline-block" href="#tdu">{{__('home.req_inquiry')}} </a>
          </div>
        </div>
      </section>
      <section class="projectPage my-32">
        <div class="container px-4 mx-auto"> 
          <!-- AboutProject-->
          <div class="row flex flex-wrap items-start relative overflow-hidden place-content-between">
            <div class="w-full md:w-6/12 xl:w-6/12">
              <div class="AboutProject"> 
                <h3 class="title font-bold mb-8">  {{$p['paragraph1_title_'.$lang]}}</h3>
                <p class="Description gray"> {{$p['paragraph1_content_'.$lang]}} </p>
              </div>
            </div>
            <div class="w-full md:w-6/12 xl:w-4/12">
              <div class="AboutProject"> 
                <video class="rounded-3xl w-full" controls loop autoplay muted><source src="{{$p->video()}}" type="video/mp4"> </video>
                <a class="btn block text-center my-6" href="{{url('properties')}}?project={{Route::input('id')}}">{{__('home.check_availablity')}}</a>
              </div>
            </div>
           <?php $m = App\Models\Medium::where('target_type' ,1)->where('target_id' ,$p->id)->get();
           if(count($m) > 0) { 
            ?>
            <div class="w-full mt-24"> 
              <!-- Project Slider -->
              <div class="slick-about">
                  <?php 
 foreach ($m as $one){
                  ?>
                  <img src="{{$one->lg()}}" alt="" srcset="">
 <?php } ?>
                 
              </div>
            </div>
           <?php } ?>
          </div>
        </div>
      </section>
     
            
            <section class="touch my-32" id="tdu">
                <div class="container px-4 mx-auto"> 
                    <h3 class="yellowColor title p-4 font-bold"> {{__('home.get_in_touch')}}</h3>
                    <div class="row flex flex-wrap items-center">
                        <div class="w-full md:w-2/3">
                        
                                 @include('shared/contact-form')
                            
                        </div>
                        <div class="w-full md:w-1/3">
                            <div class="TouchImage p-4"><img src="{{url('')}}/public/dist/assets/img/home7.jpg" alt="" srcset=""></div>
                        </div>
                    </div>
                </div>
            </section>
            
      <section class="projectPage mb-32">
        <div class="container px-4 mx-auto"> 
          <div class="row flex flex-wrap items-center relative overflow-hidden place-content-between">
            <div class="w-full md:w-6/12 xl:w-6/12">
              <div class="AboutProject"> 
                <h3 class="title font-bold"> {{$p['paragraph2_title_'.$lang]}}</h3>
                <p class="Description gray">   {{$p['paragraph2_content_'.$lang]}} </p>
              </div>
            </div>
            <div class="w-full md:w-6/12 xl:w-4/12">
              <div class="AboutProject">
                <ul class="flex flex-wrap items-center Images relative overflow-hidden mb-8">
                  <li class="px-2 flex flex-col w-1/2 "><img class="object-cover py-2 min-h-full" src="{{$p->pic(1)}}" alt="" srcset=""><img class="object-cover py-2 min-h-full" src="{{$p->pic(2)}}" alt="" srcset=""></li>
                  <li class="p-2 h-full w-1/2 "><img class="object-cover min-h-full" src="{{$p->pic(3)}}" alt="" srcset=""></li>
                </ul><a class="btn block text-center mb-6" href="{{url('properties')}}?project={{Route::input('id')}}">{{__('home.check_availablity')}}</a>
              </div>
            </div>
          </div><div   style="width: 100%; height:50rem;   " class="overflow-hidden my-16">
<iframe title="map" width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
        src="https://maps.google.com/maps?q={{$p->lat}},{{$p->lng}}&width=100%25&amp;height=600&amp;hl=en&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
</div>
        </div>
      </section>
      <!-- Economic Appeal -->
      <section class="projectPage mb-32">
        <div class="container px-4 mx-auto"> 
          <h3 class="title font-bold">{{$p['paragraph3_title_'.$lang]}}</h3>
          <div class="row flex flex-wrap items-center relative overflow-hidden"> 
            <div class="w-full md:w-6/12 xl:w-4/12">
              <div class="AboutProject">
                <ul class="flex flex-wrap items-center Images relative overflow-hidden mb-8">
                  <li class="px-2 flex flex-col w-1/2 "><img class="object-cover py-2 min-h-full" src="{{$p->pic(4)}}" alt="" srcset=""><img class="object-cover py-2 min-h-full" src="{{$p->pic(5)}}" alt="" srcset=""></li>
                  <li class="p-2 h-full w-1/2 "><img class="object-cover min-h-full" src="{{$p->pic(6)}}" alt="" srcset=""></li>
                </ul>
              </div>
            </div>
            <div class="w-full md:w-6/12 xl:w-6/12 pl-4">
              <div class="AboutProject"> 
                <p class="Description gray">{{$p['paragraph3_content_'.$lang]}} </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- GET IN TOUCH WITH US-->
<!--  <section class="touch my-32">
                <div class="container px-4 mx-auto"> 
                    <h3 class="yellowColor title p-4 font-bold"> {{__('home.get_in_touch')}}</h3>
                    <div class="row flex flex-wrap items-center">
                        <div class="w-full md:w-2/3">
                            <form class="text-right" action="" method="post"> 
                                <div class="row flex flex-wrap items-center">
                                    <div class="w-full md:w-full xl:w-1/2">
                                        <div class="form-group p-4">
                                            <input class="w-full p-4" type="text" id="" value="" alt="" placeholder="{{__('home.your_name')}} ">
                                        </div>
                                    </div>
                                    <div class="w-full md:w-full xl:w-1/2">
                                        <div class="form-group p-4">
                                            <input class="w-full p-4" type="text" id="" value="" alt="" placeholder="{{__('home.email')}} " required>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-full ">
                                        <div class="form-group p-4"><input type="tel" id=" "  class="w-full p-4 phone" value="" alt="" placeholder="{{__('home.mobile')}} " required ></div>
                                    </div>
                                    <div class="w-full">
                                        <div class="form-group p-4"><textarea class="w-full p-4" name="", cols="20", rows="5" placeholder="{{__('home.message')}} "></textarea>   </div>
                                    </div>
                                    <button class="btn mr-4 ml-auto mb-4 md:mb-0">{{__('home.call_me')}}</button>
                                </div>
                            </form>
                        </div>
                        <div class="w-full md:w-1/3">
                            <div class="TouchImage p-4"><img src="{{url('')}}/public/dist/assets/img/item2.jpg" alt="" srcset=""></div>
                        </div>
                    </div>
                </div>
            </section>-->

            @include('shared/footer')
            @include('shared/scripts')
            <script>
                var shimmer_card = ' <div class="p-10 w-full xl:w-1/3"> <div class="card "> <div class="card__Image h-96 relative overflow-hidden"><div class="max-h-full max-h-full h-full w-full object-cover animate" ></div></div><div class="card__Details "> <div class="title font-bold card__Details__title flex items-center mt-6 " style="min-height: 35px;background-color: #e9e9e9;"> </div><ul class="card__Details__feature flex my-6 mt-2" style="background-color: #e9e9e9;min-height: 35px;"> </ul></div><div class="card__location pt-6" style="border-top: 0.2rem solid #ccc;"> <ul class="flex items-center" style="background-color: #e9e9e9;color : #e9e9e9"> <li class="grow flex items-center flex-wrap place-content-end w-4/6 text-right " style="background-color: #e9e9e9;min-height: 35px;"> </li></ul> </div></div></div>';

                function loadShimmer() {
                    var x = 6;
                    while (x-- > 0)
                        $('#main-core').append(shimmer_card);

                }







                var currency = "aed";
                $(function () {
                    $(".LogoSpan").hover(
                            function () {
                                $('.LogoSpan img').attr("src", "{{url('public')}}/dist/assets/img/logo.gif");
                            },
                            function () {
                                $('.LogoSpan img').attr("src", "{{url('public')}}/dist/assets/img/logos.png");
                            }
                    );
                });
                const rent_slider_options_aed = {
                    range: {
                        min: 5000,
                        max: 500000,
                        step: 5000
                    },
                    initialSelectedValues: {
                        from: 10000,
                        to: 200000
                    },
                    grid: {
                        minTicksStep: 1,
                        marksStep: 5
                    },
                    theme: "dark",
                    onFinish: function (e) {



                        $('#min-price-aed').val(e.selectedValues.from);
                        $('#max-price-aed').val(e.selectedValues.to);
                        search();

                    },
                };
                const buy_slider_options_aed = {
                    range: {
                        min: 250000,
                        max: 500000000,
                        step: 50000
                    },
                    initialSelectedValues: {
                        from: 100000000,
                        to: 400000000
                    },
                    grid: {
                        minTicksStep: 1,
                        marksStep: 10
                    },
                    theme: "dark",
                    onFinish: function (e) {



                        $('#min-price-aed').val(e.selectedValues.from);
                        $('#max-price-aed').val(e.selectedValues.to);
                        search();

                    },
                };
                const rent_slider_options_usd = {
                    range: {
                        min: 500,
                        max: 280000,
                        step: 500
                    },
                    initialSelectedValues: {
                        from: 500,
                        to: 280000
                    },
                    grid: {
                        minTicksStep: 1,
                        marksStep: 5
                    },
                    theme: "dark",
                    onFinish: function (e) {



                        $('#min-price-usd').val(e.selectedValues.from);
                        $('#max-price-usd').val(e.selectedValues.to);
                        search();

                    },
                };
                const buy_slider_options_usd = {
                    range: {
                        min: 25000,
                        max: 1400000,
                        step: 3000
                    },
                    initialSelectedValues: {
                        from: 25000,
                        to: 1400000
                    },
                    grid: {
                        minTicksStep: 1,
                        marksStep: 10
                    },
                    theme: "dark",
                    onFinish: function (e) {



                        $('#min-price-usd').val(e.selectedValues.from);
                        $('#max-price-usd').val(e.selectedValues.to);
                        search();

                    },
                };
                const area_ft_slider_options = {
                    range: {
                        min: 200,
                        max: 20000,
                        step: 200
                    },
                    initialSelectedValues: {
                        from: 200,
                        to: 20000
                    },
                    grid: {
                        minTicksStep: 1,
                        marksStep: 5
                    },
                    theme: "dark",
                    onFinish: function (e) {



                        $('#min-area-ft').val(e.selectedValues.from);
                        $('#max-area-ft').val(e.selectedValues.to);
                        search();

                    },
                };
                const area_mtr_slider_options = {
                    range: {
                        min: 40,
                        max: 900,
                        step: 10
                    },
                    initialSelectedValues: {
                        from: 40,
                        to: 20000
                    },
                    grid: {
                        minTicksStep: 1,
                        marksStep: 5
                    },
                    theme: "dark",
                    onFinish: function (e) {



                        $('#min-area-m').val(e.selectedValues.from);
                        $('#max-area-m').val(e.selectedValues.to);
                        search();

                    },
                };
                const prices_slider = $('#prices-range').alRangeSlider(rent_slider_options_aed);
                const area_slider = $('#area-range').alRangeSlider(area_ft_slider_options);


                function initPTypeSliders() {
                    var val = document.getElementById('p-type-selector').value;
                    if (val == "rent") {
                        if (currency == "aed")
                            prices_slider.alRangeSlider('restart', rent_slider_options_aed);
                        else
                            prices_slider.alRangeSlider('restart', rent_slider_options_usd);
                    } else {
                        if (currency == "aed")
                            prices_slider.alRangeSlider('restart', buy_slider_options_aed);
                        else
                            prices_slider.alRangeSlider('restart', buy_slider_options_usd);
                    }

                }

                function initAreaSliders(isft) {
                    if (isft) {

                        area_slider.alRangeSlider('restart', area_ft_slider_options);
                    } else {

                        area_slider.alRangeSlider('restart', area_mtr_slider_options);
                    }

                }



                $('.Currency input[type="radio"]').click(function () {
                    //   $('.Currency input[type="radio"]').parent().removeClass('checkIsActive');
                    //$(this).parent().addClass('checkIsActive');
                    if (($(this).attr('id') == 'aed-radio1' || $(this).attr('id') == 'aed-radio2' || $(this).attr('id') == 'aed-radio3')) {
                        currency = "aed";
                        $('.price-aed').show();
                        $('.price-usd').hide();

                        $("#aed-radio1").parent().addClass('checkIsActive');
                        $("#aed-radio2").parent().addClass('checkIsActive');
                        $("#aed-radio3").parent().addClass('checkIsActive');

                        $("#usd-radio1").parent().removeClass('checkIsActive');
                        $("#usd-radio2").parent().removeClass('checkIsActive');
                        $("#usd-radio3").parent().removeClass('checkIsActive');
                    } else {
                        currency = "usd";
                        $('.price-usd').show();
                        $('.price-aed').hide();
                        $("#usd-radio1").parent().addClass('checkIsActive');
                        $("#usd-radio2").parent().addClass('checkIsActive');
                        $("#usd-radio3").parent().addClass('checkIsActive');

                        $("#aed-radio1").parent().removeClass('checkIsActive');
                        $("#aed-radio2").parent().removeClass('checkIsActive');
                        $("#aed-radio3").parent().removeClass('checkIsActive');

                    }

                    initPTypeSliders();
                });
                $('.Area input[type="radio"]').click(function () {
                    //  $('.Area input[type="radio"]').parent().removeClass('checkIsActive');
                    //  $(this).parent().addClass('checkIsActive');
                    var isft = false;
                    if (($(this).attr('id') == 'ft-radio1' || $(this).attr('id') == 'ft-radio2' || $(this).attr('id') == 'ft-radio3')) {
                        isft = true;
                        $('.area-ft').show();
                        $('.area-m').hide();
                        $("#ft-radio1").parent().addClass('checkIsActive');
                        $("#ft-radio2").parent().addClass('checkIsActive');
                        $("#ft-radio3").parent().addClass('checkIsActive');

                        $("#mtr-radio1").parent().removeClass('checkIsActive');
                        $("#mtr-radio2").parent().removeClass('checkIsActive');
                        $("#mtr-radio3").parent().removeClass('checkIsActive');

                    } else {
                        $('.area-m').show();
                        $('.area-ft').hide();
                        $("#mtr-radio1").parent().addClass('checkIsActive');
                        $("#mtr-radio2").parent().addClass('checkIsActive');
                        $("#mtr-radio3").parent().addClass('checkIsActive');

                        $("#ft-radio1").parent().removeClass('checkIsActive');
                        $("#ft-radio2").parent().removeClass('checkIsActive');
                        $("#ft-radio3").parent().removeClass('checkIsActive');
                    }


                    initAreaSliders(isft);
                });


                function buildPropertyCard(d) {

var url = '{{url("property")}}' + '/' + d.id;
                    return '<div class="p-10 w-full xl:w-1/3"> <div class="card"> <a href="'+url+'"> \n\
<div class="card__Image h-96 relative overflow-hidden"><img class="max-h-full max-h-full h-full w-full object-cover" \n\
src="' + d.image + '" alt="" srcset=""> <span class="absolute top-4 left-0 Type p-4 py-2">' + (d.rent_or_sell ==
                            "rent" ? "{{__('home.for_rent')}}" : "{{__('home.for_sell')}}") + '</span>\n\
 <span class="absolute top-4 right-0 Type launch p-4 py-2 Launched">Launched</span> </div></a> <div class="card__Details"><a href="#">\n\
 <h3 class="title font-bold card__Details__title flex items-center mt-6"><span class="grow text-overflow w-full">' +
                            d.name + '</span>\n\
 <span class="grow w-full text-right price price-aed">{{__('home.aed')}} ' + d.price_aed + ' </span><span class="grow w-full text-right price price-usd hidden"  >$ '
                    + d.price_usd + ' </span>  </h3> <ul class="card__Details__feature flex my-6 mt-2"> <li class="grow w-1/3 text-left">\n\
 <i class="fas fa-bed mr-2"> </i><span>{{__('home.no_beds')}}: '
                    + d.no_bedrooms + '</span></li><li class="grow w-1/3 text-center"> <i class="fas fa-bath mr-2"> </i><span>{{__('home.no_baths')}}: ' + d.no_bathrooms +
                    '</span></li><li class="grow w-1/3\n\
 text-right"> <i class="fas fa-chart-area mr-2"> </i><span class="area-m">{{__('home.area')}}: '
                    + d.area_m + 'm</span><span class="area-ft hidden">{{__('home.area')}}: '
                    + d.area_ft + 'sqft</span></li></ul></a></div><div class="card__location pt-6"> <ul class="flex items-center"> \n\
<li class="grow text-overflow w-2/6"> <a href="#"> <i class="fas fa-map-marker-alt mr-2"> </i><span>' + d.location + '</span></a></li><li \n\
class="grow flex items-center flex-wrap place-content-end w-4/6 text-right "><a href="whatsapp://send?abid=0971520000000&amp;amp;text=Hello%2C%20World!"> \n\
<div class="whatsapp"> <i class="fab fa-whatsapp"></i></div></a> <a class="btn ml-4 px-8" href="'+url+'"> {{__('home.view')}}<i class="fas fa-arrow-right ml-4"> \n\
</i></a> </li></ul> </div></div></div>';





                }





                
//                
//                _http("GET", server + "properties?target=sell", "", function (
//                        res) {
//
//                    console.log(res);
//                    var data = JSON.parse(res).data;
//                    var step = 0;
//                    var t = "";
//                    $('#g76').html();
//                    for (var i = 0; i < data.length; i++) {
//                        t += buildPropertyCard(data[i]);
//
//                    }
//                    $('#g76').html('');
//                    $('#g76').html(t);
//                    $('#g76').slick({
//                        infinite: true,
//                        slidesToShow: 4, // Shows a three slides at a time
//                        slidesToScroll: 1, // When you click an arrow, it scrolls 1 slide at a time
//                        arrows: true, // Adds arrows to sides of slider
//                        dots: false, // Adds the dots on the bottom,
//                        responsive: [{
//                                breakpoint: 1280,
//                                settings: {
//                                    slidesToShow: 3,
//                                    slidesToScroll: 1,
//                                }
//                            },
//                            {
//                                breakpoint: 1024,
//                                settings: {
//                                    slidesToShow: 2,
//                                    slidesToScroll: 1
//                                }
//                            },
//                            {
//                                breakpoint: 640,
//                                settings: {
//                                    autoplay: true,
//                                    slidesToShow: 1,
//                                    slidesToScroll: 1,
//                                    dots: true, // Adds the dots on the bottom,
//                                }
//                            }
//                            // You can unslick at a given breakpoint now by adding:
//                            // settings: "unslick"
//                            // instead of a settings object
//                        ]
//                    });
//                    //    $('#g76').slick('refresh');
//                    console.log("refreshed");
//                });
            </script>
        </div>
    </body>
</html>