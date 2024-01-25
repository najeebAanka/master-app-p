   <!-- Footer -->
      <Footer id="footer">
        <div class="container px-4 mx-auto">
          <div class="row flex flex-wrap relative overflow-hidden py-24 justify-center ">
            <div class="w-1/2 md:w-1/4 lg:w-1/5">
              <!-- Quick Links-->
              <h3 class="font-black title">{{__('home.quick_links')}}</h3>
              <ul>
<!--                      <li> <a href="{{url('properties')}}?target=rent">{{__('home.rent')}} </a></li>-->
                      <li> <a href="{{url('sell')}}">{{__('home.sell')}}</a></li>
                      <li> <a href="{{url('properties')}}?target=sell">{{__('home.buy')}}</a></li>
                      <li> <a href="{{url('areas')}}">{{__('home.areas')}}</a></li>
                      <li> <a href="{{url('about')}}">{{__('home.about_us')}}</a></li>
                      <li> <a href="{{url('contact')}}">{{__('home.join_us')}}</a></li>
              </ul>
            </div>
            <div class="w-1/2 md:w-1/4 lg:w-1/5">
              <!-- Services Links -->
              <a href="#services-section"><h3 class="font-black title">{{__('home.services')}}</h3></a>
              <div class="Quick flex flex-wrap">
                <ul id="footer-services-ul1">
                       <?php
                        $lang = Illuminate\Support\Facades\App::getLocale();
                       $services = \App\Models\ServiceItem::get();
                        $c = 0;
                        foreach ($services as $s){
                            if($c++>5)break;
                              echo '<li><a href="'.url('service/'.$s->id).'"> ' .$s['name_'.$lang] .' </a></li>'; } ?>

                </ul>
              </div>
            </div>
            <div class="w-1/2 md:w-1/4 lg:w-1/5">
              <!-- Services Links -->
              <a href="#services-section">  <h3 class="font-black title">{{__('home.other_services')}}</h3></a>
              <div class="Quick flex flex-wrap">
                <ul id="footer-services-ul2">
                          <?php
                        $c = 0;
                        foreach ($services as $s){
                            if($c>=6 && $c<=12)
                              echo '<li><a href="'.url('service/'.$s->id).'"> ' .$s['name_'.$lang] .' </a></li>';
                            $c++;

                        } ?>
                </ul>
              </div>
            </div>
            <div class="w-1/2 md:w-1/4 lg:w-1/5">
              <!-- Support Links  -->
              <h3 class="font-black title">{{__('home.support')}}</h3>
              <ul>
                      <li> <a href="#!">{{__('home.help')}} </a></li>
                      <li> <a href="{{url('contact')}}">{{__('home.contact_us')}}</a></li>
                      <li> <a href="#!">{{__('home.terms_of_use')}}</a></li>
                      <li> <a href="{{url('privacy')}}">{{__('home.privacy_policy')}}</a></li>
              </ul>
            </div>
            <div class="w-full md:w-1/4 lg:w-1/5">
              <!-- Logo-->
              <div class="footerLogo mx-auto max-w-full mt-8 md:mt-0  md:w-96"> <a href="{{url('')}}"> <img src="{{url('public')}}/dist/assets/img/Masterpiece-logos.png" alt="" srcset=""></a></div>
              <!-- Social Media-->
              <ul class="socialMedia p-0 list-none flex flex-wrap justify-center mt-8">
                    <li class="px-4"><a target="_blank" href="https://twitter.com/masterpiecedxb"> <i class="fab fa-twitter"></i></a></li>
                  <li class="px-4"><a target="_blank" href="https://www.instagram.com/masterpiecerealestatedubai/"> <i class="fab fa-instagram"></i></a></li>
                  <li class="px-4"><a target="_blank" href="https://www.linkedin.com/company/masterpiecerealestatedubai/"> <i class="fab fa-linkedin"></i></a></li>
                  <li class="px-4"><a target="_blank" href="https://www.tiktok.com/@masterpiece_real_estate"> <i class="fab fa-tiktok"></i></a></li>
                  <li class="px-4"><a target="_blank" href="https://www.facebook.com/masterpiecerealestatedubai"> <i class="fab fa-facebook"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- Copyright -->
        <div class="copyRight text-center">
            <p class="Description">©  All rights Reserved Masterpiece.
            </p>
        </div>
      </Footer>
