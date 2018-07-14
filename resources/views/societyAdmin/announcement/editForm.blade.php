@extends('layouts.societyAdminDashboard') @section('body')
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('societyAdmin.editAnnouncement', ['id'=>$announcement->id]) }}" method="post"
                        enctype="multipart/form-data" autocomplete="off">
                        {{ csrf_field() }} {{ method_field('put') }}
                        <div class="form-body">
                            <h3 class="box-title m-t-15">Make Announcement</h3>
                            <hr class="m-t-0 m-b-40">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Title</label>
                                <div class="col-md-9">
                                    <input name="title" type="text" class="form-control" value="{{ $announcement->title }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Description</label>
                                <div class="col-md-9">
                                    <textarea name="description" class="textarea_editor form-control" rows="15" placeholder="Enter text ..." style="height:450px">{{ $announcement->description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row text-center">
                                <div class="col-md-9">
                                    <div class="imageupload">
                                        <div class="file-tab">
                                            <label class="btn">
                                                <span style="display:none">Browse</span>
                                                <!-- The file is stored here. -->
                                                <input type="file" name="announcementFile">
                                            </label>
                                            <button type="button" class="btn btn-default">Remove</button>
                                        </div>
                                    </div>
                                </div>
                                @if($announcement->file !=null)
                                <div class="col-md-3 pull-right">
                                    <a href={{ asset( 'storage/departmentAnnouncements/'.$announcement->file) }} download= {{ $announcement->title }} class="btn btn-info">View Uploaded File</a>
                                </div>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-actions">
                            <div class="pull-right">
                                <button type="submit" class="confirmAction btn btn-success">Submit</button>
                                <a href="{{ route('superAdmin.viewAllDepartments') }}" type="button" class="confirmAction btn btn-inverse">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Content -->
</div>
<!-- End Container fluid  -->
@endsection
