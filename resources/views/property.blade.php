<!DOCTYPE html>
<?php 
$lang =  Illuminate\Support\Facades\App::getLocale();

$p = App\Models\Property::find(Route::input('id'));
        
      
        ?>
<!-- Start HTML-->
<html>
    <!-- Start head-->
    <?php $name_pref = 'title_' . $lang ;$desc_pref = 'description_' . $lang ;?>
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
        <div >
            @include('shared/nav')
            <!-- Header-->

            <!--<div style="height: 100px"></div>-->     

 <!-- property For Rent-->
 <section class="mt-16" id="propertyForRent" >
        <div class="container mx-auto"> 
          <!-- address-->
          <div class="address pl-4">
            <div class="row flex items-center mb-12 flex-wrap "></div>
          </div>
          <div class="row flex flex-wrap justify-center"> 
            <div class="w-full md:w-8/12  xl:w-8/12 md:px-8 ">
              <div class="SingleProperty">
                <!-- Property Name-->
                <section class="PropertyName">
                  <h1 class="bigTitle mb-4">{{$p->$name_pref}} </h1>
                  <p class="my-4 font-bold gray blueColor">Reference : <span class="yellowColor">
                       {{$p->ref}}
                          
                          {{$p->level}}</span></p>
                  <div class="Price text-right atmobile">
                    <!-- Property Price -->
                    <h3 class="bigTitle text-right price-aed"> {{__('home.aed')}} {{$p->price_aed}}</h3>
                    <h3 class="bigTitle text-right price-usd" style="display: none"> $ {{$p->price_usd}}</h3>
                    <!-- Property Area  -->
                    <p class="my-4 font-bold gray"> {{__('home.aed')}} {{$p->price_aed}} / sq ft</p>
                  </div>
                  
                          <?php $media=Storage::disk('local')->files('properties/slides/uploaded/'.$p->ref.'/');
                               //   = App\Models\Medium::where('target_type' ,2)->where('target_id' ,$p->id)->get();
                          ?>
                          <!-- Property Slider--><div class="slider slider-single">
                      <?php 
                       if(count($media)>0){
                      foreach ($media as $m){ ?>
                  <div class="w-full relative overflow-hidden">
                      <img class="w-full h-full object-cover" src="{{asset('storage/app/'.$m)}}" alt="">
                      <span class="absolute p-4 text-white top-8 left-0 type">{{$p->rent_or_sell=="rent"? __('home.for_rent'):__('home.for_sell') }}
                      </span><span class="absolute p-4 text-white top-8 right-0 time">{{$p->launch}}</span></div>
                      <?php }
                       }else {
                           for($i=0;$i<6;$i++){
                           ?>
                    
                              
                       <div class="w-full relative overflow-hidden">
                      <img class="w-full h-full object-cover" src="{{url('public/dist/assets/img/empty.jpg')}}" alt="">
                      <span class="absolute p-4 text-white top-8 left-0 type">{{$p->rent_or_sell=="rent"? __('home.for_rent'):__('home.for_sell') }}
                      </span><span class="absolute p-4 text-white top-8 right-0 time">{{$p->launch}}</span></div>             
                              
                       <?php }} ?>
                          </div>
             
                              <!-- Property slider nav--><div class="slider slider-nav">
                                    <?php
                                    
                                    if(count($media)>0){
                                    foreach ($media as $m){ ?>
                  <div class="w-full p-2 relative overflow-hidden h-32"><img class="h-full w-full object-cover" src="{{asset('storage/app/'.$m)}}" alt=""></div>
                                    <?php }}else{
                                        
                                          for($i=0;$i<6;$i++){
                                        ?>
                   <div class="w-full p-2 relative overflow-hidden h-32"><img class="h-full w-full object-cover" src="{{url('public/dist/assets/img/empty.jpg')}}" alt=""></div>
               
                  
                                          <?php } } ?>
                  
                              </div> 
                              <a class="atmobile mb-8 btn w-full block text-center" href="{{url('tour/'.$p->id)}}" target="blank">
                      {{__('home.open')}}<svg class="mx-4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                             version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 480 480" style="enable-background:new 0 0 480 480;fill: #fff;width: 4rem;height: 4rem;display: inline-block;margin: 0 1rem ;" xml:space="preserve">
