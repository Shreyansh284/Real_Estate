
@extends('/user_4/hmaster')
@section('master')
<div class="breadcrumbs">
     <div class="col-sm-4">
         <div class="page-header float-left">
             <div class="page-title">
                 <h1>Dashboard</h1>
             </div>
         </div>
     </div>
     <div class="col-sm-8">
         <div class="page-header float-right">
             <div class="page-title">
                 <ol class="breadcrumb text-right">
                     <li class="active">Dashboard</li>
                 </ol>
             </div>
         </div>
     </div>
 </div>

 <div class="content mt-3">

     <div class="col-sm-12">

     @if (session()->has('success'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Success!! </strong> {{ session('success') }}
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>
 @endif
     </div>


     <div class="col-sm-6 col-lg-3">
         <a href="hmanage_house_from_houseier">
         <div class="card text-white bg-success">
             <div class="card-body pb-0">
                 <p class="text-light">Active Propertys</p>
                 <h2 class="mb-0 ">
                     <span class="count text-secondary">{{$data['active']}}</span>
                 </h2>

                 <div class="chart-wrapper px-0" style="height:70px;" height="70">
                     <canvas id="widgetChart1"></canvas>
                 </div>

             </div>

         </div>
     </a>
     </div>





     <div class="col-sm-6 col-lg-3">
         <a href="hmanage_tenant">
         <div class="card text-white bg-dark">
             <div class="card-body pb-0">
                 <p class="text-light">House on Rent</p>
                 <h2 class="mb-0 ">
                     <span class="count text-secondary">{{$data['rent']}}</span>
                 </h2>

                 <div class="chart-wrapper px-0" style="height:70px;" height="70">
                     <canvas id="widgetChart1"></canvas>
                 </div>

             </div>

         </div>
     </a>
     </div>

     <div class="col-sm-6 col-lg-3">
         <a href="hmanage_tenant">
         <div class="card text-white bg-danger">
             <div class="card-body pb-0">
                 <p class="text-light">Pending Rent Request</p>
                 <h2 class="mb-0 ">
                     <span class="count text-secondary">{{$data['pending']}}</span>
                 </h2>

                 <div class="chart-wrapper px-0" style="height:70px;" height="70">
                     <canvas id="widgetChart1"></canvas>
                 </div>

             </div>

         </div>
     </a>
     </div>



     <!--/.col-->

 </div> <!-- .content -->
</div><!-- /#right-panel -->
@endsection


