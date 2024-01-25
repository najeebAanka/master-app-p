<!DOCTYPE html>
<!-- Start HTML-->
<?php $lang = Illuminate\Support\Facades\App::getLocale();

?>
<html lang="{{$lang}}">
    <!-- Start head-->
    <head>
        <!-- Arabic Meta-->
        <meta charset="UTF-8">
        <!-- Title-->
        <title>Masterpiece</title>
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
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
            .active::before {
                background: #3a343487!important;
            }
            @media(min-width: 320px) and (max-width: 1024px){
                .area p.mainTitle.numbers{
                    display: none
                }
            }
        </style>
    </head>
    <!-- Start body-->
    <body> 
        <div id="home">
            @include('shared/nav')
            <!-- Header-->
            <div class="slick-header">
                <div class="relative"> 
                    <div class="sliderTitle" style=" width: 70rem;   "><p>{{__('home.feel_home_with_us')}}</p> <a class="btn" href="{{url('properties')}}">{{__('home.explore')}} </a></div><img src="{{url('')}}/public/dist/assets/img/3.webp" alt="" srcset="">
                </div>
                <div class="relative"> 
                    <div class="sliderTitle" style=" width: 70rem;   "><p>{{__('home.feel_home_with_us')}}</p>   <a class="btn" href="{{url('properties')}}">{{__('home.explore')}} </a></div><img src="{{url('')}}/public/dist/assets/img/header.webp" alt="" srcset="">
                </div>
            </div>
            <div class="container relative mx-auto"> 
                <div id="filterHeader">
                    <!-- Filter -->
                    <div class="px-8" id="filter"> 
                        <form action="{{url('properties')}}" method="get"> 
                            <h3 class="title text-center font-bold -mt-8 pb-8"> {{__('home.browse_for_properties')}} </h3>
                            <div class="row flex flex-wrap"> 
                                <div class="w-1/2 sm:w-1/3 md:w-1/6 p-4 pl-0"> 
                                    <select class="w-full" id="p-type-selector" name="target" onchange="initPTypeSliders()">
                                        <option value="sell" data-display="{{__('home.buy')}}">{{__('home.buy')}} </option>
                                        <option  value="rent">{{__('home.rent')}}  </option>

                                    </select>
                                </div>
                                <div class="w-1/2 sm:w-1/3 md:w-1/6 p-4"> 
                                    <select class="w-full" name="bedrooms">
                                        <option value="0" data-display="{{__('home.bedrooms')}}">{{__('home.bedrooms')}}  </option>
                                        <option value="0">Studio</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                                <div class="w-1/2 sm:w-1/3 md:w-1/6 p-4"> 
                                    <select class="w-full" name="bathrooms">
                                        <option value="1"  data-display="{{__('home.bathrooms')}}">{{__('home.bathrooms')}} </option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                                <div class="w-1/2 sm:w-1/3 md:w-1/6 p-4"> 
                                    <select class="w-full" id="categories-select" name="category">
                                        <option data-display="{{__('home.type')}} ">{{__('home.type')}}  </option>
                                    </select>
                                </div>
                                <div class="w-1/2 sm:w-1/3 md:w-1/6 p-4"> 
                                    <select class="w-full select2-single-clients " id="locations-select" name="location">
                                        <option data-display="{{__('home.location')}}">{{__('home.location')}}  </option>
                                    </select>
                                </div>
                                <div class="w-1/2 sm:w-1/3 md:w-1/6 p-4"> 
                                    <select class="w-full">
                                        <option value="3" data-display="{{__('home.completion_status')}}">{{__('home.completion_status')}}</option>
                                        <option value="15">{{__('home.offplan')}}   </option>

                                        <option value="4"> {{__('home.ready')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row flex flex-wrap mb-8"> 
                                <div class="p-4 flex  ml-0 xl:ml-8">
                                    <div class="flex flex-wrap  mt-6">
                                        <!-- Filter -->
                                        <div class="flex flex-wrap Currency text-center">
                                            <!-- filter by Currency-->
                                            <div class="flex items-center justify-end Currency"><span class="mr-1 w-48 md:w-auto">  {{__('home.price_range')}}</span></div>
                                            <div class="check p-4 relative overflow-hidden px-8 checkIsActive" >
                                                <input type="radio" class="Currency" id="aed-radio1">
                                                <label for=""> {{__('home.aed')}}</label>
                                            </div>
                                            <div class="check p-4 relative overflow-hidden px-8">
                                                <input type="radio" class="Currency" id="usd-radio1">
                                                <label for=""> {{__('home.usd')}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-4 flex  ml-0 xl:ml-8">
                                    <div class="flex flex-wrap  mt-6">
                                        <!-- Filter -->
                                        <div class="flex flex-wrap Area text-center">
                                            <!-- filter by Currency-->
                                            <div class="flex items-center justify-end Currency"><span class="mr-1 w-48 md:w-auto">{{__('home.area_range')}}</span></div>
                                            <div class="check p-4 relative overflow-hidden px-8 checkIsActive"  >
                                                <input type="radio" class="Area"  id="ft-radio1">
                                                <label for=""> {{__('home.sqf')}}</label>
                                            </div>
                                            <div class="check p-4 relative overflow-hidden px-8">
                                                <input type="radio" class="Area"  id="mtr-radio1" >
                                                <label for=""> {{__('home.sqm')}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row flex flex-wrap"> 
                                <div class="p-4 flex items-center w-full sm:w-1/2 md:w-4/12 pl-12">
                                    <div class="flex w-full items-center RangeFilter  md:flex-wrap ml-0">
                                        <div class="js-example-class " id="prices-range"></div> </div>
                                </div>
                                <div class="p-4 flex items-center w-full sm:w-1/2 md:w-4/12 pl-12">
                                    <div class="flex w-full items-center RangeFilter  md:flex-wrap ml-4">
                                        <div class="js-example-class " id="area-range"></div> </div>
                                </div>
                                <div class="p-4 flex items-center UltraLuxury  pl-8"><label class="checkbox mt-8 ml-10"> {{__('home.ultra_luxury')}}
                                        <input type="checkbox" name="class" value="Ultra-Luxury">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="p-4 flex items-center UltraLuxury ">
                                    <button class="btn mr-0 ml-auto mt-8 md:mt-0 w-full " name="Search">        {{__('home.search')}}  </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- services                                                   -->
            <section class="pt-12 md:pt-0" id="services"> 
                <div class="container px-4 mx-auto"> 
                    <div class="row flex flex-wrap items-center justify-center">
                        <div class=" w-1/2 md:w-1/4">
                            <!-- Items Service-->
                            <div class="itemService text-center relative py-8 md:py-32" title="Multilingual Team">
                                <!-- Service Image--><img class="mx-auto  h-48 " src="{{url('')}}/public/dist/assets/img/1.png" alt="" srcset="">
                                <!-- Service title-->
                                <h3 class="title mt-8 mb-0">{!!__('home.multi_lingual_team')!!}</h3>
                                <p class="px-2">{!!__('home.multi_lingual_team_hint')!!}</p>
                            </div>
                        </div>
                        <div class=" w-1/2 md:w-1/4">
                            <!-- Items Service-->
                            <div class="itemService text-center relative py-8 md:py-32" title="Comprehensive service">
                                <!-- Service Image--><img class="mx-auto  h-48 " src="{{url('')}}/public/dist/assets/img/2.png" alt="" srcset="">
                                <!-- Service title-->
                                <h3 class="title mt-8 mb-0">{!!__('home.comprehensive_service')!!}</h3>
                                <p class="px-2">{!!__('home.comprehensive_service_hint')!!}</p>
                            </div>
                        </div>
                        <div class=" w-1/2 md:w-1/4">
                            <!-- Items Service-->
                            <div class="itemService text-center relative py-8 md:py-32" title="Fine Proven Developers">
                                <!-- Service Image--><img class="mx-auto  h-48 " src="{{url('')}}/public/dist/assets/img/3.png" alt="" srcset="">
                                <!-- Service title-->
                                <h3 class="title mt-8 mb-0">{!!__('home.fine_proven_devs')!!}</h3>
                                <p class="px-2">{!!__('home.fine_proven_devs_hint')!!}</p>
                            </div>
                        </div>
                        <div class=" w-1/2 md:w-1/4">
                            <!-- Items Service-->
                            <div class="itemService text-center relative py-8 md:py-32" title="Crypto Advisory">
                                <!-- Service Image--><img class="mx-auto  h-48 " src="{{url('')}}/public/dist/assets/img/4.png" alt="" srcset="">
                                <!-- Service title-->
                                <h3 class="title mt-8 mb-0">{!!__('home.crypto_advicory')!!}</h3>
                                <p class="px-2">{!!__('home.crypto_advicory_hint')!!}</p>
                            </div>
                        </div>
                    </div>
            </section>
            <!-- PROPERTY FOR SALE                                  -->
            <section class="property mb-32" style="display: none" id="sale_container-6">
                <div class="container px-4 mx-auto"> 
                    <div class="row flex items-center mb-12 flex-col md:flex-row">
                        <div class="w-full md:w-3/12">
                            <!-- Address-->
                            <h3 class="font-bold title yellowColor">{{__('home.property_for_sale')}}</h3>
                        </div>
                        <div class="flex items-center flex-wrap w-full md:w-9/12  justify-start md:justify-end mt-6">
                            <!-- Filter-->
                            <div class="items-center mr-4 mb-8 md:mb-0">
                                <div class="Select Currency">
                                    <!-- filter by Currency-->
                                    <div class="flex w-full items-center justify-end Currency"><span class="mr-2 w-48 md:w-auto">  {{__('home.currency')}}  </span>
                                        <div class="check p-4 relative overflow-hidden px-8 checkIsActive" >
                                            <input type="radio" name="Currency" id="aed-radio2">
                                            <label for=""> {{__('home.aed')}}</label>
                                        </div>
                                        <div class="check p-4 relative overflow-hidden px-8">
                                            <input type="radio" name="Currency" id="usd-radio2">
                                            <label for=""> {{__('home.usd')}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="items-center">
                                <!-- filter by Area-->
                                <div class="Select Area"> 
                                    <div class="flex w-full items-center justify-end Area"><span class="mr-2 w-48 md:w-auto">  {{__('home.area')}} </span>
                                        <div class="check p-4 relative overflow-hidden px-8 " >
                                            <input type="radio" name="Area"  id="mtr-radio2">
                                            <label for=""> {{__('home.sqm')}}</label>
                                        </div>
                                        <div class="check p-4 relative overflow-hidden px-8 checkIsActive">
                                            <input type="radio" name="Area" checked  id="ft-radio2">
                                            <label for=""> {{__('home.sqf')}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row flex flex-wrap items-center">
                        <div  id="g76" class="w-full"> 
                            <table style="width : 100%">

                                <td>   <div class=" property-for-sale-holder "> </div></td>
                                <td>   <div class=" property-for-sale-holder "> </div></td>
                                <td>   <div class=" property-for-sale-holder "> </div></td>
                                <td>   <div class=" property-for-sale-holder"> </div></td>



                            </table>





                        </div>
                    </div>
                </div>
            </section>
            <!-- PROPERTY FOR RENT-->
            <!-- This Data get by ajax from index.js     -->
            <section class="property  mb-32" id="p-p-r" style="display: none">
                <div class="container px-4 mx-auto"> 
                    <div class="row flex items-center mb-12 flex-col md:flex-row">
                        <div class="w-full md:w-3/12">
                            <!-- Address-->
                            <h3 class="font-bold title yellowColor">{{__('home.property_for_rent')}}</h3>
                        </div>
                        <div class="flex items-center flex-wrap w-full md:w-9/12  justify-start md:justify-end mt-6">
                            <!-- Filter-->
                            <div class="items-center mr-4 mb-8 md:mb-0">
                                <div class="Select Currency">
                                    <!-- filter by Currency-->
                                    <div class="flex w-full items-center justify-end Currency"><span class="mr-2 w-48 md:w-auto">  {{__('home.currency')}}  </span>
                                        <div class="check p-4 relative overflow-hidden px-8 checkIsActive" >
                                            <input type="radio" name="Currency" id="aed-radio3">
                                            <label for=""> {{__('home.aed')}}</label>
                                        </div>
                                        <div class="check p-4 relative overflow-hidden px-8">
                                            <input type="radio" name="Currency" id="usd-radio3">
                                            <label for=""> {{__('home.usd')}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="items-center">
                                <!-- filter by Area-->
                                <div class="Select Area"> 
                                    <div class="flex w-full items-center justify-end Area"><span class="mr-2 w-48 md:w-auto">  {{__('home.area')}} </span>
                                        <div class="check p-4 relative overflow-hidden px-8 " >
                                            <input type="radio" name="Area" id="mtr-radio3">
                                            <label for=""> {{__('home.sqm')}}</label>
                                        </div>
                                        <div class="check p-4 relative overflow-hidden px-8 checkIsActive">
                                            <input type="radio" name="Area" checked id="ft-radio3">
                                            <label for=""> {{__('home.sqf')}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row flex flex-wrap items-center">
                        <div  id="g77" class="w-full"> 



                            <table style="width : 100%">

                                <td>   <div class=" property-for-sale-holder animate"> </div></td>
                                <td>   <div class=" property-for-sale-holder animate"> </div></td>
                                <td>   <div class=" property-for-sale-holder animate"> </div></td>
                                <td>   <div class=" property-for-sale-holder animate"> </div></td>



                            </table>





                        </div>
                    </div>
                </div>
            </section>
            <section class="touch my-32">
                <div class="container px-4 mx-auto"> 
                    <h3 class="yellowColor title p-4 font-bold"> {{__('home.get_in_touch')}}</h3>
                    <div class="row flex flex-wrap items-center">
                        <div class="w-full md:w-2/3">
                            @include('shared/contact-form')
                        </div>
                        <div class="w-full md:w-1/3">
                            <div class="TouchImage p-4"><img src="{{url('')}}/public/dist/assets/img/item2.jpg" alt="" srcset=""></div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- POPULAR AREAS       -->
            <section class="PopularAreas mb-32" id="areas-section" style="display: none"> 
                <div class="container px-4 mx-auto"> 
                    <h3 class="font-bold title yellowColor mb-8 p-4">{{__('home.popular_areas')}} </h3>
                    <div class="row flex flex-wrap items-center">


                        <div class="p-4 w-full md:w-2/4">

                            <div class="area relative overflow-hidden  area-holder" > 



                            </div>
                        </div>  
                        <div class="p-4 w-full md:w-1/4">

                            <div class="area relative overflow-hidden  area-holder" > 


                            </div>
                        </div>  
                        <div class="p-4 w-full md:w-1/4">

                            <div class="area relative overflow-hidden  area-holder" > 


                            </div>
                        </div>  
                        <div class="p-4 w-full md:w-1/4">

                            <div class="area relative overflow-hidden  area-holder" > 


                            </div>
                        </div>  
                        <div class="p-4 w-full md:w-1/4">

                            <div class="area relative overflow-hidden  area-holder" > 


                            </div>
                        </div>  
                        <div class="p-4 w-full md:w-1/4">

                            <div class="area relative overflow-hidden  area-holder" > 


                            </div>
                        </div>  
                        <div class="p-4 w-full md:w-1/4">

                            <div class="area relative overflow-hidden  area-holder" > 


                            </div>
                        </div>  

                    </div>
                </div>
            </section>
            <!-- OUR DEVELOPERS                      -->
            <section class="developers mb-32" id="developers-section" style="display: none;">
                <div class="container px-4 mx-auto"> 
                    <h3 class="font-bold title yellowColor mb-8 p-4">{{__('home.our_developers')}}  </h3>
                    <div class="row flex flex-wrap items-center">
                        <div class="Developer">
                            <div class="logo p-4 h-40  developer-holder"> 
                            </div>
                            <div class="logo p-4 h-40  developer-holder"> 
                            </div>
                            <div class="logo p-4 h-40  developer-holder"> 
                            </div>
                            <div class="logo p-4 h-40  developer-holder"> 
                            </div>
                            <div class="logo p-4 h-40  developer-holder"> 
                            </div>
                            <div class="logo p-4 h-40  developer-holder"> 
                            </div>
                            <div class="logo p-4 h-40  developer-holder"> 
                            </div>
                            <div class="logo p-4 h-40  developer-holder"> 
                            </div>
                            <div class="logo p-4 h-40  developer-holder"> 
                            </div>
                            <div class="logo p-4 h-40  developer-holder"> 
                            </div>


                        </div>
                    </div>
                </div>
            </section>
            <!-- GET THE BEST SUPPORT      -->
            <section class="support mb-32" id="services-section">
                <div class="container px-4 mx-auto"> 
                    <div class="row flex flex-wrap items-center relative overflow-hidden">
                        <div class="w-full md:w-1/2">
                            <h3 class="font-bold title yellowColor mb-8 p-4">{{__('home.get_best_support')}}  </h3>
                            @include('shared/contact-form')
                        </div>
                        <div class="w-full md:w-1/2 md:absolute top-0 right-0 h-full"> 
                            <h3 class="font-bold title yellowColor mb-8 p-4">{{__('home.our_services')}}  </h3>
                            <div class="AllServices"> 
                                <ul class="flex flex-wrap items-center justify-center" id="services-ul"> 
                                    <?php 
                                    $services = \App\Models\ServiceItem::get();
                                    foreach ($services as $s) { ?>
                                        <li class="py-6 px-1 md:px-2 w-1/3"><a href="{{url('service')."/".$s->id}}">
                                                <span class="px-2 py-8 flex flex-col w-full text-center">{{$s['name_'.$lang]}}</span></a></li>
<?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- NEW LAUNCH PROJECTS    -->
            <section class="projects  mb-32" id="projects-section" style="display: none;">
                <div class="container px-4 mx-auto"> 


                    <h3 class="font-bold title yellowColor mb-8 p-4">{{__('home.new_launch_projects')}} </h3>
                    <div  class="row flex items-center justify-center flex-wrap"> 


                        <div class="pr-4 my-4 w-full md:w-1/3 xl:w-1/4 project-holder">
                            <div class="area relative overflow-hidden animate "> </div>

                        </div>
                        <div class="pr-4 my-4 w-full md:w-1/3 xl:w-1/4 project-holder">
                            <div class="area relative overflow-hidden animate "> </div>

                        </div>
                        <div class="pr-4 my-4 w-full md:w-1/3 xl:w-1/4 project-holder">
                            <div class="area relative overflow-hidden animate "> </div>

                        </div>
                        <div class="pr-4 my-4 w-full md:w-1/3 xl:w-1/4 project-holder">
                            <div class="area relative overflow-hidden animate "> </div>

                        </div>
                        <!--                        <div class="pr-4 my-4 w-full md:w-1/3 xl:w-1/5 project-holder">
                                                    <div class="area relative overflow-hidden animate "> </div>
                        
                                                </div>-->

                    </div>
                </div>
            </section>
            <!--        CONTACT US -->
            <section class="contact mb-32" id="contactus">
                <div class="container px-4 mx-auto"> 
                    <h3 class="font-bold title yellowColor mb-8 p-4">{{__('home.contact_us')}}  </h3>
                    <div class="row flex flex-wrap items-center relative overflow-hidden">
                        <div class="w-full mb-8 md:mb-0 md:w-1/3">

                            @include('shared/contact-form')
                        </div>
                        <div class="w-full mb-8 md:mb-0 md:w-1/3 px-8"><div style="width: 100%; height:40rem; border-radius:2rem" class="overflow-hidden">

                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3613.1324688695754!2d55.166421715007516!3d25.097376783942682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6b1df2a8b9b5%3A0xf8a9a507a53c31d6!2sMASTERPIECE%20Real%20Estate%20Broker!5e0!3m2!1sen!2sae!4v1650876477732!5m2!1sen!2sae" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                            </div>
                        </div>
                        <!-- Contact Details  -->
                        <div class="w-full mb-8 md:mb-0 md:w-1/3 px-8">

                            @include('shared/address-form')


                        </div>
                    </div>
                </div>
            </section>
            @include('shared/footer')
            @include('shared/scripts')

            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script>


                                        $('.select2-single-clients').select2({
                                        placeholder: "All locations",
                                                allowClear: true
                                                ,
                                                ajax: {
                                                url: server + "locations",
                                                        data: function (params) {
                                                        var query = {
                                                        name: params.term,
                                                                start: params.page * 10 || 0
                                                        }

                                                        return query;
                                                        }
                                                }
                                        });
                                        var currency = "aed";
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
                                        };
                                        const area_ft_slider_options = {
                                        range: {
                                        min: 200,
                                                max: 20000,
                                                step: 500

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
                                        var isft = true;
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
                                        } else{
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
                                        function fetchAreas(){
                                        _http("GET", server + "areas", "", function (
                                                res) {

                                        //     console.log(res);
                                        var data = JSON.parse(res).data;
                                        var step = 0;
                                        var arr = [];
                                        $(".area-holder").each(function () {
                                        $(this).html('<a href="{{url('properties')}}?location=' + data[step].name + '" class="absolute top-0 left-0 w-full h-full"><img class="w-full h-full object-cover" src="' + data[step].img_url + '" alt="" srcset="">\n\
                <div class="details absolute top-4 left-4"><p class="mainTitle numbers">' + data[step].count_properties + ' {{__('home.properties')}}</p>'
                                                + '<p class="mainTitle location">' + data[step].name + '</p></div><div class="price absolute bottom-4 right-4">\n\
                    <p class="mainTitle">{{__('home.starting_price_from')}}: ' + data[step].starting_price + ' AED</p></div></a>')
                                                arr.push({"id": data[step].id, "name": data[step].name});
                                        $(this).addClass('active');
                                        step++;
                                        });
                                        // console.log(arr);
                                        $.cookie("areas506", JSON.stringify(arr));
                                        fillAreasInNav();
                                        $('#areas-section').show();
                                        fetchProjects();
                                        });
                                        }


                                        function fetchCategories(){

                                        _http("GET", server + "categories", "", function (
                                                res) {

                                        console.log(res);
                                        var data = JSON.parse(res).data;
                                        var step = 0;
                                        for (var i = 0; i < data.length; i++){
                                        $('#categories-select').append('<option value="' + data[i].id + '">' + data[i].name + '</option>');
                                        }

                                        $('#categories-select').niceSelect('update');
                                        fetchAreas();
                                        });
                                        }
                                        function getFeaturedProps(){

                                        _http("GET", server + "properties?target=sell&featured=true", "", function (
                                                res) {
                                        fetchDevelopers();
                                        //   console.log(res);
                                        var data = JSON.parse(res).data;
                                        var step = 0;
                                        var t = "";
                                        $('#g76').html();
                                        for (var i = 0; i < data.length; i++) {
                                        t += ' <div class="p-10">' + buildPropertyCard(data[i]) + '</div>';
                                        }
                                        $('#g76').html('');
                                        $('#g76').html(t);
                                        $('#g76').slick({
                                        infinite: true,
                                                slidesToShow: 4, // Shows a three slides at a time
                                                slidesToScroll: 1, // When you click an arrow, it scrolls 1 slide at a time
                                                arrows: true, // Adds arrows to sides of slider
                                                dots: false, // Adds the dots on the bottom,
                                                responsive: [{
                                                breakpoint: 1280,
                                                        settings: {
                                                        slidesToShow: 3,
                                                                slidesToScroll: 1,
                                                        }
                                                },
                                                {
                                                breakpoint: 1024,
                                                        settings: {
                                                        slidesToShow: 2,
                                                                slidesToScroll: 1
                                                        }
                                                },
                                                {
                                                breakpoint: 640,
                                                        settings: {
                                                        autoplay: true,
                                                                slidesToShow: 1,
                                                                slidesToScroll: 1,
                                                                dots: true, // Adds the dots on the bottom,
                                                        }
                                                }
                                                // You can unslick at a given breakpoint now by adding:
                                                // settings: "unslick"
                                                // instead of a settings object
                                                ]
                                        });
                                        //    $('#g76').slick('refresh');
                                        // console.log("refreshed");
                                        $('#sale_container-6').show();
                                        });
                                        }

                                        function fetchProjects(){

                                        _http("GET", server + "projects", "", function (
                                                res) {

                                        //   console.log(res);
                                        var data = JSON.parse(res).data;
                                        var step = 0;
                                        $(".project-holder").each(function () {
                                        if (step < data.length) {
                                        $(this).children(":first").html('<a href="{{url('')}}/project/' + data[step].id + '"> <img class="w-full h-full object-cover" src="' + data[step].thumbnail +
                                                '" alt="" srcset=""> <div class="launch absolute top-4 right-4"><span>New launch</span></div>\n\
                        <div class="details absolute top-4 left-4"> <p class="mainTitle numbers">' + data[step].count_properties + ' {{__('home.properties')}}</p><p class="mainTitle location">\n\
</p></div><div class="price absolute bottom-4 right-4"> <p class="mainTitle">' + data[step].name + '</p></div></a>');
                                        $(this).children(":first").removeClass("animate");
                                        $(this).children(":first").addClass("active");
                                        step++;
                                        } else {
                                        $(this).remove();
                                        }
                                        });
                                        $('#projects-section').show();
                                        getFeaturedProps();
                                        });
                                        }
                                        function fetchDevelopers(){
                                        _http("GET", server + "developers", "", function (
                                                res) {


                                        var data = JSON.parse(res).data;
                                        var step = 0;
                                        var arr = [];
                                        $(".developer-holder").each(function () {
                                        if (step < data.length) {
                                        $(this).html('<a href="#"> <img class="mx-auto  h-full" src="' + data[step].img_url + '" alt="' + data[step].name + '" srcset=""></a>');
                                        $(this).removeClass("animate");
                                        arr.push({"id": data[step].id, "name": data[step].name});
                                        step++;
                                        } else {
                                        $(this).remove();
                                        }
                                        });
                                        $.cookie("devs506", JSON.stringify(arr));
                                        fillDevsInNav();
                                        $('.Developer').slick({
                                        slidesToShow: 5, // Shows a three slides at a time
                                                speed: 5000,
                                                autoplay: true,
                                                autoplaySpeed: 0,
                                                centerMode: true,
                                                cssEase: 'linear',
                                                slidesToScroll: 1,
                                                // variableWidth: true,
                                                infinite: true,
                                                initialSlide: 1,
                                                arrows: false,
                                                buttons: false,
                                                responsive: [{
                                                breakpoint: 1280,
                                                        settings: {
                                                        slidesToShow: 3,
                                                                slidesToScroll: 1,
                                                        }
                                                },
                                                {
                                                breakpoint: 1024,
                                                        settings: {
                                                        slidesToShow: 2,
                                                                slidesToScroll: 1
                                                        }
                                                },
                                                {
                                                breakpoint: 640,
                                                        settings: {
                                                        slidesToShow: 3,
                                                                slidesToScroll: 1
                                                        }
                                                }
                                                // You can unslick at a given breakpoint now by adding:
                                                // settings: "unslick"
                                                // instead of a settings object
                                                ]
                                        });
                                        $('#developers-section').show();
                                        });
                                        }


                                        fetchCategories();


            </script>
        </div>
    </body>
</html>