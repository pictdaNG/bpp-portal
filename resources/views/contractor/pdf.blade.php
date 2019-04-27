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
            <h1>Plateau State <br> Public Procurement Agency</h1>
            <div>
                <p > Plateau State Bureau of Public Procurement Database of particulars, consultants and service providers.</p>
                  <div style="padding-top: 30px;">
                      <h4>Interim Registration Report (IRR)</h4>
                      <p >This is to acknowledge the ongoing registration of:</p>
                  </div>
               
            </div>
        </center>
        <section  style="margin: 30px;">
        <div>
            <h2 style="border-bottom: 1px solid #eee; margin: 40px;">{{$user->name}}</h2>
            <p style="text-align:justify"> In the Plateau State Bureau of Public Procurement Database of particulars, categorization and classification of contractors, consultants
                consultants and service poviders as follows:</p>
        </div>
        <div style=" margin-top: 30px;">
            <p><b> Registration Type: {{$certification}}, {{$category}}</b></p>
            <p><b> Temporary Contractor ID: Nil</b></p>
            <p><b> Date Of Registration: {{now()}}</b></p>
        </div>
        <div style="font-size: 20px; border-bottom: 1px solid #eee; margin-top: 60px;">
            <p>This Report serves as evidence of Interim Registration with the Plateau State Bureau of Public Procurement Database 
                while the claim/information provided by the company is being verified </p>

                <div style="margin-top: 40px;">
                    <p>This report is valid till 31ist December, 2019</p>
                </div>
        </div>
        
    </div>
</section>
</body>
</html>