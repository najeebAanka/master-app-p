<!DOCTYPE html>
<?php
$lang = Illuminate\Support\Facades\App::getLocale();
?>
<!-- Start HTML-->
<html>
    <!-- Start head-->
<?php $name_pref = 'title_' . $lang;
$desc_pref = 'description_' . $lang; ?>
    <head>
        <!-- Arabic Meta-->
        <meta charset="UTF-8">
        <!-- Title-->
        <title>Areas | Masterpiece</title>
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
        <div >
            @include('shared/nav')
            <!-- Header-->

            <!--<div style="height: 100px"></div>-->     



       
            <!-- POPULAR AREAS-->
            <section class="PopularAreas mb-32"> 
                <div class="container px-4 mx-auto">  </div>
            </section>
            <section class="PopularAreas mb-32 ListedAreas">
                <div class="container px-4 mx-auto" > 
                    <h3 class="font-bold title yellowColor mb-8 p-4">{{__('home.listed_areas')}}</h3>

                    <div class="row flex flex-wrap items-center " id="holder">

                    </div> 
                    <div class="row flex flex-wrap items-center hidden" id="loader-row"> 
                        <div class="p-4 w-full md:w-1/2 xl:w-1/4"> <div class="area relative overflow-hidden animate"></div></div><div class="p-4 w-full md:w-1/2 xl:w-1/4"> <div class="area relative overflow-hidden animate"></div></div><div class="p-4 w-full md:w-1/2 xl:w-1/4"> <div class="area relative overflow-hidden animate"></div></div><div class="p-4 w-full md:w-1/2 xl:w-1/4"> <div class="area relative overflow-hidden animate"></div></div></div>

                        
                    <p class="text-center my-12"><a class="font-bold text-center title w-full block " onclick="loadMoreAreas()">{{__('home.show_more')}} </a>
                     </p>
                </div>
            </section>
            <!-- GET IN TOUCH WITH US-->
      <section class="touch my-32">
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



            @include('shared/footer')
            @include('shared/scripts')
            <script>

              var  start = 0;
                function loadMoreAreas() {

                    $('#loader-row').show();


                    _http("GET", server + "areas?start=" + start, "", function (
                            res) {
                        $('#loader-row').hide();
                        //     console.log(res);
                        var data = JSON.parse(res).data;

                        for (var i = 0; i < data.length; i++) {
                            $('#holder').append('<div class="p-4 w-full md:w-1/2 xl:w-1/4"> <div class="area relative overflow-hidden"> \n\
           <a href="{{url("properties")}}?location='+data[i].name+'" style="position : relative"> <img class="w-full h-full object-cover" src="'+data[i].img_url+'" alt="" srcset=""></a> \n\
<div class="btns absolute w-full"> </div><div class="details absolute left-4 top-8 mx-auto px-4 text-overflow"> \n\
           <p class="mainTitle location">'+data[i].name+'</p><div class="price"> <p class="mainTitle">Starting price form: 1,500,000 AED </p></div></div></div></div>');


                        }
                        start+=7;






                    });




                }

loadMoreAreas();










            </script>
        </div>
    </body>
</html>