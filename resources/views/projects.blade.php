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
        <title>Projects | Masterpiece</title>
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
        <div id="">
            @include('shared/nav')
            <!-- Header-->

            <!--<div style="height: 100px"></div>-->     

 <!-- projects-->
      <div class="project">                       
        <div class="container mx-auto"> 
          <div class="address pl-4">
            <div class="row flex items-center mb-12 flex-wrap ">
              <h3 class="font-bold title yellowColor flex w-full">  <?= isset($_GET['developer'])?$_GET['developer']:"All developers"?></h3>
            
            </div>
          </div>
          <div class="row flex items-center mb-12 flex-wrap " id="holder">
             
              
        
          </div>
             <div class="row flex items-center mb-12 flex-wrap " id="loader-row">
                  <!-- Project -->
                  <div class="w-full sm:w-1/2 md:w-4/12">
                    <div class="projectItem p-4 ">
                      <div class="projectImage relative overflow-hidden rounded-3xl animate" >
                      </div>
                      <!-- project Details-->
                      <div class="projectDetails py-4 text-overflow "> 
                          <div class="font-bold title animate" style="height: 95px"></div>
                     
                          
                      </div>
                    </div>
                  </div>
            
                     <div class="w-full sm:w-1/2 md:w-4/12">
                    <div class="projectItem p-4 ">
                      <div class="projectImage relative overflow-hidden rounded-3xl animate" >
                      </div>
                      <!-- project Details-->
                      <div class="projectDetails py-4 text-overflow "> 
                          <div class="font-bold title animate" style="height: 95px"></div>
                     
                          
                      </div>
                    </div>
                  </div>
            
                     <div class="w-full sm:w-1/2 md:w-4/12">
                    <div class="projectItem p-4 ">
                      <div class="projectImage relative overflow-hidden rounded-3xl animate" >
                      </div>
                      <!-- project Details-->
                      <div class="projectDetails py-4 text-overflow "> 
                          <div class="font-bold title animate" style="height: 95px"></div>
                     
                          
                      </div>
                    </div>
                  </div>
            
              
        
          </div>
            <div class="w-full mx-auto">
                
                <p class="text-center my-12"><a class="font-bold text-center title w-full block " onclick="loadMoreAreas()">{{__('home.show_more')}} </a>
                     </p>
            </div>
        </div>
      </div>
      <!-- GET IN TOUCH WITH US-->
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


                    _http("GET", server + "projects?start=" + start  <?= isset($_GET['dev_id'])?' + "&developer=' .$_GET['dev_id'].'"':""?>, "", function (
                            res) {
                        $('#loader-row').hide();
                        var data = JSON.parse(res).data;
                        for (var i = 0; i < data.length; i++) {
                            $('#holder').append('<div class="w-full sm:w-1/2 md:w-4/12"> <div class="projectItem p-4">\n\
                 <div class="projectImage relative overflow-hidden rounded-3xl"><a href="{{url('project')}}/'+data[i].id+'"> <img class="h-full w-full object-cover"\n\
 src="'+data[i].thumbnail+'" alt=""> <ul class="tags absolute bottom-4 left-4 flex items-center"> <li class="p-4 mr-4 bg-white rounded-xl">Villa</li>\n\
<li class="p-4 mr-4 bg-white rounded-xl">Penthouses</li></ul></a></div><div class="projectDetails py-4 text-overflow"> <h3 class="font-bold title">\n\
'+data[i].name+' </h3> <p class="title"> <i class="fas fa-map-marker-alt mr-4 ml-2"> </i>location<br><a class="title yellowColor ml-10"\n\
 href="https://www.google.com/maps/place/Dubai/@'+data[i].lat+','+data[i].lng+'.71z/data=!4m13!1m7!3m6!1s0x3e5f43496ad9c645:0xbde66e5084295162!2sDubai!3b1!8m2!3d25.2048493!4d55.2707828!3m4!1s0x3e5f43496ad9c645:0xbde66e5084295162!8m2!3d25.2048493!4d55.2707828">\n\
'+data[i].location+'</a></p></div></div></div>');
                        }
                        start+=7;






                    });




                }

loadMoreAreas();










            </script>
        </div>
    </body>
</html>