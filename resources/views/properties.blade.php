<!DOCTYPE html>
<!-- Start HTML-->
<html>
    <!-- Start head-->
    <?php $name_pref = 'name_' . Illuminate\Support\Facades\App::getLocale(); ?>
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
.bitrix {
    background-color: #f9f9f9;
    padding: 2rem;
    margin-bottom: 1rem;
}
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

       


            <section class="mt-16" id="propertyForRent">
                <div class="container mx-auto"> 
                    <!-- Address-->
                    <div class="address pl-0">
                        <div class="row flex items-center mb-12 flex-wrap ">
                            <h3 class="font-bold title yellowColor flex w-full"> {{__('home.all_properties')}}	  </h3>
                            <p>{{__('home.advanced_search')}}
                            <div class="btn openFilter"> <i class="fas fa-filter mr-4"></i>{{__('home.filter')}} </div>
                            </p>
                         
                        </div>
                        
                    </div>
                    
                    
                    
                    <div class="row items-start  flex  flex-wrap justify-center">
                        <div class="w-full md:w-4/12 xl:w-3/12 xl:pr-12">
                            <!--  filter   -->
                      
   <?= isset($_GET['developer'])?"<br /><strong>".$_GET['developer']."</strong>":""?>
                            <div class="relative" id="filter">
                                <div class="overlay"> </div>
                                <div class="closeFilter">  X</div>
                                <div class="logoFilter"><img src="dist/assets/img/logo.png" alt=""></div>
                                <form action="" method="post"> 
                                    <div class="row flex flex-col"> 
                                         <form>    <!-- TYPE OF PROPERTY -->
                                        <div class="flex items-center flex-wrap w-full justify-start md:justify-start mt-6">
                                           
                                            <div class="items-center mr-4 mb-8 md:mb-5">

 
                            <input type="hidden" id="min-area-m" value="20" />
                            <input type="hidden" id="max-area-m" value="3000" />
                            <input type="hidden" id="min-area-ft" value="200" />
                            <input type="hidden" id="max-area-ft" value="30000" />
                            <input type="hidden" id="min-price-usd" value="500" />
                            <input type="hidden" id="max-price-usd" value="1400000" />
                            <input type="hidden" id="min-price-aed" value="5000" />
                            <input type="hidden" id="max-price-aed" value="50000000" />
                            <input type="hidden" id="min-price-euro" value="500" />
                            <input type="hidden" id="max-price-euro" value="1400000" />
                            <input type="hidden" id="developer-in" value="<?= isset($_GET['developer'])?$_GET['developer']:""?>" />
                            <input type="hidden" id="term" value="<?= isset($_GET['term'])?$_GET['term']:""?>" />



                                        <div class="w-full p-4 pl-0">   
                                            <h3 class="font-bold title yellowColor flex w-full">{{__('home.prop_type')}}</h3> 
                                            <select class="w-full" id="p-type-selector" onchange="initPTypeSliders();search();">
                                                  <option value="sell" data-display="{{__('home.buy')}}" 
                                                          <?=isset($_GET['target'])&&$_GET['target']=='sell'?"selected":""?>
                                                          
                                                          >{{__('home.buy')}} </option>
                                                <option  value="rent" 
                                                             <?=isset($_GET['target'])&&$_GET['target']=='rent'?"selected":""?>
                                                         >{{__('home.rent')}}  </option>
                                              
                                            </select>
                                        </div>

                            
                             
                            
                            
                                        <!-- Property LOCATION   -->
                                        <div class="w-full p-4 pl-0">   
                                            <h3 class="font-bold title yellowColor flex w-full">{{__('home.prop_location')}}</h3>
                                            
                                              <select class="w-full select2-single-clients " id="prop-location"  onchange="resetSearch()">
                                                  <?php if(isset($_GET['location'])){ ?>
                                                     <option value="<?=$_GET['location']?>">{{$_GET['location']}}</option>
                                                  <?php }else{ ?>
                                                  <option value="-1">All locations</option>
                                                  <?php } ?>
                                              </select>
                                            
                                            
                                        </div>

                                            <div class="w-full p-4 pl-0">    
                                            <h3 class="font-bold title yellowColor flex w-full">{{__('home.prop_class')}}</h3>
                                            <?php foreach (App\Models\Property::select(['p_level'])->groupBy('p_level')->orderBy('p_level')->get() as $cat) { ?> 
                                            
                                            <label class="checkbox my-4"> {{$cat->p_level()}}
                                                <input type="checkbox" class="prop-class" <?=isset($_GET['class'])&&$_GET['class']==$cat->p_level?"checked":""?> 
                                                       value="{{$cat->p_level}}"  onchange="resetSearch()">
                                                <div class="checkmark"></div>
                                            </label>
                                            
                                            <?php } ?>
