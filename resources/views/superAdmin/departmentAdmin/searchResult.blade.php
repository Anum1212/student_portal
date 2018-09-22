@extends('layouts.superAdminDashboard')
@section('pageTitle', 'Search Result')
@section('body')
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form autocomplete="off" action="{{ route('superAdmin.searchDepartmentAdmin') }}" method="get">
                        <div class="form-group">
                            <div class="input-group input-group-rounded">
                                <input type="text" placeholder="Search" name="search" class="form-control">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary btn-group-right" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($results as $result)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $result->name }}</td>
                                    <td>{{ $result->department->departmentCode .' '. $result->department->departmentName }}</td>
                                    <td>
                                        <a class="text-primary" href="{{ route('superAdmin.editDepartmentAdminForm', ['departmentAdminId'=>$result->id]) }}">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('superAdmin.deleteDepartmentAdmin', ['departmentAdminId'=>$result->id]) }}" method="post">
                                            {{csrf_field()}} {{method_field('delete')}}
                                            <button type="submit" class="confirmAction btn-danger">Delete</button>
                                        </form>
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
    <!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
@endsection
