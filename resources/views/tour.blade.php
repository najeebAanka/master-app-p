<!DOCTYPE html>
<?php
$lang = Illuminate\Support\Facades\App::getLocale();
$item = App\Models\Property::select(['title_'.$lang.' as name'])->find(Route::input('id'));


?>
<!-- Start HTML-->
<html>

    <head>
        <!-- Arabic Meta-->
        <meta charset="UTF-8">
        <!-- Title-->
        <title>{{$item->name}} | Masterpiece</title>
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
        <div  >
            @include('shared/nav')
            <!-- Header-->




  <section class="relative overflow-hidden" id="header"> 
        <!-- header Image--><img class="absolute w-full h-full" src="{{url('public')}}/dist/assets/img/header.jpg" alt="" srcset="">
      </section>
            <section class="pageWithHeader mb-32 relative z-40" style="padding: 20px;
                    margin: 10px;">
        <!-- header title-->
          <h1 class="font-bold title  p-4 text-center">360 {{__('home.tour')}} | {{$item->name}}</h1>
          <div class=" px-4 mx-auto"> 
              <iframe height="600px" width="100%" allowfullscreen="true" src="https://3dtour.ae/tour/d1-360/" style="
                      
                       border : solid 5px #ccc;border-radius: 10px;
                      
                      "> </iframe>
        
        
        
          
          </div>
        
   
        
      </section>
      <!-- about-->
  


            @include('shared/footer')
            @include('shared/scripts')
           
        </div>
    </body>
</html>