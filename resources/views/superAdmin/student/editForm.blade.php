@extends('layouts.superAdminDashboard')
@section('pageTitle', 'Edit Student')
@section('body')
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form autocomplete="off" action="{{ route('superAdmin.editStudent', ['studentId'=>$details->id]) }}" class="form-horizontal"
                        method="POST">
                        {{ csrf_field() }} {{ method_field('put') }}
                        <div class="form-body">
                            <h3 class="box-title m-t-15">Edit Student Details</h3>
                            <hr class="m-t-0 m-b-40">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Name</label>
                                <div class="col-md-9">
                                    <input name="name" type="text" class="form-control" value="{{ $details->name }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Email</label>
                                <div class="col-md-9">
                                    <input name="email" type="email" class="form-control" value="{{ $details->email }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Registration#</label>
                                <div class="col-md-9">
                                    <input name="registration" type="text" class="form-control" value="{{ $details->registration }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Password</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="Will Be Changed To Registration Number" disabled required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Department</label>
                                <div class="col-md-9">
                                    <select name="department" class="form-control" required>
                                        @foreach ($departments as $department)
                                        <option value="{{ $department->id }}" <?php if($details->department_id==$department->id) echo 'selected="selected"'; ?> >{{ $department->departmentName
                                            }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-actions">
                            <div class="pull-right">
                                <button type="submit" class="confirmAction btn btn-success">Submit</button>
                                <a href="{{ route('superAdmin.viewAllDepartmentAdmins') }}" type="button" class="confirmAction btn btn-inverse">Cancel</a>
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
