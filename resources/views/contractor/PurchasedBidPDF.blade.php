<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PLBPPA</title>
</head>
<body>
    <div>
        <center>
            <h1>Plateau State <br> Bureau of Public Procurement</h1>
            <div>
                <p > Plateau State Procurement Database of particulars, consultants and service providers.</p>
                <div style="padding-top: 30px;">
                <h4>TENDER DOCUMENT</h4>
                <p >This is to acknowledge the expression of interest by :</p>
                </div>
               
            </div>
        </center>
        <section  style="margin: 30px;">
        <div>
            <h2 style="border-bottom: 1px solid #eee; margin: 40px;">{{$user->name}}</h2>
            <p style="text-align:justify"> in the Tender as captured below:</p>
        </div>
        <div style=" margin-top: 30px;">
            <p><b> Transaction ID: {{'#'.$data->transaction_id}}</b></p>
            <p><b> Lot : {{$data->lot_description}}</b></p>
            <p><b> MDA : {{$data->mda_name}}</b></p>
            <p><b> Fee: {{number_format($data->amount)}} NGN</b></p>
            <p><b> Payment Status: {{$data->payment_status}} NGN</b></p>
            <p><b> Payment Date: {{$data->payment_date}}</b></p>
        </div>
        <center>
            <div style="font-size: 20px; border-bottom: 1px solid #eee; margin-top: 60px;">
                <div style="margin-top: 30px;">
                    <p>This Document was submitted on {{$data->created_at}}</p>
                </div>
            </div>
        </center>
        
    </div>
</section>
</body>
</html>