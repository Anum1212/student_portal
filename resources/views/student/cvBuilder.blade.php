@extends('layouts.studentDashboard')
@section('pageTitle', 'CV Builder')

@section('head')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('style')

<style>
html,body,h1,h2,h3,h4,h5,h6 {
    font-family: "Roboto", sans-serif
}
#image-preview {
    width: 100%;
    height: 203px;
    position: relative;
    overflow: hidden;
    background-color: #ffffff;
    color: #ecf0f1;
}

#printCVBtn {
    width: 100%;
    margin: auto;
    height: 50px;
}

.inputBox {
    border: none;
    outline: 0;
    border-bottom: 1px solid #d2d2d2;
    background-image: none;
    background-color: transparent;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    width: 85%;
}

@media print {
    #printbtn,
    .inputBox,
    .btnHide {
    display: none;
    }
}
</style>
@endsection


@section('body')
<!-- Container fluid  -->
<div class="container-fluid">
<!-- Start Page Content -->
<div class="row">
<div class="col-12">

<body class="w3-light-grey">

<!-- Page Container -->
<div class="w3-content w3-margin-top" id="cv">

    <!-- The Grid -->
    <div class="w3-row-padding">

        <!-- Left Column -->
        <div class="w3-third">

            <div class="w3-white w3-text-grey w3-card-4">
                <div class="w3-display-container">
                    {{-- <img src="{{ asset( 'storage/avatar_hat.jpg') }}" style="width:100%" alt="Avatar"> --}}
                    <div id="image-preview">
                        <label for="image-upload" id="image-label" style="color:black">Choose Image</label>
                    </div>
                    <div class="w3-display-bottomleft w3-container w3-text-black">
                        <h2>{{ Auth::user()->name }}</h2>
                    </div>
                </div>
                <br>
                <input type="file" name="image" id="image-upload" class="btnHide btn btn-primary"/>
                <br>
                <br>
                <div class="w3-container">
                    <p><i id="outputJob" class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i><input
                            type="text" class="inputBox" id="job"></p>
                    <p><i id="outputAddress" class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i><input
                            type="text" class="inputBox" id="address"></p>
                    <p><i id="outputEmail" class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><input
                            type="text" class="inputBox" id="email"></p>
                    <p><i id="outputContact" class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><input
                            type="text" class="inputBox" id="contact"></p>
                    <br>
                    <button id="addPersonalDetailsBtn" class="btnHide btn btn-primary">Add</button>
                    <br>
                    <hr>

                    <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Skills</b></p>
                    <ul id="Skills">

                    </ul>
                    <br>

                    <input type="text" id="skillName" class="inputBox" placeholder="Skill Name" style="margin-bottom: 20px">

                    <input type="text" id="skillLevel" class="inputBox" placeholder="Skill Level" style="margin-bottom: 20px">

                    <br>
                    <br>
                    <button id="addSkillBtn" class="btnHide btn btn-primary">Add</button>
                    <br>
                    <br>

                    <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Languages</b></p>
                    <ul id="Langs">

                    </ul>
                    <br>
                    <input type="text" id="langName" class="inputBox" placeholder="Language Name" style="margin-bottom: 20px">
                    <input type="text" id="langLevel" class="inputBox" placeholder="Language Level" style="margin-bottom: 20px">

                    <br>
                    <button id="addLangBtn" class="btnHide btn btn-primary">Add</button>
                    <br>
                    <br>
                </div>
            </div>

            <br>

            <!-- End Left Column -->
        </div>

        <!-- Right Column -->
        <div class="w3-twothird">

            <div class="w3-container w3-card w3-white w3-margin-bottom">
                <h2 id="Work" class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Work
                    Experience</h2>
                <div class="row">
                    <div class="col-lg-6">
                        <input type="text" id="jobName" class="inputBox" placeholder="Job Name">
                    </div>
                    <div class="col-lg-6">
                        <input type="text" id="companyName" class="inputBox" placeholder="Company Name">
                    </div>
                    <br>
                    <br>
                    <div class="col-lg-6">
                        <input type="text" id="starting" class="inputBox" placeholder="Starting Date">
                    </div>
                    <div class="col-lg-6">
                        <input type="text" id="end" class="inputBox" placeholder="Ending Date">
                    </div>
                    <br>
                    <br>
                    <div class="col-lg-12">
                        <textarea id="description" class="form-control inputBox" rows="5" id="comment" placeholder="Description"></textarea>
                    </div>
                </div>
                <br>
                <button id="addWorkBtn" class="btnHide btn btn-primary">Add</button>
                <br>
                <br>
            </div>
            <div class="w3-container w3-card w3-white">
                <h2 id="Education" class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Education</h2>
                <div class="row">
                    <div class="col-lg-6">
                        <input type="text" id="instituteName" class="inputBox" placeholder="Institute Name">
                    </div>
                    <div class="col-lg-6">
                        <input type="text" id="degreeName" class="inputBox" placeholder="Degree Name">
                    </div>
                    <br>
                    <br>
                    <div class="col-lg-6">
                        <input type="text" id="starting" class="inputBox" placeholder="Starting Date">
                    </div>
                    <div class="col-lg-6">
                        <input type="text" id="end" class="inputBox" placeholder="Ending Date">
                    </div>
                </div>
                <br>
                <button id="addEduBtn" class="btnHide btn btn-primary">Add</button>
                <br>
                <br>
            </div>
            <!-- End Right Column -->
        </div>

        <!-- End Grid -->
    </div>

    <!-- End Page Container -->
