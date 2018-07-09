@extends('layouts.superAdminDashboard') @section('body')
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($societyAdmins as $societyAdmin)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $societyAdmin->name }}</td>
                                    <td>
                                            <a class="text-primary" href="{{ route('superAdmin.editSocietyAdminForm', ['id'=>$societyAdmin->id]) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    </td>
                                    <td>
                                        <form style="margin-top:15px;" action="{{ route('superAdmin.deleteSocietyAdmin', ['id'=>$societyAdmin->id]) }}" method="post">
                                            {{csrf_field()}} {{method_field('delete')}}
                                            <button type="submit" class="btn-danger" disabled="disabled">Delete</button>
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
