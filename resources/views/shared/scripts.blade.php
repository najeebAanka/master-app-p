<!-- Jquery  -->
<script>var loading = 0;</script>



<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{url('')}}/public/dist/assets/script/intlTelInput.js"></script>


<!--  Backend Script-->
<script>
    var server = "{{ url('api/v1/') }}/";
    function changeLang(caller) {
        window.location.href = '{{url('language')}}/' + caller.value;
    }


 var inputs = document.querySelectorAll('input[type="tel"]');
//  window.intlTelInput(input, {
//    // any initialisation options go here
//    
//    
//    
//  });
//  
//  

inputs.forEach(function(userItem) {
  intlTelInput(userItem, {
      initialCountry: "ae",
  customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
      updatePhonePlaceHolder(selectedCountryPlaceholder ,userItem);
    return "+" +selectedCountryData.dialCode;
  }
  ,utilsScript: "{{url('')}}/public/dist/assets/script/utils.js"
} 
 // just for formatting/placeholders etc);  
); 
});

function updatePhonePlaceHolder(data , input){
    input.parentElement.parentElement.getElementsByClassName('phone-ph')[0].placeholder = data;
  

}

    function _http(e, t, n, r) {
        var o = new XMLHttpRequest();
        (o.onreadystatechange = function () {

            o.readyState == XMLHttpRequest.DONE && (200 == o.status ? r(o.responseText) : console.log("Something else other than 200 was returned " + o.responseText));

        }),
                o.open(e, t, !0),
                o.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr("content")),
                o.setRequestHeader("Accept", "application/json"),
                o.setRequestHeader("Locale", "{{Illuminate\Support\Facades\App::getLocale()}}"),
                o.setRequestHeader("Content-type", "application/x-www-form-urlencoded"),
                o.setRequestHeader("X-Requested-With", "XMLHttpRequest"),
                //  o.setRequestHeader("Authorization", "Bearer " + _r9("_gz")),
                        (loading = !0),
                        o.send(e == "GET" ? "" : n);
            }

            function fillAreasInNav() {
                var x = $.cookie("areas506");
                var str = "";
                if (x != null) {
                    x = JSON.parse(x);
                    for (var i = 0; i < x.length; i++)
                        str += '<a href="{{url('properties')}}"> ' + x[i].name + ' </a>';
                }
                $('#areas-nav-dropdown').html(str);
                $('#areas-nav-dropdown2').html(str);
            }
            function fillServicesInNav() {
//                var x = $.cookie("services506");
//
//                var str = "", str2 = "";
//                $('#footer-services-ul1').html("");
//                $('#footer-services-ul2').html("");
//                if (x != null) {
//                    x = JSON.parse(x);
//                    for (var i = 0; i < x.length; i++)
//                    {
//                var url = '{{url('service')}}/'+x[i].id+'';        
//                
//                if (i < 6)
//                        str += '<a href="'+url+'"> ' + x[i].name + ' </a>';
//                        if (i < 6)
//                            $('#footer-services-ul1').append('<li> <a href="'+url+'">' + x[i].name + '</a></li>');
//                        else if (i < 12)
//                              $('#footer-services-ul2').append('<li> <a href="'+url+'">' + x[i].name + '</a></li>');
//                    }
//                }
                $('#services-nav-dropdown').html($('#services-nav-dropdown').html() + '<li> <a href="{{\Illuminate\Support\Facades\Route::currentRouteName()=='home'?'#services-section':url('').'#services-section'}}"> All services</a></li>');
                $('#services-nav-dropdown2').html( $('#services-nav-dropdown2').html() +  '<li> <a href="{{\Illuminate\Support\Facades\Route::currentRouteName()=='home'?'#services-section':url('').'#services-section'}}"> All services</a></li>');
            }
            function fillDevsInNav() {
                var x = $.cookie("devs506");

                var str = "";
                if (x != null) {
                    x = JSON.parse(x);
                    for (var i = 0; i < x.length; i++)
                        str += '<a href="{{url('projects')}}"> ' + x[i].name + ' </a>';
                }
                $('#devs-nav-dropdown').html(str);
                $('#devs-nav-dropdown2').html(str);
            }

  fillAreasInNav();
                fillServicesInNav();
                fillDevsInNav();
                
//                     $(function () {
//                    $(".LogoSpan").hover(
//                            function () {
//                                $('.LogoSpan img').attr("src", "{{url('public')}}/dist/assets/img/logo.gif");
//                            },
//                            function () {
//                                $('.LogoSpan img').attr("src", "{{url('public')}}/dist/assets/img/logo.svg");
//                            }
//                    );
//                });
                
                
                
                         
                function buildPropertyCard(d) {
                     var url = '{{url("property")}}' + '/' + d.id;
                return ' <div class="card"> <a href="' + url + '">\n\
     <div class="card__Image h-96 relative overflow-hidden"><span class="font-bold grow w-full text-right price price-aed">{{__('home.aed')}} ' + d.price_aed + ' </span>\n\
<span class="font-bold grow w-full text-right price price-usd hidden"  >$ '
                        + d.price_usd + ' </span><img class="max-h-full max-h-full h-full w-full object-cover" \n\
src="' + d.image + '" alt="" srcset=""> <span class="absolute top-4 left-0 Type p-4 py-2">' + (d.rent_or_sell ==
                        "rent" ? "{{__('home.for_rent')}}" : "{{__('home.for_sell')}}") + ' </span> \n\
<span class="absolute top-4 right-0 Type launch p-4 py-2 New Launch">'
                        + d.launch + '</span> </div></a> <div class="card__Details"><a href' + url + '"> \n\
<h3 class="h-28 title font-bold card__Details__title flex items-center mt-6"><span class="grow text-overflow w-full">' +
                        d.name + '</span> \n\
 </h3>\n\
 <ul class="card__Details__feature flex my-6 mt-2"> \n\
<li class="grow w-1/3 text-left"> <i class="fas fa-bed mr-2"> </i><span> '
                        + d.no_bedrooms + '</span></li><li class="grow w-1/3 text-center"> \n\
<i class="fas fa-bath mr-2"> </i><span> ' + d.no_bathrooms +
                        '</span></li><li class="grow w-1/3 text-right"> <i class="fas fa-chart-area mr-2"> </i><span class="area-m hidden">'
                        + d.area_m + 'm</span><span class="area-ft "> '
                        + d.area_ft + 'sqft</span></li></ul></a></div>\n\
<div class="card__location pt-6"> <ul class="flex items-center"> <li class="grow  w-4/6"> <a href="' + url + '"> <i class="fas fa-map-marker-alt mr-2"> \n\
</i><span>' + d.location + '</span></a></li><li class="grow flex items-center flex-wrap place-content-end w-2/6 text-right ">\n\
<a href="whatsapp://send?abid=0971520000000&amp;amp;text=Hello%2C%20World!"> <div class="whatsapp"> <i class="fab fa-whatsapp"></i></div>\n\
</a> <a class="btn ml-4 px-8" style="padding :  1rem;height : 3rem" href="' + url + '"> <i style="display : flex" class="fas fa-arrow-right "> </i></a> </li></ul> \n\
</div></div>';
                }

                
</script>



<!--<script type="text/javascript">
var _iub = _iub || [];
_iub.csConfiguration = {"consentOnContinuedBrowsing":false,"floatingPreferencesButtonDisplay":"bottom-right","lang":"en","whitelabel":false,"cookiePolicyId":77488647,"siteId":2587841, "banner":{ "acceptButtonDisplay":true,"closeButtonDisplay":false,"customizeButtonDisplay":true,"explicitWithdrawal":true,"position":"bottom" }};
</script>
<script type="text/javascript" src="//cdn.iubenda.com/cs/iubenda_cs.js" charset="UTF-8" async></script>


-->


<!-- Slick ( Slide )-->
<script src="{{url('')}}/public/dist/assets/script/al-range-slider.js"></script>

<!--  Main Script-->
<script src="{{url('')}}/public/dist/assets/script/index.js"></script>
<script src="{{url('')}}/public/dist/assets/script/backend.js"></script>