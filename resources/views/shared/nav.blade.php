   <!-- Main Nav ( Nav top , Bottom Nav)-->
<?php
$lang = Illuminate\Support\Facades\App::getLocale();
$services = \App\Models\ServiceItem::get(); ?>   
   <nav class="fixed w-full md:block">
        <!--         Nav top-->
        <section class="navTop">
          <div class="container mx-auto">
            <div class="row flex flex-wrap">
              <div class="w-1/2">
                <!-- Social Media-->
                <ul class="socialMedia p-0 list-none flex flex-wrap py-4">
                  <li class="px-4">
                    <a target="_blank" href="https://twitter.com/masterpiecedxb">
                      <i class="fab fa-twitter"></i>
                    </a>
                  </li>
                  <li class="px-4">
                    <a target="_blank" href="https://www.instagram.com/masterpiecerealestatedubai/">
                      <i class="fab fa-instagram"></i>
                    </a>
                  </li>
                  <li class="px-4">
                    <a target="_blank" href="https://www.linkedin.com/company/masterpiecerealestatedubai/">
                      <i class="fab fa-linkedin"></i>
                    </a>
                  </li>
                  <li class="px-4">
                    <a target="_blank" href="https://www.tiktok.com/@masterpiece_real_estate">
                      <i class="fab fa-tiktok"></i>
                    </a>
                  </li>
                  <li class="px-4">
                    <a target="_blank" href="https://www.facebook.com/masterpiecerealestatedubai">
                      <i class="fab fa-facebook"></i>
                    </a>
                  </li>
                </ul>
              </div>
              <!-- contact -->
              <div class="w-1/2">
                <ul class="socialMedia p-0 list-none flex flex-wrap justify-end py-4">
                  <li class="px-4">
                    <a href="mailto:sales@masterpiece.realestate" target="_blank">
                      <i class="far fa-envelope"></i>
                    </a>
                  </li>
                  <li class="px-4">
                    <a target="_blank" href="whatsapp://send?abid=+971507730725&amp;text=Hello%2C%20Masterpiece!">
                      <i class="fab fa-whatsapp"></i>
                    </a>
                  </li>
                  <li class="px-4 ml-4">
                    <a href="tel:+97143332707">
                      <i class="fas fa-phone-alt"></i>
                      <span class="ml-4">+971 4 (333) 2707</span>
                      <span class="ml-4">
                    </a>
                    <a href="tel:+971507730725"> | </span>
                      <span class="ml-4">+971 50 773 0725</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>
        <!-- Bottom Nav-->
        <section class="navBottom my-8">
          <div class="container mx-auto relative">
            <div class="row flex flex-wrap items-center">
              <!-- Logo-->
              <div class="w-2/12">
                <ul class="p-0 list-none flex flex-wrap items-center">
                  <li class="px-4 pl-0 LogoSpan">
                    <a class="relative overflow-hidden" href="{{url('')}}">
                      <img class="h-auto w-full logo" src="{{url('')}}/public/dist/assets/img/logo.png" alt="" srcset="">
                    </a>
                  </li>
                </ul>
              </div>
              <!-- Links                     -->
              <div class="w-8/12">
                <ul class="p-0 list-none flex flex-wrap items-center text-center justify-between">
                  <li class="px-4">
                    <div class="dropdown">
                      <a href="{{url('properties')}}?target=sell" class="dropbtn buyLink" for="btnControl">{{__('home.buy')}} </a>
                      <div class="dropdown-content">
                   <a href="{{url('properties')}}?class=Ultra-Luxury&target=sell"> {{__('home.ultra_luxury')}} </a>
                        <a href="{{url('properties')}}?class=Luxury&target=sell"> {{__('home.luxury')}} </a>
                        <a href="{{url('properties')}}?class=Affordable&target=sell"> {{__('home.affordable')}} </a>
                      </div>
                    </div>
                  </li>
                  <li class="px-4">
                    <a class="sellLink" href="{{url('sell')}}"> {{__('home.sell')}}</a>
                  </li>
