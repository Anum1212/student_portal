@extends('layouts.societyAdminDashboard')
@section('body')
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-title">
                    <h4 class="text-danger">Recent Announcements </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($societyAnnouncements>0)
                                <tr>
                                    <td>1</td>
                                    <td><a class="text-primary" href="{{ route('societyAdmin.viewAllAnnouncements') }}"> {{ Auth::user()->society[0]->societyName }} </a></td>
                                    <td><span class="badge badge-success">{{ $societyAnnouncements }}</span></td>
                                </tr>
                                @endif
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
