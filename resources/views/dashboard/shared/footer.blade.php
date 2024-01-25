  <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 footer-copyright">
                <p class="mb-0">Copyright 2021-22 © Masterpiece properties |  All rights reserved.</p>
              </div>
              <div class="col-md-6">
                <p class="pull-right mb-0">Last login : {{date('d-m-Y')}}</i></p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- latest jquery-->
    <script src="{{url('public/dashboard/assets')}}/js/jquery-3.5.1.min.js"></script>
    <!-- feather icon js-->
    <script src="{{url('public/dashboard/assets')}}/js/icons/feather-icon/feather.min.js"></script>
    <script src="{{url('public/dashboard/assets')}}/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="{{url('public/dashboard/assets')}}/js/sidebar-menu.js"></script>
    <script src="{{url('public/dashboard/assets')}}/js/config.js"></script>
    <!-- Bootstrap js-->
    <script src="{{url('public/dashboard/assets')}}/js/bootstrap/popper.min.js"></script>
    <script src="{{url('public/dashboard/assets')}}/js/bootstrap/bootstrap.min.js"></script>
    <!-- Plugins JS start-->
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{url('public/dashboard/assets')}}/js/script.js"></script>
<!--    <script src="{{url('public/dashboard/assets')}}/js/theme-customizer/customizer.js"></script>-->
    <!-- login js-->
    <!-- Plugin used-->
    <script>
    
    function readURL(input , placeholder) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#'+placeholder).attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
    
    
    
    </script>