<g>
<g>
<g>
<path d="M391.502,210.725c-5.311-1.52-10.846,1.555-12.364,6.865c-1.519,5.31,1.555,10.846,6.864,12.364     C431.646,243.008,460,261.942,460,279.367c0,12.752-15.51,26.749-42.552,38.402c-29.752,12.82-71.958,22.2-118.891,26.425     l-40.963-0.555c-0.047,0-0.093-0.001-0.139-0.001c-5.46,0-9.922,4.389-9.996,9.865c-0.075,5.522,4.342,10.06,9.863,10.134     l41.479,0.562c0.046,0,0.091,0.001,0.136,0.001c0.297,0,0.593-0.013,0.888-0.039c49.196-4.386,93.779-14.339,125.538-28.024     C470.521,316.676,480,294.524,480,279.367C480,251.424,448.57,227.046,391.502,210.725z"/>
<path d="M96.879,199.333c-5.522,0-10,4.477-10,10c0,5.523,4.478,10,10,10H138v41.333H96.879c-5.522,0-10,4.477-10,10     s4.478,10,10,10H148c5.523,0,10-4.477,10-10V148c0-5.523-4.477-10-10-10H96.879c-5.522,0-10,4.477-10,10s4.478,10,10,10H138     v41.333H96.879z"/>
<path d="M188.879,280.667h61.334c5.522,0,10-4.477,10-10v-61.333c0-5.523-4.477-10-10-10h-51.334V158H240c5.523,0,10-4.477,10-10     s-4.477-10-10-10h-51.121c-5.523,0-10,4.477-10,10v122.667C178.879,276.19,183.356,280.667,188.879,280.667z M198.879,219.333     h41.334v41.333h-41.334V219.333z"/>
<path d="M291.121,280.667h61.334c5.522,0,10-4.477,10-10V148c0-5.523-4.478-10-10-10h-61.334c-5.522,0-10,4.477-10,10v122.667     C281.121,276.19,285.599,280.667,291.121,280.667z M301.121,158h41.334v102.667h-41.334V158z"/>
<path d="M182.857,305.537c-3.567-4.216-9.877-4.743-14.093-1.176c-4.217,3.567-4.743,9.876-1.177,14.093l22.366,26.44     c-47.196-3.599-89.941-12.249-121.37-24.65C37.708,308.06,20,293.162,20,279.367c0-16.018,23.736-33.28,63.493-46.176     c5.254-1.704,8.131-7.344,6.427-12.598c-1.703-5.253-7.345-8.13-12.597-6.427c-23.129,7.502-41.47,16.427-54.515,26.526     C7.674,252.412,0,265.423,0,279.367c0,23.104,21.178,43.671,61.242,59.48c32.564,12.849,76.227,21.869,124.226,25.758     l-19.944,22.104c-3.7,4.1-3.376,10.424,0.725,14.123c1.912,1.726,4.308,2.576,6.696,2.576c2.731,0,5.453-1.113,7.427-3.301     l36.387-40.325c1.658-1.837,2.576-4.224,2.576-6.699v-0.764c0-2.365-0.838-4.653-2.365-6.458L182.857,305.537z"/>
<path d="M381.414,137.486h40.879c5.522,0,10-4.477,10-10V86.592c0-5.523-4.478-10-10-10h-40.879c-5.522,0-10,4.477-10,10v40.894     C371.414,133.009,375.892,137.486,381.414,137.486z M391.414,96.592h20.879v20.894h-20.879V96.592z"/>
</g>
</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>{{__('home.tour')}} </a>
                  <ul class="flex items-center justify-between"> 
                    <li class="mr-24"> <i class="fas fa-bath mr4"></i>        {{$p->no_bathrooms}}</li>
                    <li class="mr-24"> <i class="fas fa-bed mr4"> </i>        {{$p->no_bedrooms}}</li>
                    <li class="mr-24"> <i class="fas fa-chart-area mr4"></i>         <span class="area-ft">{{$p->area_ft}} sq.ft</span>
                        <span class="area-m" style="display: none;">{{$p->area_m}} M</span></li>
                    <li class="mr-24"> <i class="fas fa-map-marker-alt mr4"></i>        {{$p->location}}</li>
                  </ul>
                </section>
                <!-- Property Details-->
                <section class="PropertyDetails">
                  <h3 class="title font-bold mb-4">{{__('home.prop_details')}}</h3>
                  <ul class="flex flex-wrap lists"> 
                    <li class="w-full md:w-1/2 relative overflow-hidde pl-8">        {{$p->p_level}}</li>
                
                    <li class="w-full md:w-1/2 relative overflow-hidde pl-8">         RERA: {{$p->rera}}</li>
                  
                 
            
                    <li class="w-full md:w-1/2 relative overflow-hidde pl-8">         {{$p->building}} ,{{$p->location}}</li>
                    <li class="w-full md:w-1/2 relative overflow-hidde pl-8">     View:     {{$p->p_view}}</li>
                  </ul>
                </section>
                <!-- Description-->
                <section class="Description gray subDescription">
                  <h3 class="title font-bold mb-4">{{__('home.description')}} </h3>
                  <p class="mb-4">{!!nl2br($p->$desc_pref )!!}</p>
                </section>
                <!-- Amenities -->
                <section class="Amenities">
                  <h3 class="title font-bold mb-4">{{__('home.aminities')}}</h3>
                  <ul class="flex flex-wrap lists"> 
                    <li class="w-full md:w-1/2 relative overflow-hidde pl-8">      High-Speed Elevators</li>
                    <li class="w-full md:w-1/2 relative overflow-hidde pl-8">      Security, AC & Maintenance Services</li>
                    <li class="w-full md:w-1/2 relative overflow-hidde pl-8">      Event Space</li>
                    <li class="w-full md:w-1/2 relative overflow-hidde pl-8">      Gym & Fitness Facilities</li>
                    <li class="w-full md:w-1/2 relative overflow-hidde pl-8">      Balcony</li>
                    <li class="w-full md:w-1/2 relative overflow-hidde pl-8">      Internet</li>
                    <li class="w-full md:w-1/2 relative overflow-hidde pl-8">      Dishwasher</li>
                    <li class="w-full md:w-1/2 relative overflow-hidde pl-8">      Lifestyle Amenities</li>
                    <li class="w-full md:w-1/2 relative overflow-hidde pl-8">      Concierge & Guest Services</li>
                    <li class="w-full md:w-1/2 relative overflow-hidde pl-8">      Pet-Friendly</li>