<!--                  <li class="px-4">
                    <div class="dropdown">
                      <a href="{{url('properties')}}?target=rent" class="dropbtn rentLink" for="btnControl">{{__('home.rent')}} </a>
                      <div class="dropdown-content">
                        <a href="{{url('properties')}}?class=Ultra-Luxury&target=rent"> {{__('home.ultra_luxury')}} </a>
                        <a href="{{url('properties')}}?class=Luxury&target=rent"> {{__('home.luxury')}} </a>
                        <a href="{{url('properties')}}?class=Affordable&target=rent"> {{__('home.affordable')}} </a>
                      </div>
                    </div>
                  </li>-->
                  <li class="px-4">
                    <div class="dropdown">
                      <a href="{{url('areas')}}" class="dropbtn AreasLink" for="btnControl">{{__('home.areas')}} </a>
                      <div class="dropdown-content" id="areas-nav-dropdown"></div>
                    </div>
                  </li>
                  <li class="px-4">
                    <a class="ProjectsLink" href="{{url('projects')}}"> {{__('home.projects')}}</a>
                  </li>
                  <li class="px-4">
                    <div class="dropdown">
                      <a href="{{url('developers')}}" class="dropbtn DevelopersLink" for="btnControl">{{__('home.developers')}} </a>
                      <div class="dropdown-content" id="devs-nav-dropdown"></div>
                    </div>
                  </li>
                  <li class="px-4">
                    <div class="dropdown">
                      <a href="#services-section" class="dropbtn" for="btnControl">{{__('home.services')}} </a>
                      <div class="dropdown-content" id="services-nav-dropdown">
                        <?php 
                        $c = 0;
                        foreach ($services as $s){
                            if($c++>5)break;
                              echo '<a href="'.url('service/'.$s->id).'"> ' .$s['name_'.$lang] .' </a>'; } ?>
                          </div>
                    </div>
                  </li>
                  <li class="px-4">
                    <div class="dropdown">
                      <a href="{{url('about')}}" class="dropbtn aboutLink" for="btnControl">{{__('home.about_us')}}</a>
                      <div class="dropdown-content">
                          <?php foreach (App\Models\Page::get() as $p) { ?>
                        <a href="{{url('page')}}/{{$p->code}}">{{$p['title_'.Illuminate\Support\Facades\App::getLocale()]}} </a>
                        <?php } ?>
                      </div>
                    </div>
                  </li>
                  <li class="px-4">
                    <a class="contactLink" href="{{\Illuminate\Support\Facades\Route::currentRouteName()=='home'?'#contactus':url('contact')}}">  {{__('home.contact_us')}}</a>
                  </li>
                </ul>
              </div>
              <div class="w-2/12">
                <ul class="p-0 list-none flex flex-wrap justify-end items-center">
                  <li class="p-4">
                    <a class="SearchButton">
                      <i class="fas fa-search"></i>
                    </a>
                  </li>
                  <!-- Language-->
                  <li class="p-4 flex flex-wrap items-center pr-0">
                    <i class="fas fa-globe"></i>
                    <select class="w-full" onchange="changeLang(this)">
                      <option value="en" {{App::getLocale()=='en' ? "selected":""}}>En</option>
                      <option data-display="AR" value="ar" {{App::getLocale()=='ar' ? "selected":""}}>AR</option>
                      <option value="ru" {{App::getLocale()=='ru' ? "selected":""}}>RU </option>
                    </select>
                  </li>
                </ul>
              </div>
            </div>
            <!--        search Form-->
            <form class="absolute top-0 bg-white searchForm" action="{{url('properties')}}" method="get">
              <div class="form-group">
                  <input class="p-4 w-full" required type="text" name="term" placeholder="{{__('home.search')}} . . . ">
                <div class="buttons absolute right-0 top-0">
                  <button class="btn">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </section>
      </nav>
      <!-- Sidebar in mobile only -->
      <div class="sidebar w-full relative md:hidden">
        <div class="mobileNav w-full top-0">
          <!-- Top nav @ mobile-->
          <section class="navTop px-2 py-4">
            <div class="container mx-auto">
              <div class="row flex flex-wrap">
                <div class="w-1/2">
                  <ul class="socialMedia p-0 list-none flex flex-wrap py-4">
                    <li class="px-4">
                      <a name="link" target="_blank" href="https://twitter.com/masterpiecedxb">
                        <i class="fab fa-twitter"></i>
                      </a>
                    </li>
                    <li class="px-4">
                      <a name="link" target="_blank" href="https://www.instagram.com/masterpiecerealestatedubai/">
                        <i class="fab fa-instagram"></i>
                      </a>
                    </li>
                    <li class="px-4">
                      <a name="link" target="_blank" href="https://www.linkedin.com/company/masterpiecerealestatedubai/">
                        <i class="fab fa-linkedin"></i>
                      </a>
                    </li>
                    <li class="px-4">
                      <a name="link" target="_blank" href="#!">
                        <i class="fab fa-tiktok"></i>
                      </a>
                    </li>
                    <li class="px-4">
                      <a target="_blank" href="https://www.facebook.com/masterpiecerealestatedubai">
                        <i class="fab fa-facebook"></i>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="w-1/2">
                  <ul class="socialMedia p-0 list-none flex flex-wrap justify-end py-4">
                    <li class="px-4">
                      <a name="link" href="nmailto:sales@masterpiece.realestate">
                        <i class="far fa-envelope"></i>
                      </a>
                    </li>
                    <li class="px-4">
                      <a target="_blank" href="whatsapp://send?abid=+971507730725&amp;text=Hello%2C%20Masterpiece!">
                        <i class="fab fa-whatsapp"></i>
                      </a>
                    </li>
                    <li class="px-4">
                      <a name="link" href="tel:+971507730725">
                        <i class="fas fa-phone-alt"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </section>
          <!-- Bottom nav @ mobile -->
          <section class="navBottom px-2 py-4">
            <div class="container mx-auto">
              <div class="row flex flex-wrap justify-center items-center">
                <div class="w-1/2">
                  <ul class="socialMedia p-0 list-none flex flex-wrap py-4">
                    <li class="px-4">
                      <a href="{{url('')}}">
                        <img class="h-16" src="{{url('')}}/public/dist/assets/img/logo.png" alt="">
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="w-1/2">
                  <ul class="socialMedia p-0 list-none flex flex-wrap justify-end py-4">
                    <li class="px-4">
                      <a class="open" href="#!">
                        <i class="fas fa-outdent"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </section>
          <!-- Search Form @ mobile  -->
          <form class="w-full bg-white searchForm" action="" method="post">
            <div class="form-group relative">
              <input class="p-4 w-full" type="text" placeholder="{{__('home.search')}} . . . ">
              <div class="buttons absolute right-0 top-0 flex text-center">
                <button class="btn">
                  <i class="fas fa-search"></i>
                </button>
                <a class="btn closee">
                  <i class="fas fa-times"></i>
                </a>
              </div>
            </div>
          </form>
        </div>
        <!-- Left SideBar @ mobile  -->
            <section class="min-h-screen w-screen fixed inset-0 flex flex-col justify-center" id="leftSideBar">
               <div class="h-40">       
                  <a class="absolute right-4 top-4 close" href="#!">
                    <i class="fas fa-indent"></i>
                  </a>
                <ul class="p-0 list-none flex flex-wrap justify-end items-center absolute left-4 top-4 "> 
                  <!-- Language-->
                  <li class="p-4 flex flex-wrap items-center pr-0">
                     <select class="w-full" onchange="changeLang(this)">
                      <option value="en" {{App::getLocale()=='en' ? "selected":""}}>En</option>
                      <option data-display="AR" value="ar" {{App::getLocale()=='ar' ? "selected":""}}>AR</option>
                      <option value="ru" {{App::getLocale()=='ru' ? "selected":""}}>RU </option>
                    </select>
                  </li>
                </ul>
            </div>
          <ul class="p-0 list-none overflow-auto relative">
               <li class="p-4">  
              <div class="form-group flex items-center justify-center mb-4" style=" background: #202020;">
                  <input type="text" value="" placeholder="search . . ." class="p-4 w-full" />
                  <button class="btn py-4 px-2"> Search </button>
              </div>
            </li>
            <li class="p-4">
              <a name="link" href="index.html">
                <i class="fas fa-home mr-4"></i>{{__('home.home')}}
              </a>
            </li>
            <li class="p-4">
              <a class="openDrop" name="link">
                <i class="fas fa-store-alt mr-4"></i>{{__('home.buy')}}
                <ul class="drop">
                  <li>
                    <a href="{{url('properties')}}">{{__('home.ultra_luxury')}} </a>
                  </li>
                  <li>
                    <a href="{{url('properties')}}">{{__('home.luxury')}} </a>
                  </li>
                  <li>
                    <a href="{{url('properties')}}">{{__('home.affordable')}} </a>
                  </li>
                </ul>
              </a>
            </li>
            <li class="p-4">
              <a name="link" href="#!">
                <i class="far fa-building mr-4"></i>{{__('home.sell')}}
              </a>
            </li>
            <li class="p-4">
              <a class="openDrop" name="link">
                <i class="fas fa-store-alt mr-4"></i>{{__('home.rent')}}
                <ul class="drop">
                  <li>
                    <a href="{{url('properties')}}">{{__('home.ultra_luxury')}} </a>
                  </li>
                  <li>
                    <a href="{{url('properties')}}">{{__('home.luxury')}} </a>
                  </li>
                  <li>
                    <a href="{{url('properties')}}">{{__('home.affordable')}} </a>
                  </li>
                </ul>
              </a>
            </li>
            <li class="p-4">
              <a class="openDrop" name="link">
                <i class="fas fa-street-view mr-4"></i>{{__('home.areas')}}
                <!--                <ul class="drop" id="areas-nav-dropdown2"></ul>-->
              </a>
            </li>
            <li class="p-4">
              <a class="openDrop" name="link">
                <i class="fas fa-project-diagram mr-4"></i>{{__('home.projects')}}
              </a>
            </li>
            <li class="p-4">
              <a class="openDrop" name="link">
                <i class="fas fa-user-tie mr-4"></i>{{__('home.developers')}}
                <!--                <ul class="drop" id="devs-nav-dropdown2"></ul>-->
              </a>
            </li>
            <li class="p-4">
              <a class="openDrop" name="link">
                <i class="fas fa-house-user mr-4"></i>{{__('home.services')}}
                <!--                <ul class="drop" id="services-nav-dropdown2"></ul>-->
              </a>
            </li>
            <li class="p-4">
              <a class="openDrop" name="link">
                <i class="far fa-address-card mr-4"></i>{{__('home.about_us')}}
                <ul class="drop">
                  <li>
                    <a href="{{url('about')}}#masterpiece">{{__('home.matserpiece')}} </a>
                  </li>
                  <li>
                    <a href="{{url('about')}}#philosphy">{{__('home.philosphy')}} </a>
                  </li>
                  <li>
                    <a href="{{url('about')}}#our_team">{{__('home.our_team')}} </a>
                  </li>
                  <li>
                    <a href="{{url('about')}}#joinus">{{__('home.joinus')}} </a>
                  </li>
                  <li>
                    <a href="{{url('about')}}#media">{{__('home.media')}} </a>
                  </li>
                  <li>
                    <a href="{{url('contact')}}">{{__('home.contact_us')}}</a>
                  </li>
                </ul>
              </a>
            </li>
            <li class="p-4">
              <a name="link" href="{{url('contact')}}">
                <i class="far fa-address-card mr-4"></i>{{__('home.contact_us')}}
              </a>
            </li>
          </ul>
          <!-- Social Media-->
          <div class="socialMedia p-0 list-none flex flex-wrap pt-8 justify-center items-center mt-8">
            <ul>
              <li class="px-8 mb-8 pl-4  ">
                <a name="link" href="index.html">
                  <img class="logo w-3/4 mx-auto mb-4" src="{{url('')}}/public/dist/assets/img/white.png" alt="" srcset="">
                </a>
              </li>
            </ul>
            <ul class="flex flex-wrap justify-center items-center">
              <li class="px-4">
                <a name="link" target="_blank" href="https://twitter.com/masterpiecedxb">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="px-4">
                <a name="link" target="_blank" href="https://www.instagram.com/masterpiecerealestatedubai/">
                  <i class="fab fa-instagram"></i>
                </a>
              </li>
              <li class="px-4">
                <a name="link" target="_blank" href="https://www.linkedin.com/company/masterpiecerealestatedubai/">
                  <i class="fab fa-linkedin"></i>
                </a>
              </li>
              <li class="px-4">
                <a name="link" href="#!">
                  <i class="fab fa-tiktok"></i>
                </a>
              </li>
              <li class="px-4">
                <a target="_blank" href="https://www.facebook.com/masterpiecerealestatedubai">
                  <i class="fab fa-facebook"></i>
                </a>
              </li>
            </ul>
          </div>
          <p class="Description text-center my-8">© Masterpiece 2022 </p>
        </section>
      </div>
      <!--      <div class="preloader active"><img src="{{url('')}}/public/dist/assets/img/House loading.gif" alt="" srcset=""></div>-->
