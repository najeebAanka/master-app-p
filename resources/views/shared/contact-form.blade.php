<form class="relative p-8 mr-0 md:-mr-4" action="{{url('user/contact/send')}}" method="post"> 
                            
{{csrf_field()}}
    <div class="form-group relative p-4">
                                    <input class="w-full p-4" type="text"  name="name"  placeholder="{{__('home.your_name')}} "
                                           required oninvalid="this.setCustomValidity('Enter Name Here')" 
                                           oninput="this.setCustomValidity('')"
                                           >
                                </div>
                                <div class="form-group relative p-4">
                                    <input class="w-full p-4 " type="text"  name="email"  placeholder="{{__('home.email')}} " 
                                             required oninvalid="this.setCustomValidity('Enter Email Here')"
                                                oninput="this.setCustomValidity('')"
                                           >
                                </div>
                                <div class="form-group relative p-4 flex items-center justify-center">
                                    <input type="tel" class="w-auto  p-4 phone phoneKey" value="+971"   name="phone" required  >
                                    <input type="text"   class="w-full p-4 phone phone-ph"  placeholder="99-999-999"  
                                             required oninvalid="this.setCustomValidity('Enter Phone Here')"
                                                oninput="this.setCustomValidity('')"
                                           >
                                </div>
                                <div class="form-group relative p-4"><textarea class="w-full p-4" name="message", cols="20", 
                                                   required oninvalid="this.setCustomValidity('Enter Message Here')"  
                                                      oninput="this.setCustomValidity('')"
                                                                               rows="5" placeholder="{{__('home.message')}} "></textarea>   </div>
    <button type="submit" class="btn mr-4 ml-4" name="Send Message">{{__('home.send_message')}} </button>
                            </form>