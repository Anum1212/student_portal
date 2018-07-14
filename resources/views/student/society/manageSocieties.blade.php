@extends('layouts.studentDashboard') @section('head')
<link rel="stylesheet" href="/css/toggleSwitch.css"> @endsection @section('body')
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @if(isset($studentUnRegisteredSocieties))
                    <form autocomplete="off" action="{{ route('student.addSociety') }}" class="form-horizontal" method="get">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Choose a society</label>
                            <div class="col-md-5">
                                <select name="studentUnRegisteredSociety" class="form-control" required>
                                    @foreach ($studentUnRegisteredSocieties as $studentUnRegisteredSociety)
                                    <option value="{{ $studentUnRegisteredSociety->id }}">{{ $studentUnRegisteredSociety->societyName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                    @else
                    <p>You have registered in all societies</p>
                    @endif

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Your Societies</th>
                                    <th>Notification Status</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Auth::user()->society as $society)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $society->societyName }}</td>
                                    <td>
                                        <form action="{{ route('student.manageSocietyNotifications', ['societyId'=>$society->id]) }}" method="GET">
                                            <div class="switch">
                                                <input id="cmn-toggle-4{{ $society->id }}" class="cmn-toggle cmn-toggle-round-flat" type="checkbox" onChange="this.form.submit()" <?php for($i=0; $i<count($societyNotificationStatus); $i++) if($societyNotificationStatus[$i]->society_id == $society->id) echo 'checked="checked"'; ?>>
                                                <label for="cmn-toggle-4{{ $society->id }}"></label>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('student.deleteSociety', ['societyId'=>$society->id]) }}">
                                            <i class="text-danger fa fa-trash"></i>
                                        </a>
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
