@extends('layouts.superAdminDashboard')

@section('body')
                <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">

                                <div class="card">
                                <div class="card-title">
                                    <h4 class="text-danger">Recent Department Announcements </h4>
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
                                                <?php $i=0; ?>
                                                @foreach($departments as $department)
                                                @if ($departmentAnnouncements[$i]>0)
                                                <tr>
                                                    <td>
                                                        {{ $i+1 }}
                                                    </td>
                                                    <td><a class="text-primary" href="{{ route('superAdmin.viewAllDepartmentAnnouncements', ['id'=>$department->id]) }}"> {{ $department->departmentName }} </a></td>
                                                    <td><span class="badge badge-success">{{ $departmentAnnouncements[$i] }}</span></td>
                                                </tr>
                                                <?php $i++; ?>
                                                @endif
                                                @endforeach
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
                                                <tr>
                                                <?php $i=0; ?>
                                                @foreach($societies as $society)
                                                @if ($societyAnnouncements[$i]>0)

                                                <td>
                                                    {{ $i+1 }}
                                                </td>
                                                <td><a class="text-primary" href="{{ route('superAdmin.viewAllSocietyAnnouncements', ['id'=>$society->id]) }}"> {{ $society->societyName }} </a></td>
                                                <td><span class="badge badge-success">{{ $societyAnnouncements[$i] }}</span></td>
                                            </tr>
                                            <?php $i++; ?>
                                            @endif
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
