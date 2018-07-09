@extends('layouts.superAdminDashboard') @section('body')
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form autocomplete="off" action="{{ route('') }}" class="form-horizontal" action="{{ route('') }}">
                        <div class="form-body">
                            <h3 class="box-title m-t-15">Add Department</h3>
                            <hr class="m-t-0 m-b-40">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Department Code</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Department Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                        <hr>
                        <div class="form-actions">
                                        <div class="pull-right">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                            <button type="button" class="btn btn-inverse">Cancel</button>
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
