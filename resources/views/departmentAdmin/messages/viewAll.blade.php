@extends('layouts.departmentAdminDashboard')
@section('pageTitle', 'Messages')
@section('body')
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('departmentAdmin.sendMessage') }}" method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <h3 class="box-title m-t-15">Write Message</h3>
                            <hr class="m-t-0 m-b-40">

                            <div class="form-group">
                                <label>Message Type</label>
                                <select class="form-control" name="messageType">
                                    <option value="1">Query</option>
                                    <option value="2">Suggestion</option>
                                </select>
                            </div>

                            <div class="form-group row">
                                <label class="control-label">Message Title</label>
                                <input name="title" type="text" class="form-control" required>
                            </div>

                            <div class="form-group row">
                                <textarea name="message" class="form-control" rows="15" placeholder="Enter Message ..." style="height:450px"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="imageupload">
                                    <div class="file-tab">
                                        <label class="btn">
                                                        <span style="display:none">Browse</span>
                                                        <!-- The file is stored here. -->
                                                        <input type="file" name="messageFile">
                                                    </label>
                                        <button type="button" class="btn btn-default">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-actions">
                            <div class="pull-right">
                                <button type="submit" class="confirmAction btn btn-success">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

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
                                    <td><a href="{{ route('departmentAdmin.viewMessage', ['senderId'=>$unReadMessage->id]) }}"> <i class="fa fa-search text-primary"></a></td>
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
                                    <td><a href="{{ route('departmentAdmin.viewMessage', ['senderId'=>$readMessage->id]) }}"> <i class="fa fa-search text-primary"></a></td>
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
