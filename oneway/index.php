
<html>
<head>
    <meta charset="UTF-8">
    <title>Booking Testing</title>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places"></script>
    <script type="text/javascript" src="google_autocomplete.js"></script>
    <style>
        .textbox, .cabbing {
            display:block;
            width:250px;
            height:30px;
            font-size: 16px;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .mycontainer {
            margin-top: 100px;
            padding:20px;
        }

    </style>
</head>
<body>
<div class="mycontainer">
    <div class="form col-md-4">
        <input type="text" name="" class="textbox" id="pickup-one" placeholder="Source">
        <input type="text" name="" class="textbox" id="drop-one" placeholder="Destination">
        <select class="cabbing" id="cab_type">
            <option value="suv">SUV</option>
            <option value="sedan">Sedan</option>
        </select>

        <button type="button" id="submit" value="">Book Now</button>
    </div>

    <div class="request col-md-4" id="request">
        <table class="table table-striped">
            <tbody>
            <tr>
                <td>From</td>
                <td id="from"></td>
            </tr>
            <tr>
                <td>To</td>
                <td id="to"></td>
            </tr>
            <tr>
                <td>Cab Type</td>
                <td id="cab"></td>
            </tr>
            <tr>
                <td>Coupon</td>
                <td id="c"></td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="respose col-md-4">
        <table class="table table-striped">
            <tbody>
            <tr>
                <td>Booking Id</td>
                <td id="booking_id"></td>
            </tr>
            <tr>
                <td>Price</td>
                <td id="price"></td>
            </tr>
            <tr>
                <td>Distance</td>
                <td id="distance"></td>
            </tr>
            <tr>
                <td>Duration</td>
                <td id="duration"></td>
            </tr>
            </tbody>
        </table>
    </div>

</div>

<script>

    $('#submit').click(function () {

        var source = $('#pickup-one').val();
        var destination = $('#drop-one').val();
        var cab_type = $("#cab_type").val();
        var days = $("#days").val();

        var Data = {
            source: source,
            destination : destination,
            journey_type: "oneway",
            preference: cab_type,
            waypoints : "NA",
            days : 0,
            coupon : "NA"
        };
        var URL = 'http://52.33.92.172/v1/tmp/booking/';
        $.post(URL, Data , function(data) {

            $('#from').html(source);
            $('#to').html(destination);
            $('#cab').html(cab_type);
            $('#c').html('Not Avalible');

            $('#booking_id').html(data['payload']['booking_id']);
            $('#price').html(data['payload']['total_price']);
            $('#distance').html(data['payload']['total_distance']);
            $('#duration').html(data['payload']['duration']);
        });
    })

</script>
</body>
</html>