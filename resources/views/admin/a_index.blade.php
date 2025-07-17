
@extends('/admin/master')
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
                <a href="manage_reg">
                <div class="card text-white bg-success">
                    <div class="card-body pb-0">
                        <p class="text-light">Active Registration</p>
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
                <a href="manage_house_from_houseier">
                <div class="card text-white bg-warning">
                    <div class="card-body pb-0">
                        <p class="text-light">Houses from Houseiers</p>
                        <h2 class="mb-0 ">
                            <span class="count text-secondary">{{$data['rent']}}</span>
                        </h2>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart1"></canvas>
                        </div>

                    </div>
                   </a>
                </div>
            </div>


            <div class="col-sm-6 col-lg-3">
                <a href="manage_property_detail_buy">
                <div class="card text-white bg-dark">
                    <div class="card-body pb-0">
                        <p class="text-light">House on sell</p>
                        <h2 class="mb-0 ">
                            <span class="count text-secondary">{{$data['buy']}}</span>
                        </h2>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart1"></canvas>
                        </div>

                    </div>

                </div>
            </a>
            </div>

            <div class="col-sm-6 col-lg-3">
                <a href="manage_houseier">
                <div class="card text-white bg-danger">
                    <div class="card-body pb-0">
                        <p class="text-light">Houseier</p>
                        <h2 class="mb-0 ">
                            <span class="count text-secondary">{{$data['houseier']}}</span>
                        </h2>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart1"></canvas>
                        </div>

                    </div>

                </div>
            </a>
            </div>

            <div class="col-sm-6 col-lg-3">
                <a href="manage_feedback">
                <div class="card text-white bg-primary">
                    <div class="card-body pb-0">
                        <p class="text-light">Feedbacks</p>
                        <h2 class="mb-0 ">
                            <span class="count text-secondary">{{$data['feedback']}}</span>
                        </h2>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart1"></canvas>
                        </div>

                    </div>

                </div>
            </a>
            </div>
            <div class="col-sm-6 col-lg-3">
                <a href="manage_buyer">
                <div class="card text-white bg-secondary">
                    <div class="card-body pb-0">
                        <p class="text-light">House Sold</p>
                        <h2 class="mb-0 ">
                            <span class="count text-light">{{$data['buyer']}}</span>
                        </h2>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart1"></canvas>
                        </div>

                    </div>

                </div>
            </a>
            </div>
            <div class="col-sm-6 col-lg-3">
                <a href="manage_tenant">
                <div class="card text-black bg-black">
                    <div class="card-body pb-0">
                        <p class="text-dark">House on Rent</p>
                        <h2 class="mb-0 ">
                            <span class="count text-secondary">{{$data['tenant']}}</span>
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


