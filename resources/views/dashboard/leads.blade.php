<?php
$page_title = "Leads";
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


                            <div class="row">
                                <div class="col-sm-6">
                                    <h3>{{$page_title}}</h3>
                                    <p>This is a list of {{$page_title}} collected in Masterpiece</p>
                                </div>
                           
                            </div>
                        </div>
                    </div>
                    <!-- Container-fluid starts-->
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="card">
                                  
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Source</th>
                                                    <th scope="col">Message</th>
                                                    
                                              
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $items = \App\Models\Lead::where('id', '>', 0);

                                                $start = 0;
                                                if (isset($_GET['start']))
                                                    $start = $_GET['start'];
                                                $total = $items->count();
                                                $items = $items->take(20)->offset($start)->get();
                                                foreach ($items as $item) {
                                                    ?>   
                                                    <tr>
                                                        <th scope="row">{{$item->id}}</th>
                                                        <td>{{$item->name}}</td>
                                                        <td>{{$item->email}}</td>
                                                        <td>{{$item->phone}}</td>
                                                        <td>{{$item->source}}</td>
                                                        <td>{{$item->message}}</td>
                                                      
                                               
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                        @include('dashboard.shared/pagination-footer')    
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Container-fluid Ends-->
                </div>
                <!-- footer start-->
                @include('dashboard.shared/footer')    
                   <!-- Plugins JS start-->

    

    <!-- Plugins JS Ends-->
                </body>
                </html>