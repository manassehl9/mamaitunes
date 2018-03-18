@extends('layouts.app')

@section('title', 'Reservation')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

@section('content')

<div class="content">
    <div class="container-fluid">
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
                                <th>Email</th>
                                <th>Time and Date</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($reservations as $key=>$reservation)
                                <tr>
                                    <td>{{ $key + 1}}</td>
                                    <td>{{ $reservation->name }}</td>
                                    <td>{{ $reservation->phone }}</td>
                                    <td>{{ $reservation->email }}</td>
                                    <td>{{ $reservation->date_and_time }}</td>
                                    <td>{{ $reservation->message }}</td>
                                    <th>
                                        @if($reservation->status == true)
                                            <span class="label label-info">confirmed</span>
                                        @else
                                            <span class="label label-danger">not confirmed yet</span>
                                        @endif
                                    </th>
                                    <td>{{ $reservation->created_at }}</td>
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
                                        
                                        <form id="status-form-{{$reservation->id}}"
                                            action="{{ route('reservation.destroy', $reservation->id )}}"
                                                style="..." method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="if(confirm('Are you sure? You want to delet this?')){
                                                event.preventDefault();
                                                document.getElementById('status-form-{{$reservation->id}}').submit();
                                            }else{
                                                event.preventDefault();
                                            }">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        
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