@extends('layouts.app')

@section('title', 'Dashboard')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">content_copy</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Category / Item</p>
                        <h3 class="title">{{ $categoryCount }}/{{ $itemCount }}
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-danger">info</i>
                            <a href="#pablo">Total Categories and Items</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">slideshow</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Slider Count</p>
                        <h3 class="title">{{ $sliderCount }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">date_range</i>
                            <a href="{{ route('slider.index') }}">Get More Details...</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="red">
                        <i class="material-icons">info_outline</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Reservations</p>
                        <h3 class="title">{{ $reservations->count() }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">local_offer</i> Not Confirmed Reservations
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="fa fa-twitter"></i>
                    </div>
                    <div class="card-content">
                        <p class="category">Contacts</p>
                        <h3 class="title">{{ $contactCount }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">update</i> Just Updated
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="" class="btn btn-primary">Add New</a>
                @include('layouts.partial.msg')
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">All Reservation</h4>
                        <p class="category">Here is a subtitle for this table</p>
                    </div>
                    <div class="card-content table-responsive">
                        <table id="table" class="table table-striped table-bordered" style="width:100%">
                            <thead class="text-primary">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($reservations as $key=>$reservation)
                                <tr>
                                    <td>{{ $key + 1}}</td>
                                    <td>{{ $reservation->name }}</td>
                                    <td>{{ $reservation->phone }}</td>
                                    <th>
                                        @if($reservation->status == true)
                                            <span class="label label-info">confirmed</span>
                                        @else
                                            <span class="label label-danger">not confirmed yet</span>
                                        @endif
                                    </th>
                                    <td>
                                        @if($reservation->status == false)
                                        <form method="post" id="status-form-{{$reservation->id}}" action="{{ route('reservation.status', $reservation->id)}}" >
                                            @csrf
                                            
                                        </form>
                                        <button type="button" class="btn btn-info btn-sm"
                                            onclick="if(confirm('Have you verified this request by phone?')){
                                                event.preventDefault();
                                                document.getElementById('status-form-{{$reservation->id}}').submit();
                                            }else{
                                                event.preventDefault();
                                            }">
                                            <i class="material-icons">done</i>
                                        </button>
                                           
                                        @endif

                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="if(confirm('Are you sure? You want to delet this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$reservation->id}}').submit();
                                            }else{
                                                event.preventDefault();
                                            }">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        <form id="delete-form-{{$reservation->id}}" action="{{ route('reservation.destroy', $reservation->id )}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>

@endpush