@extends('layouts.studentDashboard')
@section('pageTitle', 'Dashboard')
@section('body')
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-title">
                    <h4 class="text-danger">Recent {{ Auth::user()->department->departmentName }} Announcements </h4>
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
                                @if ($departmentAnnouncements>0)
                                <tr>
                                    <td>1</td>
                                    <td><a class="text-primary" href="{{ route('student.departmentAnnouncements') }}"> {{ Auth::user()->department->departmentName }} </a></td>
                                    <td><span class="badge badge-success">{{ $departmentAnnouncements }}</span></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-title">
                    <h4 class="text-warning">Recent Society Announcements </h4>
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
                                @for ($i = 0; $i < count(Auth::user()->society); $i++)
                                @if ($societyAnnouncements[$i]>0)
                                <tr>
                                    <td>
                                        {{ $i+1 }}
                                    </td>
                                    <td>
                                        <a class="text-primary" href="{{ route('student.societyAnnouncements') }}">{{ Auth::user()->society[$i]->societyName }} </a>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">{{ $societyAnnouncements[$i] }}</span>
                                    </td>
                                </tr>
                                @endif
                                @endfor
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
