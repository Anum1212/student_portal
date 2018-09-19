@extends('layouts.studentDashboard') @section('body')
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            @foreach(Auth::user()->society as $society)
            <div class="card">
                <div class="card-body">

                    <p>
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#society{{ $society->id }}"
                            aria-expanded="false" aria-controls="society{{ $society->id }}">
                            {{ $society->societyName }}
                        </button>
                    </p>
                    <div class="collapse" id="society{{ $society->id }}">
                        <div class="card card-body">
                    @foreach($societyAnnouncements as $societyAnnouncement)
                    @if($societyAnnouncement->society_id == $society->id)
                    <p>
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#announcement{{ $societyAnnouncement->id }}"
                            aria-expanded="false" aria-controls="announcement{{ $societyAnnouncement->id }}">
                            {{ $societyAnnouncement->title }}
                        </button>
                    </p>
                    <div class="collapse" id="announcement{{ $societyAnnouncement->id }}">
                        <div class="card card-body">
                            @if($societyAnnouncement->description=="")
                            No description
                            @else
                            {!! htmlspecialchars_decode($societyAnnouncement->description) !!}
                            @endif
                            @if($societyAnnouncement->file !=null)
                            <div class="text-center bg-light">
                                <a href={{ asset( 'storage/societyAnnouncements/'.$societyAnnouncement->file) }} download= {{ $societyAnnouncement->title }} class="btn btn-link">View File</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    @endforeach
    </div>
    <!-- End PAge Content -->
</div>
</div>
<!-- End Container fluid  -->
@endsection