<!--                    <li class="w-full md:w-1/2 relative overflow-hidde pl-8">      Bedding</li>-->
                    <li class="w-full md:w-1/2 relative overflow-hidde pl-8">      Cable TV </li>
                    <li class="w-full md:w-1/2 relative overflow-hidde pl-8">      Parking </li>
                    <li class="w-full md:w-1/2 relative overflow-hidde pl-8">      Pool </li>
                  </ul>
                </section>
                <!-- Location-->
                @if($p->lat)
                <section class="Location">
                  <h3 class="title font-bold mb-4">{{__('home.location')}}</h3><div   style="width: 100%; height:50rem;  border-radius:2rem " class="overflow-hidden my-16">
<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q={{$p->lat}},{{$p->lng}}&width=100%25&amp;height=600&amp;hl=en&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"> </iframe>
</div>
                </section>
              
<!--                 Floor Plans
                <section class="FloorPlans">
                  <h3 class="title font-bold mb-4">{{__('home.floor_plans')}}</h3><img src="{{url('public')}}/dist/assets/img/map.jpg" alt="">
                </section>-->
                
                @else
                
                 <section class="PropertyDetails">
               
                  <ul class="flex flex-wrap lists"> 
                    <li class="w-full md:w-1/2 relative overflow-hidde pl-8">GPS map coordinates are not available</li>
                    <li class="w-full md:w-1/2 relative overflow-hidde pl-8">360 View is not available</li>
                  </ul>
                </section>
                
                <!-- Property Video-->
                  @endif
              </div>
            </div>
            <div class="w-full md:w-4/12 xl:w-4/12 p-4 xl:pr-12">
              <!-- Property Contact-->
              <div class="PropertyContact">
                  
