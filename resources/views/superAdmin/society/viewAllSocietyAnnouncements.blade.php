@extends('layouts.superAdminDashboard')
@section('body')
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    @foreach($societyAnnouncements as $societyAnnouncement)
                    <p>
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#announcement{{ $societyAnnouncement->id }}"
                            aria-expanded="false" aria-controls="announcement{{ $societyAnnouncement->id }}">
                            {{ $societyAnnouncement->title }}
                        </button>
                    </p>
                    <div class="collapse" id="announcement{{ $societyAnnouncement->id }}">
                        <div class="card card-body">
                            @if($societyAnnouncement->description=="") No description @else {!! htmlspecialchars_decode($societyAnnouncement->description)
                            !!} @endif @if($societyAnnouncement->file !=null)
                            <div class="text-center bg-light">
                                <a href={{ asset( 'storage/societyAnnouncements/'.$societyAnnouncement->file) }} download= {{ $societyAnnouncement->title }} class="btn btn-link">View File</a>
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
