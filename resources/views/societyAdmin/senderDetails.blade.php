@extends('layouts.societyAdminDashboard')
@section('pageTitle', $details->name .' Details')
@section('body')
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                        <div class="form-body">
                            <h3 class="box-title m-t-15">Sender Details</h3>
                            <hr class="m-t-0 m-b-40">
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Department</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $details->department->departmentName }}" disabled>
                            </div>
                        </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" value="{{ $details->name }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Email</label>
                                <div class="col-md-9">
                                    <input class="form-control" value="{{ $details->email }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Registration#</label>
                                <div class="col-md-9">
                                    <input class="form-control" value="{{ $details->registration }}" disabled>
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
