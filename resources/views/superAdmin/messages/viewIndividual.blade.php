@extends('layouts.superAdminDashboard')
@section('pageTitle', 'Message by '. $messageDetails->sender_name)
@section('body')
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <div class="card-content">
                        <!-- Left sidebar -->
                        <div class="inbox-leftbar">
                            <div class="btn btn-info btn-block">Messages</div>
                            <div class="mail-list mt-4" style="max-height: 400px; overflow-y: scroll; overflow-x:hidden;">
                                @foreach ($messages as $message)
                                <a href="{{ route('superAdmin.viewMessage', ['senderId'=>$message->id]) }}" class="list-group-item border-0">{{ $message->sender_name }}</a>
                                @endforeach
                            </div>
                        </div>
                        <!-- End Left sidebar -->

                        <div class="inbox-rightbar">

                            <div class="m-t-10 m-b-20" role="toolbar"></div>

                            <div class="mt-4">
                                <h5>{{ $messageDetails->title }}</h5>

                                <hr>

                                <div class="media mb-4 mt-1">
                                    <div class="media-body">
                                        <span class="pull-right">{{ \Carbon\Carbon::parse($messageDetails->created_at)->format('d/m/Y')}}</span>
                                        <h6 class="m-0"> <a href="{{ route('superAdmin.editStudentForm',['senderId'=>$messageDetails->sender_id]) }}" class="text-dark">{{ $messageDetails->sender_name }}</a></h6>
                                    </div>
                                </div>

                                <p>{{ $messageDetails->message }}</p>


                                @if ($messageDetails->file)
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <a href={{ asset( 'storage/messageFile/'.$messageDetails->file) }} download= {{ $messageDetails->title }} class="btn btn-link">View Attachment</a>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <!-- card-box -->

                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('superAdmin.sendMessage', ['replyToMessageId'=>$messageDetails->id]) }}" method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <h3 class="box-title m-t-15">Write Message</h3>
                            <hr class="m-t-0 m-b-40">

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

        </div>
    </div>
    <!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
@endsection

@section('script')
    <script src="{{ asset('js/bootstrap-imageupload.js') }}"></script>
        <script>
            // Image Upload
                var $imageupload = $('.imageupload');
                $imageupload.imageupload();
        </script>
@endsection
