@extends('layouts.superAdminDashboard')
@section('pageTitle', 'Edit Society')
@section('body')
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form autocomplete="off" class="form-horizontal" action="{{ route('superAdmin.editSociety', ['id'=>$details->id]) }}" method="post">
                        {{ csrf_field() }} {{ method_field('put') }}
                        <div class="form-body">
                            <h3 class="box-title m-t-15">Edit Society</h3>
                            <hr class="m-t-0 m-b-40">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Society Code</label>
                                <div class="col-md-9">
                                    <input name="code" type="text" class="form-control" value="{{ $details->societyCode }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Society Name</label>
                                <div class="col-md-9">
                                    <input name="name" type="text" class="form-control" value="{{ $details->societyName }}" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-actions">
                            <div class="pull-right">
                                <button type="submit" class="confirmAction btn btn-success">Submit</button>
                                <a href="{{ route('superAdmin.viewAllSocieties') }}" type="button" class="confirmAction btn btn-inverse">Cancel</a>
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
