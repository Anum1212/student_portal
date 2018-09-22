@extends('layouts.societyAdminDashboard')
@section('pageTitle', 'Announcements')
@section('body')
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form autocomplete="off" action="{{ route('societyAdmin.searchAnnouncement') }}" method="get">
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
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($announcements as $announcement)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $announcement->title }}</td>
                                    <td>{{ $announcement->created_at->format('d/m/Y')}}</td>
                                    <td>
                                        <a class="text-primary" href="{{ route('societyAdmin.editAnnouncementForm', ['id'=>$announcement->id]) }}">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('societyAdmin.deleteAnnouncement', ['id'=>$announcement->id]) }}" method="post">
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
    <!-- End Page Content -->
</div>
<!-- End Container fluid  -->
@endsection
