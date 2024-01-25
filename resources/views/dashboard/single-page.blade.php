<?php

$item  = \App\Models\Page::find(Route::input('id'));
$page_title = $item->title_en;
$lang = "en";
if (isset($_GET['lang']))
    $lang = $_GET['lang'];
?>
<!DOCTYPE html>
<html lang="en">
    @include('dashboard.shared/header-css')
    <style>
        
  
        
        
    </style>
    <body>
        <!-- Loader starts-->
        <div class="loader-wrapper">
            <div class="theme-loader">    
                <div class="loader-p"></div>
            </div>
        </div>
        <!-- Loader ends-->
        <!-- page-wrapper Start-->
        <div class="page-wrapper" id="pageWrapper">
            @include('dashboard.shared/top-bar')                 
            <!-- Page Body Start-->
            <div class="page-body-wrapper horizontal-menu">
                @include('dashboard.shared/side-bar')  
                <div class="page-body">
                    <div class="container-fluid">
                        <div class="page-header">

                            @include('dashboard.shared/message-header')      


                      
                        </div>
                    </div>
                    <!-- Container-fluid starts-->
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="?lang=en" class="float-end btn btn-<?=($lang=='en')?"success":"default"?> m-5">English</a> 
                                        <a href="?lang=ru" class="float-end btn btn-<?=($lang=='ru')?"success":"default"?>  m-5">Pусский</a> 
                                        <a href="?lang=ar" class="float-end btn btn-<?=($lang=='ar')?"success":"default"?>  m-5">العربية</a>
                                        <h5>{{$item["title_".$lang]}} | page design</h5>
                                    </div>
                            <form class="form theme-form" method="post" action="{{url('admin/pages/update')}}">
                                                                            {{ csrf_field() }}
                                                                                   <input type="hidden" name="id" value="{{$item->id}}" />
                                      <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                  
                                                                        <textarea id="editor1" class="form-control" name="content_{{$lang}}" type="text" placeholder="Contents..." 
                                                                                  cols="30" rows="10">{{$item["contents_".$lang]}}</textarea>
                                                                    </div>
                                                                </div>
                                                               
                                                            </div>
                                                                                     <div class="col-md-12">
                                                                                         <div class="m-20">
                                                                                             
                                                                                    
                                                                                   <button class="btn btn-secondary" type="submit">Save changes</button>       
                                                                                             
                                                                                         </div></div>
                                                                               
                                                                                
                                                                                   
                            </form>
                                    
                                    
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Container-fluid Ends-->
                </div>
                <!-- footer start-->
                @include('dashboard.shared/footer')    
                   <!-- Plugins JS start-->
    <script src="{{url('public/dashboard')}}/assets/js/editor/ckeditor/ckeditor.js"></script>
    <script src="{{url('public/dashboard')}}/assets/js/editor/ckeditor/adapters/jquery.js"></script>
    <script src="{{url('public/dashboard')}}/assets/js/editor/ckeditor/styles.js"></script>
    <script>
    
    
    
    // Default ckeditor
CKEDITOR.replace( 'editor1', {
    on: {
        contentDom: function( evt ) {
            // Allow custom context menu only with table elemnts.
            evt.editor.editable().on( 'contextmenu', function( contextEvent ) {
                var path = evt.editor.elementPath();

                if ( !path.contains( 'table' ) ) {
                    contextEvent.cancel();
                }
            }, null, null, 5 );
        }
    }
} );

    
    </script>
    <!-- Plugins JS Ends-->
                </body>
                </html>