<!--                  
                <div class="Price text-right atBigScreen">
                   Property Price 
                  <h3 class="bigTitle text-right"> {{__('home.aed')}} {{$p->price_aed}}</h3>
                   Property Area  
                  <p class="my-4 font-bold gray"> {{__('home.aed')}} 1,200 / sq ft<a class="btn w-full block text-center mt-8" href="{{url('tour/'.$p->id)}}">
                       {{__('home.open')}}  <svg class="mx-4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 480 480" style="enable-background:new 0 0 480 480;fill: #fff;width: 4rem;height: 4rem;display: inline-block;margin: 0 1rem ;" xml:space="preserve">
<g>
<g>
<g>
<path d="M391.502,210.725c-5.311-1.52-10.846,1.555-12.364,6.865c-1.519,5.31,1.555,10.846,6.864,12.364     C431.646,243.008,460,261.942,460,279.367c0,12.752-15.51,26.749-42.552,38.402c-29.752,12.82-71.958,22.2-118.891,26.425     l-40.963-0.555c-0.047,0-0.093-0.001-0.139-0.001c-5.46,0-9.922,4.389-9.996,9.865c-0.075,5.522,4.342,10.06,9.863,10.134     l41.479,0.562c0.046,0,0.091,0.001,0.136,0.001c0.297,0,0.593-0.013,0.888-0.039c49.196-4.386,93.779-14.339,125.538-28.024     C470.521,316.676,480,294.524,480,279.367C480,251.424,448.57,227.046,391.502,210.725z"/>
<path d="M96.879,199.333c-5.522,0-10,4.477-10,10c0,5.523,4.478,10,10,10H138v41.333H96.879c-5.522,0-10,4.477-10,10     s4.478,10,10,10H148c5.523,0,10-4.477,10-10V148c0-5.523-4.477-10-10-10H96.879c-5.522,0-10,4.477-10,10s4.478,10,10,10H138     v41.333H96.879z"/>
<path d="M188.879,280.667h61.334c5.522,0,10-4.477,10-10v-61.333c0-5.523-4.477-10-10-10h-51.334V158H240c5.523,0,10-4.477,10-10     s-4.477-10-10-10h-51.121c-5.523,0-10,4.477-10,10v122.667C178.879,276.19,183.356,280.667,188.879,280.667z M198.879,219.333     h41.334v41.333h-41.334V219.333z"/>
<path d="M291.121,280.667h61.334c5.522,0,10-4.477,10-10V148c0-5.523-4.478-10-10-10h-61.334c-5.522,0-10,4.477-10,10v122.667     C281.121,276.19,285.599,280.667,291.121,280.667z M301.121,158h41.334v102.667h-41.334V158z"/>
<path d="M182.857,305.537c-3.567-4.216-9.877-4.743-14.093-1.176c-4.217,3.567-4.743,9.876-1.177,14.093l22.366,26.44     c-47.196-3.599-89.941-12.249-121.37-24.65C37.708,308.06,20,293.162,20,279.367c0-16.018,23.736-33.28,63.493-46.176     c5.254-1.704,8.131-7.344,6.427-12.598c-1.703-5.253-7.345-8.13-12.597-6.427c-23.129,7.502-41.47,16.427-54.515,26.526     C7.674,252.412,0,265.423,0,279.367c0,23.104,21.178,43.671,61.242,59.48c32.564,12.849,76.227,21.869,124.226,25.758     l-19.944,22.104c-3.7,4.1-3.376,10.424,0.725,14.123c1.912,1.726,4.308,2.576,6.696,2.576c2.731,0,5.453-1.113,7.427-3.301     l36.387-40.325c1.658-1.837,2.576-4.224,2.576-6.699v-0.764c0-2.365-0.838-4.653-2.365-6.458L182.857,305.537z"/>
<path d="M381.414,137.486h40.879c5.522,0,10-4.477,10-10V86.592c0-5.523-4.478-10-10-10h-40.879c-5.522,0-10,4.477-10,10v40.894     C371.414,133.009,375.892,137.486,381.414,137.486z M391.414,96.592h20.879v20.894h-20.879V96.592z"/>
</g>
</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>{{__('home.tour')}} </a></p>
                </div>-->
                  
                  
                  <a class="openVideo btn w-full block text-center py-8 mt-8 font-bold"
                  style="    text-transform: initial!important ;"> {{__('home.prop_video')}}  </a>
                <div class="contactDetails p-8 my-12">
                    
                    
                  <!-- Property Contact -->
                  <ul class="propertyContact"> 
                    <h3 class="title font-bold mb-12 pb-12"> Contact</h3>
                       <li> <a target="_blank" href="tel:+043332707"><i class="fas fa-phone-alt mr-4"> </i>  04 (333) 2707</a>
                                        </li>
                                    <li> <a target="_blank" href="tel:+971507730725"><i class="fas fa-mobile mr-4"> </i> 
                                       
                                        +971 50 773 0725</a></li>
                                    <li> <a target="_blank" href="https://www.google.com/maps?ll=25.097085,55.168857&amp;z=14&amp;t=m&amp;hl=en&amp;gl=US&amp;mapclient=embed&amp;cid=10790270137269840158"><i class="fas fa-map-marker-alt mr-4"></i>The Greens - Onyx Tower 1 - Dubai</a></li>
                                    <li> <a target="_blank" href="mailto: abc@example.com" style="text-transform: lowercase!important;"><i class="far fa-envelope mr-4"></i> sales@masterpiece.realestate</a></li>
