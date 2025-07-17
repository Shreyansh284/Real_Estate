@extends('/user_4/hmaster')
@section('master')
    <br>
    <div class="offset-sm-8 col-sm-4">
        <div class="row">
            <div class="col">
                <a href="reg_rent_property"><button class="btn btn-danger">Add Rent Property</button></a>
            </div>
        </div>
    </div>
    <br><br>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Manage Rent Property</strong>
            </div>
            <div class="card-body">
                <table class="table table-dark">
                    <thead>
                        <tr>

                            <th scope="col">Property ID</th>
                            {{-- <th scope="col">Houseier email</th> --}}
                            <th scope="col">Proparty Picture</th>
                            <th scope="col">Price</th>
                            <th scope="col">Bed</th>
                            <th scope="col">Bath</th>
                            <th scope="col">Area</th>
                            <th scope="col">Benifits</th>
                            <th scope="col">Location</th>
                            <th scope="col">City</th>
                            <th scope="col">Address</th>
                            <th scope="col">Property Description</th>
                            <th scope="col">status</th>
                            <th scope="col">edit</th>
                            <th scope="col">status</th>
                            <th scope="col">delete</th>


                        </tr>

                        @foreach ($reg_data as $item)
                        <tr>

                            <td>{{ $item['id'] }}</td>
                            {{-- <td>{{ $item['email'] }}</td> --}}


                            <td>
                            @php
                                $image=DB::table('property_rents')->first();
                                $images=explode('|',$image->picture);
                            @endphp
                            @foreach ($images as $ite)<img src="{{ URL::to($ite)}}" height="100" width="100" alt="">@endforeach</td>


                            <td>{{ $item['price'] }}</td>
                            <td>{{ $item['bed'] }}</td>
                            <td>{{ $item['bath'] }}</td>
                            <td>{{ $item['area'] }}</td>
                            <td>{{ $item['benifits'] }}</td>
                            <td>{{ $item['address'] }}</td>
                            <td>{{ $item['location'] }}</td>
                            <td>{{ $item['city'] }}</td>
                            <td>{{ $item['property_description'] }}</td>
                            <td>{{ $item['status'] }}</td>


                            <td> <a href=""><button class="btn btn-info" style="width:70px">Edit</button></a>
                            </td>




                            <td>
                                @if ($item['status'] == 'active')
                                    <a href="{{ URL::to('/') }}/deactivate_property_rent/{{ $item['id'] }}"><input type="button"
                                            class="btn btn-success" value="deactivate"></a>
                                @elseif($item['status'] == 'inactive')
                                    <a href="{{ URL::to('/') }}/activate_property_rent/{{ $item['id'] }}"><input type="button"
                                            class="btn btn-primary" value="activate"></a>
                                @else
                                    <a href="{{ URL::to('/') }}/reactivate_property_rent/{{ $item['id'] }}"><input type="button"
                                            class="btn btn-secondary" value="reactivate"></a>
                                @endif
                            </td>

                            <td> <a href="{{ URL::to('/') }}/delete_property_rent/{{ $item['id']  }}"><button
                                class="btn btn-danger" style="width:100px">Delete</button></a></td>
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
