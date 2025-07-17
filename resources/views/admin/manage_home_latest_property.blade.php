@extends('/admin/master')
@section('master')
    <br>
    <div class="offset-sm-8 col-sm-4">
        <div class="row">
            <div class="col">
                {{-- <a href="reg_buy_single"><button class="btn btn-danger">Add Buy Property</button></a> --}}
            </div>
        </div>
    </div>
    <br><br>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Manage Home Page Property</strong>
            </div>
            <div class="card-body">
                <table class="table table-dark">
                    <thead>
                        <tr>


                            <th scope="col">Proparty Picture</th>
                            <th scope="col">Price</th>
                            <th scope="col">Bed</th>

                            <th scope="col">Area</th>

                            <th scope="col">Location</th>
                            <th scope="col">City</th>
                            <th scope="col">Address</th>

                            <th scope="col">status</th>

                            <th scope="col">status</th>



                        </tr>

                        @foreach ($reg_data as $item)
                        <tr>



                            <td>
                            @php
                                 $images=explode('|',$item->picture);

                            @endphp
                            @foreach ($images as $ite)<img src="{{ URL::to($ite)}}" height="100" width="100" alt="">@endforeach</td>


                            <td>{{ $item['price'] }}</td>
                            <td>{{ $item['bed'] }}</td>

                            <td>{{ $item['area'] }}</td>

                            <td>{{ $item['address'] }}</td>
                            <td>{{ $item['location'] }}</td>
                            <td>{{ $item['city'] }}</td>

                            <td>{{ $item['status'] }}</td>






                            <td>
                                @if ($item['status'] == 'active')
                                    <a href="{{ URL::to('/') }}/deactivate_latest_buy/{{ $item['id'] }}"><input type="button"
                                            class="btn btn-success" value="deactivate"></a>
                                @else
                                    <a href="{{ URL::to('/') }}/activate_latest_buy/{{ $item['id'] }}"><input type="button"
                                            class="btn btn-primary" value="activate"></a>

                                @endif
                            </td>


                        </tr>

                        @endforeach
                </table>
            </div>
        </div>
    </div>


    </div>
    </div>
    </div>
@endsection
