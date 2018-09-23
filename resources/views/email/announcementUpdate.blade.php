<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            text-align: center;
        }

        #header {
            background: #D41B29;
            color: white;
        }
    </style>
</head>

<body style="text-align: center;">
    <div id="emailBody">
        <div id="header" style="background: #D41B29; color: white;">
            <h1>UOL Student Portal</h1>
        </div>
        <div id="content">
            <h4><b>Hi There!
        <br>
        You have a new notification from {{ $announcementMakerName }}
      </b></h4>
            <br/>
            <b>{{ $announcementTitle }}</b>
        </div>
    </div>
</body>

</html>
