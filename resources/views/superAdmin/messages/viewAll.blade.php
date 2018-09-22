@extends('layouts.superAdminDashboard')
@section('pageTitle', 'Messages')
@section('body')
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-title">
                    <h4 class="text-danger">Messages </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Message Type</th>
                                    <th>Sender Name</th>
                                    <th>Message Title</th>
                                    <th>View</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($messages as $message)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    @if ($message->message_type == 1)
                                    <td class="text-warning">Query</td>
                                    @endif
                                    @if ($message->message_type == 2)
                                    <td class="text-success">Suggestion</td>
                                    @endif
                                    <td>{{ $message->sender_name }}</td>
                                    <td>{{ str_limit($message->title, 45) }}</td>
                                    <td><a href="{{ route('superAdmin.viewMessage', ['senderId'=>$message->id]) }}"> <i class="fa fa-search text-primary"></a></td>
                                    <td><a href="{{ route('superAdmin.deleteMessage', ['senderId'=>$message->id]) }}"> <i class="fa fa-trash text-danger"></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
@endsection
