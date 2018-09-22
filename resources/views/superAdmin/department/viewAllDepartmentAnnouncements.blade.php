@extends('layouts.superAdminDashboard')
@section('pageTitle', 'Department Annoncements')

@section('body')
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    @foreach($departmentAnnouncements as $departmentAnnouncement)
                    <p>
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#announcement{{ $departmentAnnouncement->id }}"
                            aria-expanded="false" aria-controls="announcement{{ $departmentAnnouncement->id }}">
                            {{ $departmentAnnouncement->title }}
                        </button>
                    </p>
                    <div class="collapse" id="announcement{{ $departmentAnnouncement->id }}">
                        <div class="card card-body">
                            @if($departmentAnnouncement->description=="") No description @else {!! htmlspecialchars_decode($departmentAnnouncement->description)
                            !!} @endif @if($departmentAnnouncement->file !=null)
                            <div class="text-center bg-light">
                                <a href={{ asset( 'storage/departmentAnnouncements/'.$departmentAnnouncement->file) }} download= {{ $departmentAnnouncement->title }} class="btn btn-link">View File</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
    <!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
@endsection