</div>

<br>
<button id="printCVBtn" class="btn btn-primary">Print Cv</button>
<br>

</body>
@endsection



@section('script')

{{-- Include scripts --}}
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
<script src="/js/html2canvas.js"></script>
<script src="/js/imagePreview.js"></script>

<script>
    
    $(document).ready(function () {

        // image upload
        $.uploadPreview({
    input_field: "#image-upload",   // Default: .image-upload
    preview_box: "#image-preview",  // Default: .image-preview
    label_field: "#image-label",    // Default: .image-label
    label_default: "Choose File",   // Default: Choose File
    label_selected: "",  // Default: Change File
    no_label: false                 // Default: false
  });

        // Add personal details
        $("#addPersonalDetailsBtn").click(function () {
            var job = $('#job').val();
            var address = $('#address').val();
            var email = $('#email').val();
            var contact = $('#contact').val();
            $('#job').hide();
            $('#address').hide();
            $('#email').hide();
            $('#contact').hide();
            $("#outputJob").append("&nbsp;" + job);
            $("#outputAddress").append("&nbsp;" + address);
            $("#outputEmail").append("&nbsp;" + email);
            $("#outputContact").append("&nbsp;" + contact);
        });

        // Add skills
        $("#addSkillBtn").click(function () {
            var skillName = $('#skillName').val();
            var skillLevel = $('#skillLevel').val();
            $("#Skills").append("<li>" + skillName +
                "<div class='w3-light-grey w3-round-xlarge w3-small'><div class='w3-container w3-center w3-round-xlarge w3-teal' style='height:18px; width:" +
                skillLevel + "%'></div></div></li>");
        });


        // Add languages
        $("#addLangBtn").click(function () {
            var langName = $('#langName').val();
            var langLevel = $('#langLevel').val();
            $("#Langs").append("<li>" + langName +
                "<div class='w3-light-grey w3-round-xlarge w3-small'><div class='w3-container w3-center w3-round-xlarge w3-teal' style='height:18px; width:" +
                langLevel + "%'></div></div></li>");
        });

        // Add work experience
        $("#addWorkBtn").click(function () {
            var jobName = $('#jobName').val();
            var companyName = $('#companyName').val();
            var starting = $('#starting').val();
            var end = $('#end').val();
            var description = $('#description').val();
            $("#Work").append("<div class='w3-container'><h5 class='w3-opacity'><b>" + jobName + " / " +
                companyName +
                "</b></h5><h6 class='w3-text-teal'><i class='fa fa-calendar fa-fw w3-margin-right'></i>" +
                starting + " - " + end + "</h6><p style='font-size:15px'>" + description +
                "</p><hr></div>");
        });

        // Add education
        $("#addEduBtn").click(function () {
            var instituteName = $('#instituteName').val();
            var starting = $('#starting').val();
            var end = $('#end').val();
            var degreeName = $('#degreeName').val();
            $("#Education").append("<div class='w3-container'><h5 class='w3-opacity'><b>" +
                instituteName +
                "</b></h5><h6 class='w3-text-teal'><i class='fa fa-calendar fa-fw w3-margin-right'></i>" +
                starting + " - " + end + "</h6><p style='font-size:15px'>" + degreeName +
                "</p><hr></div>");
        });

        //  print script
        $("#printCVBtn").click(function () {
            $('.inputBox').hide();
            $('.btnHide').hide();

            const filename = 'cv.pdf';

            html2canvas(document.querySelector('#cv')).then(canvas => {
                let pdf = new jsPDF('p', 'mm', 'a4');
                pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, 211, 298);
                pdf.save(filename);
            });
            setTimeout(showInputBox, 2000);
        });

        // after print script show input boxes again after 2 sec
        function showInputBox() {
            $('.inputBox').show();
        }
    });

</script>
@endsection
