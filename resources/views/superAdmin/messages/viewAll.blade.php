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
                    <h4 class="text-danger">Unread Messages </h4>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($unReadMessages as $unReadMessage)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    @if ($unReadMessage->message_type == 0)
                                    <td class="text-primary">Reply</td>
                                    @endif
                                    @if ($unReadMessage->message_type == 1)
                                    <td class="text-warning">Query</td>
                                    @endif @if ($unReadMessage->message_type == 2)
                                    <td class="text-success">Suggestion</td>
                                    @endif
                                    <td>{{ $unReadMessage->sender_name }}</td>
                                    <td>{{ str_limit($unReadMessage->title, 45) }}</td>
                                    <td><a href="{{ route('superAdmin.viewMessage', ['senderId'=>$unReadMessage->id]) }}"> <i class="fa fa-search text-primary"></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-title">
                    <h4 class="text-success">Read Messages </h4>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($readMessages as $readMessage)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    @if ($readMessage->message_type == 0)
                                    <td class="text-primary">Reply</td>
                                    @endif
                                    @if ($readMessage->message_type == 1)
                                    <td class="text-warning">Query</td>
                                    @endif @if ($readMessage->message_type == 2)
                                    <td class="text-success">Suggestion</td>
                                    @endif
                                    <td>{{ $readMessage->sender_name }}</td>
                                    <td>{{ str_limit($readMessage->title, 45) }}</td>
                                    <td><a href="{{ route('superAdmin.viewMessage', ['senderId'=>$readMessage->id]) }}"> <i class="fa fa-search text-primary"></a></td>
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
