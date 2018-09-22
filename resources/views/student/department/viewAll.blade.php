@extends('layouts.studentDashboard')
@section('pageTitle', 'Department Announcements')
@section('body')
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            @foreach($departmentAnnouncements as $departmentAnnouncement)
            <div class="card">
                <div class="card-body">
                    <p>
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#announcement{{ $departmentAnnouncement->id }}"
                            aria-expanded="false" aria-controls="announcement{{ $departmentAnnouncement->id }}">
                            {{ $departmentAnnouncement->title }}
                        </button>
                    </p>
                    <div class="collapse" id="announcement{{ $departmentAnnouncement->id }}">
                        <div class="card card-body">
                            @if($departmentAnnouncement->description=="")
                            No description
                            @else
                            {!! htmlspecialchars_decode($departmentAnnouncement->description) !!}
                            @endif
                            @if($departmentAnnouncement->file !=null)
                            <div class="text-center bg-light">
                                <a href={{ asset( 'storage/departmentAnnouncements/'.$departmentAnnouncement->file) }} download= {{ $departmentAnnouncement->title }} class="btn btn-link">View File</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
@endsection