<!--                                            <label class="checkbox my-4"> {{__('home.luxury')}}
                                                <input type="checkbox" class="prop-class"  value="2"  onchange="resetSearch()">
                                                <div class="checkmark"></div>
                                            </label>
                                            <label class="checkbox my-4"> {{__('home.ultra_luxury')}}
                                                <input type="checkbox" class="prop-class" value="3"  onchange="resetSearch()">
                                                <div class="checkmark"> </div>
                                            </label>-->
                                            
                                            
                                        </div>
                                        
                                       
                                        
                                        
                                                
                                          <div class="w-full p-4 pl-0">   
                                            <h3 class="font-bold title yellowColor flex w-full">{{__('home.bedrooms')}}</h3>
                                          
                                                <label class="checkbox my-4"> Studio
                                                    <input type="checkbox" class="prop-bedrooms" value="0"  onchange="resetSearch()"
                                                            <?=isset($_GET['bedrooms'])&&$_GET['bedrooms']== 0 ?"checked":""?>
                                                           >
                                                    <div class="checkmark"></div>
                                                </label>
                                        
                                                 <label class="checkbox my-4"> 1
                                                    <input type="checkbox" class="prop-bedrooms" value="1"  onchange="resetSearch()"
                                                            <?=isset($_GET['bedrooms'])&&$_GET['bedrooms']== 1 ?"checked":""?>
                                                           >
                                                    <div class="checkmark"></div>
                                                </label>
                                        
                                                 <label class="checkbox my-4"> 2
                                                    <input type="checkbox" class="prop-bedrooms" value="2"  onchange="resetSearch()"
                                                            <?=isset($_GET['bedrooms'])&&$_GET['bedrooms']== 2 ?"checked":""?>
                                                           >
                                                    <div class="checkmark"></div>
                                                </label>
                                        
                                                 <label class="checkbox my-4"> +3
                                                    <input type="checkbox" class="prop-bedrooms" value="+3"  onchange="resetSearch()"
                                                            <?=isset($_GET['bedrooms'])&&$_GET['bedrooms']>=3 ?"checked":""?>
                                                           >
                                                    <div class="checkmark"></div>
                                                </label>
                                        


                                        </div>    
                                        
                                        
                                        
                                        
                                            <!-- Property Types-->
                                        <div class="w-full p-4 pl-0">   
                                            <h3 class="font-bold title yellowColor flex w-full">{{__('home.prop_category')}}</h3>
                                            <?php foreach (App\Models\Category::get() as $cat) { ?>
                                                <label class="checkbox my-4"> {{$cat->$name_pref}}
                                                    <input type="checkbox" class="prop-category" value="{{$cat->id}}"  onchange="resetSearch()"
                                                            <?=isset($_GET['category'])&&$_GET['category']==$cat->id?"checked":""?>
                                                           >
                                                    <div class="checkmark"></div>
                                                </label>
                                            <?php } ?>


                                        </div>
                                        
                                        
                                             
                                        
                                        
                                            <div class='bitrix'>
                                                <div class="Select Area"> 
                                                    <div class="flex w-full items-center  Area flex justify-between">
                                                        <span class="mr-2 ">  <b>{{__('home.area')}} : </b> </span> 
                                                        <div class="flex"> 
                                                            <div class="check p-4 relative overflow-hidden  ml-2 px-8 " >
                                                            <input type="radio" name="Area"  id="mtr-radio2" >
                                                            <label for=""> {{__('home.sqm')}}</label>
                                                        </div>
                                                        <div class="check p-4 relative overflow-hidden ml-0 px-8 checkIsActive">
                                                            <input type="radio" name="Area"  id="ft-radio2"  checked >
                                                            <label for=""> {{__('home.sqf')}}</label>
                                                        </div><!-- comment -->
                                                        </div>
                                                    </div>
                                                </div>

                                        
                                        
                                              <div class="w-full mt-10 mb-16 p-4 pl-0">
                                            <div class="js-example-class" id="area-range"></div> </div>
                                            </div>
                                        
                                        
                                                   <div class='bitrix'>
                                        <div class="flex items-center flex-wrap w-full">
                                            <div class="items-center  mb-8 ">
                                                <div class="Select"> 
                                                    <div class="flex flex-wrap Currency text-center justify-between">
                                                        <!-- filter by Currency-->
                                                        <div class="flex items-center justify-end Currency">
                                                            <span class="mr-1 w-48 md:w-auto"> <b> {{__('home.price_range')}} : </b>
                                                            </span></div>
                                                        <div class="flex"> 

                                                        <div class="check p-4 relative overflow-hidden px-8 checkIsActive" >
                                                            <input type="radio" class="Currency" id="aed-radio1"  checked  >
                                                            <label for=""> {{__('home.aed')}}</label>
                                                        </div>
                                                        <div class="check p-4 relative overflow-hidden px-8">
                                                            <input type="radio" class="Currency" id="usd-radio1"  >
                                                            <label for=""> {{__('home.usd')}}</label>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                        <!-- Price-->
                                      
                                        <div class="w-full mt-8 mb-16 p-4 pl-0">
                                            <div class="js-example-class" id="prices-range"></div></div>
                                            
                                            
                                                
                                            </div>
                                        </div>
                                             </div>
                                            
                                            
                                            
                                            
                                            
                                        

                                            </div>
                                        </div>
                                  
                                    
                                     
                                   



                                            
                                        <div class="p-4 pl-0 flex items-center w-full mt-12">
                                            <button type="reset" class="btn " name="filter">
                                                {{__('home.reset')}}  </button>
                                        </div>
                                         </form>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="w-full md:w-8/12  xl:w-9/12 flex flex-wrap" id="main-core">


                            

                        </div>
                        <div id="loading-shimmer" class="w-full md:w-8/12  xl:w-9/12 flex flex-wrap">
                            
                  
                        </div>
                        <div class="w-full w-full" style="min-height: 30px" id="load-more-btn"> 
                            <div aria-label="Page navigation" class="navigation mt-12"> 
                                <button   onclick="search();" class="btn btn-danger" style="cursor: pointer;float: right;margin: 8px;">Load more</button></div>
                        </div>
                           
                    </div>
                    
                    
                    
                    
                    
                </div>
                 <hr />
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
            <!-- GET IN TOUCH WITH US-->
            <section class="touch my-32">
                <div class="container px-4 mx-auto"> 
                    <h3 class="title p-4 font-bold"> GET IN TOUCH WITH US</h3>
                    <div class="row flex flex-wrap items-center">
                        <div class="w-full md:w-2/3">
                           @include('shared/contact-form')
                        </div>
                        <div class="w-full md:w-1/3">
                            <div class="TouchImage p-4"><img src="{{url('public')}}/dist/assets/img/item2.jpg" alt="" srcset=""></div>
                        </div>
                    </div>
                </div>
            </section>



            @include('shared/footer')
            @include('shared/scripts')
              <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script>
                var shimmer_card = ' <div class="p-10 w-full xl:w-1/3"> <div class="card "> <div class="card__Image h-96 relative overflow-hidden"><div class="max-h-full max-h-full h-full w-full object-cover animate" ></div></div><div class="card__Details "> <div class="title font-bold card__Details__title flex items-center mt-6 " style="min-height: 35px;background-color: #e9e9e9;"> </div><ul class="card__Details__feature flex my-6 mt-2" style="background-color: #e9e9e9;min-height: 35px;"> </ul></div><div class="card__location pt-6" style="border-top: 0.2rem solid #ccc;"> <ul class="flex items-center" style="background-color: #e9e9e9;color : #e9e9e9"> <li class="grow flex items-center flex-wrap place-content-end w-4/6 text-right " style="background-color: #e9e9e9;min-height: 35px;"> </li></ul> </div></div></div>';

                function loadShimmer() {
                    $('#loading-shimmer').show();
//                    var x = 6;
//                    while (x-- > 0)
//                        $('#main-core').append(shimmer_card);

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
                      resetSearch();

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
                      resetSearch();

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
                        resetSearch();

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
                        resetSearch();

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
                       resetSearch();

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
                        resetSearch();

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
                    
                    $('.Currency input[type="radio"]').attr('checked' ,false);
                    $(this).attr('checked' ,true);
                    
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


//                function buildPropertyCard(d) {
//
//var url = '{{url("property")}}' + '/' + d.id;
//                    return '<div class="p-10 w-full md:w-1/2 xl:w-1/3"> <div class="card"> <a href="'+url+'"> \n\
//<div class="card__Image h-96 relative overflow-hidden"><img class="max-h-full max-h-full h-full w-full object-cover" \n\
//src="' + d.image + '" alt="" srcset=""> <span class="absolute top-4 left-0 Type p-4 py-2">' + (d.rent_or_sell ==
//                            "rent" ? "{{__('home.for_rent')}}" : "{{__('home.for_sell')}}") + '</span>\n\
// <span class="absolute top-4 right-0 Type launch p-4 py-2 Launched">Launched</span> </div></a> <div class="card__Details"><a href="#">\n\
// <h3 class="title font-bold card__Details__title flex items-center mt-6"><span class="grow text-overflow w-full">' +
//                            d.name + '</span>\n\
// <span class="grow w-full text-right price price-aed">{{__('home.aed')}} ' + d.price_aed + ' </span><span class="grow w-full text-right price price-usd hidden"  >$ '
//                    + d.price_usd + ' </span>  </h3> <ul class="card__Details__feature flex my-6 mt-2"> <li class="grow w-1/3 text-left">\n\
// <i class="fas fa-bed mr-2"> </i><span>{{__('home.no_beds')}}: '
//                    + d.no_bedrooms + '</span></li><li class="grow w-1/3 text-center"> <i class="fas fa-bath mr-2"> </i><span>{{__('home.no_baths')}}: ' + d.no_bathrooms +
//                    '</span></li><li class="grow w-1/3\n\
// text-right"> <i class="fas fa-chart-area mr-2"> </i><span class="area-m">{{__('home.area')}}: '
//                    + d.area_m + 'm</span><span class="area-ft hidden">{{__('home.area')}}: '
//                    + d.area_ft + 'sqft</span></li></ul></a></div><div class="card__location pt-6"> <ul class="flex items-center"> \n\
//<li class="grow text-overflow w-2/6"> <a href="#"> <i class="fas fa-map-marker-alt mr-2"> </i><span>' + d.location + '</span></a></li><li \n\
//class="grow flex items-center flex-wrap place-content-end w-4/6 text-right "><a href="whatsapp://send?abid=0971520000000&amp;amp;text=Hello%2C%20World!"> \n\
//<div class="whatsapp"> <i class="fab fa-whatsapp"></i></div></a> <a class="btn ml-4 px-8" href="'+url+'"> {{__('home.view')}}<i class="fas fa-arrow-right ml-4"> \n\
//</i></a> </li></ul> </div></div></div>';
//
//
//
//
//
//                }


start = 0;



function resetSearch(){
 $('#main-core').html("");
    start = 0;
    search();
      window.scrollTo({top: 0, behavior: 'smooth'});
    
    }

                function search() {
                    $('#load-more-btn').show();
                    
                    //   $('#main-core').animate({ scrollTop: 0 }, 'slow');
                    var filter = "?session=2006";
                    if (currency == "aed") {
                        filter += "&min_price_aed=" + $('#min-price-aed').val();
                        filter += "&max_price_aed=" + $('#max-price-aed').val();
                    }
                    if (currency == "usd") {
                        filter += "&min_price_usd=" + $('#min-price-usd').val();
                        filter += "&max_price_usd=" + $('#max-price-usd').val();
                    }
                    if (currency == "euro") {
                        filter += "&min_price_euro=" + $('#min-price-euro').val();
                        filter += "&max_price_euro=" + $('#max-price-euro').val();
                    }
                    if (document.getElementById('ft-radio2').checked) {
                        filter += "&min_area_ft=" + $('#min-area-ft').val();
                        filter += "&max_area_ft=" + $('#max-area-ft').val();
                    } else {
                        filter += "&min_area_m=" + $('#min-area-m').val();
                        filter += "&max_area_m=" + $('#max-area-m').val();
                    }
                    $('.prop-class:checkbox:checked').each(function () {
                        filter += "&class[]=" + $(this).val();

                    });
                    $('.prop-category:checkbox:checked').each(function () {
                        filter += "&category[]=" + $(this).val();

                    });
                    $('.prop-bedrooms:checkbox:checked').each(function () {
                        filter += "&bedrooms[]=" + $(this).val();

                    });
                    if($('#prop-location').val()!='-1')
                    filter += "&location=" + $('#prop-location').val();
                    filter += "&type=" + $('#p-type-selector').val();
                    if($('#developer-in').val()!=""){
                       filter += "&developer=" + $('#developer-in').val();  
                    }
                      if($('#term').val()!=""){
                       filter += "&term=" + $('#term').val();  
                    }
                    filter+="&start=" + start;



                    console.log(filter);
                 //   $('#main-core').html("");
                 
                         $('#main-core').append('<div id="mkloader" style="text-align: center;width: 100%;">\n\
       <h1 style="    font-size: 4rem;margin: 2rem;">Loading</h1>\n\
<p>Please wait</p></div>');     
                     console.log("refreshed not found");




                    _http("GET", server + "properties" + filter, "", function (
                            res) {
  //  console.log("rr" + res);
   // $('#loading-shimmer').hide();
   document.getElementById("mkloader").remove();
                        var data = JSON.parse(res).data;
                        var step = 0;
                        var t = "";
                      
                        if(data.length>0){
                        for (var i = 0; i < data.length; i++) {
                            //     t += '<div class="p-10 w-full xl:w-1/3">' + buildPropertyCard(data[i]) + '</div>';
                            $('#main-core').append('<div class="p-10 w-full xl:w-1/3">' + buildPropertyCard(data[i]) + '</div>')
                            // t += buildPropertyCard(data[i]);

                        }
                        if(data.length<12){
               $('#load-more-btn').hide();            
            }
                        start+=12;

                     //   console.log("refreshed");
                    }else{
                        
         
       
                   $('#main-core').html('<div style="text-align: center;width: 100%;">\n\
       <h1 style="    font-size: 4rem;margin: 2rem;">No items found !</h1>\n\
<p>Please change your search creteria to find better results</p></div>');     
                     console.log("refreshed not found");
         
         
        }
      

//------------------------
//
  if (document.getElementById('mtr-radio2').checked) {

                            $('.area-m').show();
                            $('.area-ft').hide();
                        } else {
                            $('.area-m').hide();
                            $('.area-ft').show();
                        }
//
//------------------------
                        if (document.getElementById('usd-radio1').checked) {

                        $('.price-usd').show();
                        $('.price-aed').hide();
                        } else {
                        $('.price-usd').hide();
                        $('.price-aed').show();
                        }


                     //   $('#main-core').append('');
                    });







                }





               
                search();
                
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

                                // Query parameters will be ?search=[term]&page=[page]
                                return query;
                            }
                        }
                    });
                _http("GET", server + "properties?target=sell", "", function (
                        res) {

                
                    var data = JSON.parse(res).data;
                    var step = 0;
                    var t = "";
                    $('#g76').html();
                    if(data.length>0){
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
                }else{
                   $('#g76').html('<div><h1>No items found !</h1><p>Please change your search creteria to find better results</p></div>');     
                     console.log("refreshed not found");
                 }
                    //    $('#g76').slick('refresh');
                    console.log("refreshed");
                });
            </script>
        </div>
    </body>
</html>