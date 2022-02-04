<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
  

    <div class="row mb-3">
        <div class="col-md-12 text-center">
            <h3 class="text-center mb-3">{{$hospital_name}}</h3>
            <img src="{{$hospital_logo}}" alt="" style="width:80px;height:40px;" class="mb-3">
            <p style="font-size:14px;"><strong>Address::{{$hospital_address}}</strong></p>
            <p style="font-size:14px;"><strong>Email:{{$hospital_email}},&nbsp;Phone:{{$hospital_phone}}</strong></p>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-md-6 text-left">Patient Name: {{$patient_name}}</div>
        <div class="col-md-6 text-right">Prescribed Date: {{$date}}</div>
    </div>
    <div class="row mb-2">
        <table class="table">
            <tr>
                <th>Symptoms:</th>
                <td>{{$symptoms}}</td>
            </tr>
            <tr>
                <th>Disease:</th>
                <td>{{$disease}}</td>
            </tr>
            <tr>
                <th>Medicine:</th>
                <td>{{$medicine}}</td>
            </tr>
            <tr>
                <th>Procedure to take:</th>
                <td>{!! $procedure !!}</td>
            </tr>
        </table>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p><strong>Prescribed by:&nbsp;</strong>{{$doctor_name}}</p>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>
</html>