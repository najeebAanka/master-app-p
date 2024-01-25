<!DOCTYPE html>

<!-- Start HTML-->
<html>

    <head>
        <!-- Arabic Meta-->
        <meta charset="UTF-8">
        <!-- Title-->
        <title>{{__('home.developers')}} | Masterpiece</title>
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
        <div id="about" class="subPage">
            @include('shared/nav')
            <!-- Header-->



            <section class="mt-16" id="propertyForRent">
                <div class="container mx-auto"> 
                    <!-- Address -->
                    <div class="address pl-4">
                        <div class="row flex items-center mb-12 flex-wrap ">
                            <h3 class="font-bold title yellowColor flex w-full">Developers in Dubai</h3>
                            <p class="Description gray">Choose your developer   </p>
                        </div>
                    </div>
                    <div class="row flex flex-wrap justify-center">
                        <?php foreach (App\Models\Developer::get() as $dev) { ?>
                            <div class="w-1/3 md:w-3/12">
                                <!-- Developers Logo-->
                                <div class="DeveloperLogo flex items-center justify-center"> 
                                    <a href="{{url('projects?dev_id='.$dev->id.'&developer='.$dev->name_en)}}">
                                        @if($dev->icon)
                                        <img class="mx-auto" src="{{$dev->image()}}" alt="" srcset="">
                                        @else
                                        <strong class="">{{$dev->name_en}}</strong>
                                        @endif
                                    </a></div>
                            </div>

                        <?php } ?> 




                    </div>
                </div>
            </section>



            @include('shared/footer')
            @include('shared/scripts')

        </div>
    </body>
</html>