<!--                                  
                  </ul>
                  <!-- Request Inquiry-->
                  <h3 class="title font-bold my-12 pb-12">{{__('home.req_inquiry')}}</h3>
                  <div class="formPreporty">
                   @include('shared/contact-form')
                </div>
                <!-- Recent Properties-->
<!--                <div class="RecentProperties">
                  <h3 class="title font-bold mb-12 pb-2">{{__('home.recent_props')}}</h3>
                  <ul> 
                     property
                    <li> <a class="flex items-center text-overflow mb-8 pb-8" href="#!"> 
                        <div class="PropertiesImage w-40"><img src="{{url('public')}}/dist/assets/img/item1.jpg" alt="" srcset=""></div>
                        <div class="PropertiesDetails p-4">
                          <h3 class="title font-bold"> Family Home</h3>
                          <h3>AED 230,000</h3>
                        </div></a></li>
                     property
                    <li> <a class="flex items-center text-overflow mb-8 pb-8" href="#!"> 
                        <div class="PropertiesImage w-40"><img src="{{url('public')}}/dist/assets/img/item2.jpg" alt="" srcset=""></div>
                        <div class="PropertiesDetails p-4">
                          <h3 class="title font-bold"> Family Home</h3>
                          <h3>AED 230,000</h3>
                        </div></a></li>
                     property
                    <li> <a class="flex items-center text-overflow mb-8 pb-8" href="#!"> 
                        <div class="PropertiesImage w-40"><img src="{{url('public')}}/dist/assets/img/item3.jpg" alt="" srcset=""></div>
                        <div class="PropertiesDetails p-4">
                          <h3 class="title font-bold"> Family Home</h3>
                          <h3>AED 230,000</h3>
                        </div></a></li>
                     property
                    <li> <a class="flex items-center text-overflow mb-8 pb-8" href="#!"> 
                        <div class="PropertiesImage w-40"><img src="{{url('public')}}/dist/assets/img/item4.jpg" alt="" srcset=""></div>
                        <div class="PropertiesDetails p-4">
                          <h3 class="title font-bold"> Family Home</h3>
                          <h3>AED 230,000</h3>
                        </div></a></li>
                  </ul>
                </div>
                <div class="RecentProperties mt-24"> 
                  <h3 class="title font-bold mb-12 pb-2">Similer Properties</h3>
                  <ul> 
                     property
                    <li> <a class="flex items-center text-overflow mb-8 pb-8" href="#!"> 
                        <div class="PropertiesImage w-40"><img src="{{url('public')}}/dist/assets/img/item1.jpg" alt="" srcset=""></div>
                        <div class="PropertiesDetails p-4">
                          <h3 class="title font-bold"> Family Home</h3>
                          <h3>AED 230,000</h3>
                        </div></a></li>
                     property
                    <li> <a class="flex items-center text-overflow mb-8 pb-8" href="#!"> 
                        <div class="PropertiesImage w-40"><img src="{{url('public')}}/dist/assets/img/item2.jpg" alt="" srcset=""></div>
                        <div class="PropertiesDetails p-4">
                          <h3 class="title font-bold"> Family Home</h3>
                          <h3>AED 230,000</h3>
                        </div></a></li>
                     property
                    <li> <a class="flex items-center text-overflow mb-8 pb-8" href="#!"> 
                        <div class="PropertiesImage w-40"><img src="{{url('public')}}/dist/assets/img/item3.jpg" alt="" srcset=""></div>
                        <div class="PropertiesDetails p-4">
                          <h3 class="title font-bold"> Family Home</h3>
                          <h3>AED 230,000</h3>
                        </div></a></li>
                     property
                    <li> <a class="flex items-center text-overflow mb-8 pb-8" href="#!"> 
                        <div class="PropertiesImage w-40"><img src="{{url('public')}}/dist/assets/img/item4.jpg" alt="" srcset=""></div>
                        <div class="PropertiesDetails p-4">
                          <h3 class="title font-bold"> Family Home</h3>
                          <h3>AED 230,000</h3>
                        </div></a></li>
                  </ul>
                </div>-->
              </div>
            </div>
          </div>
        </div>
      </section>
         <!-- PROPERTY FOR SALE                                  -->
            <section class="property mb-32">
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
                                    <div class="flex w-full items-center justify-end Currency"><span class="mr-2 w-48 md:w-auto">  {{__('home.currency')}}:  </span>
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
                                    <div class="flex w-full items-center justify-end Area"><span class="mr-2 w-48 md:w-auto">  {{__('home.area')}}: </span>
                                        <div class="check p-4 relative overflow-hidden px-8 checkIsActive" >
                                            <input type="radio" name="Area"  id="mtr-radio3">
                                            <label for=""> {{__('home.sqm')}}</label>
                                        </div>
                                        <div class="check p-4 relative overflow-hidden px-8">
                                            <input type="radio" name="Area"  id="ft-radio3">
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

                                <td>   <div class=" property-for-sale-holder animate"> </div></td>
                                <td>   <div class=" property-for-sale-holder animate"> </div></td>
                                <td>   <div class=" property-for-sale-holder animate"> </div></td>
                                <td>   <div class=" property-for-sale-holder animate"> </div></td>



                            </table>





                        </div>
                    </div>
                </div>
            </section>
      <div class="overlay_PropertyVideo fixed"></div>
      <section class="PropertyVideo fixed">
        <video class="rounded-3xl w-full" controls loop autoplay muted><source src="{{$p->video()}}" type="video/mp4"> </video>
      </section>
      
      
      

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


          




                
                
                _http("GET", server + "properties?target=sell", "", function (
                        res) {

                    console.log(res);
                    var data = JSON.parse(res).data;
                    var step = 0;
                    var t = "";
                    $('#g76').html();
                    for (var i = 0; i < data.length; i++) {
                        t += '<div class="p-10">' + buildPropertyCard(data[i]) + '</div>';

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
                    console.log("refreshed");
                });
            </script>
        </div>
    </body>
</html>