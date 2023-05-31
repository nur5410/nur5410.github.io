<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Converter with jQuery</title>
</head>
<style>
    .container {
  width: 85%;
  margin: 0 auto;
  padding: 20px;
}


.clear{
    width: 45px;
    height: 30px;
    background: black;
    color: white;
    padding: 5px;
}


.mes-table{
    background-color: cornsilk;
    padding: 40px;
}
.input{
    height: 30px;
    width:120px;
}
.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
}

input[type="text"] {
  padding: 10px;
  font-size: 16px;
  border-radius: 4px;
  border: 1px solid #ccc;
  width: 200px;
}

.hide{
    display:none;
}

</style>
<body>
  <div class="container">
    <h2>MeasureEase: Effortless Conversion of Distance, Weight, and Speed Units</h2>
    <p>Select</p>
    <select class="input">
        <option value=0>--Select--</option>
         <option value=1>Distance</option>  
         <option value=2>Weight</option> 
         <option value=3>Speed</option> 
    </select>
    <button class="clear">Clear</button>
    
    
    <div class="mes-table">
        <div class="distance hide">
            <div class="form-group">
                <label for="km">Kilometer:</label>
                <input type="text" id="km" name="km" value="0">
            </div>

            <div class="form-group">
                <label for="miles">Miles:</label>
                <input type="text" id="miles" name="miles">
            </div>

            <hr>

            <div class="form-group">
                <label for="meter">Meter:</label>
                <input type="text" id="meter" name="meter">
            </div>

            <div class="form-group">
                <label for="feet">Feet:</label>
                <input type="text" id="feet" name="feet">
            </div>

        </div>

        <div class="weight hide">
            <div class="form-group">
                <label for="gram">Gram:</label>
                <input type="text" id="gram" name="gram" value="0">
            </div>

            <div class="form-group">
                <label for="kg">Kilogram:</label>
                <input type="text" id="kg" name="kg" value="0">
            </div>


            <div class="form-group">
                <label for="pound">Pound:</label>
                <input type="text" id="pound" name="pound">
            </div>

            <div class="form-group">
                <label for="ct">Carat:</label>
                <input type="text" id="ct" name="ct">
            </div>

            <div class="form-group">
                <label for="mt">Metric Tonne:</label>
                <input type="text" id="mt" name="mt">
            </div>
        </div>

        <div class="speed hide">
            <div class="form-group">
                <label for="km-speed">Kilometer:</label>
                <input type="text" id="km-speed" name="km-speed" value="0">
            </div>

            <div class="form-group">
                <label for="miles-speed">Miles:</label>
                <input type="text" id="miles-speed" name="miles-speed">
            </div>
            <hr>

            <div class="form-group">
                <label for="time-h">Time (hour):</label>
                <input type="text" id="time-h" name="time-h">
            </div>

            <div class="form-group">
                <label for="time-m">Time (minute):</label>
                <input type="text" id="time-m" name="time-m">
            </div>

            <hr>

            <div class="form-group">
                <label for="mps">meter/s:</label>
                <input type="text" id="mps" name="mps" disabled>
            </div>

            <div class="form-group">
                <label for="kmph">kmph:</label>
                <input type="text" id="kmph" name="kmph" disabled>
            </div>

            
            <div class="form-group">
                <label for="mph">mph:</label>
                <input type="text" id="mph" name="mph" disabled>
            </div>


        </div>


                
    </div>

  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
$(document).ready(function() {


    $('select.input').on('change', function(){
        var option = $(this).val();
        console.log(option);
        switch(option){
            case "1":
                {
                    $('.distance').removeClass("hide");
                    $('.weight').addClass("hide");
                    $('.speed').addClass("hide");
                    break;
                }
            case "2":
            {
                    $('.distance').addClass("hide");
                    $('.weight').removeClass("hide");
                    $('.speed').addClass("hide");
                    break;
            }
            case "3":
            {
                    $('.distance').addClass("hide");
                    $('.weight').addClass("hide");
                    $('.speed').removeClass("hide");
                    break;
            }
            default:
            {
                    $('.distance').removeClass("hide");
                    console.log("hi");
                    break;
                }
        }
    })

    $('#km').on('keyup', function() {
         var km = $(this).val();
         // 1 km = 0.62137119 miles
         // 1 feet = 0.3048 meter
         // 1 meter = 3.28084 feet
         var miles = 0.62137119 * km;
         var meter = 1000 * km;
         var feet = 3.28084 * meter
         $('#miles').val(miles);
         $('#meter').val(meter);
         $('#feet').val(feet);

    });

    $('#miles').on('keyup', function() {
         var miles = $(this).val();
         var km = 1.609344 * miles;
         var meter = 1000 * km;
         var feet = 3.28084 * meter

         $('#km').val(km);
         $('#meter').val(meter);
         $('#feet').val(feet);


    });

    $('#meter').on('keyup', function() {
         var meter = $(this).val();
         var km = 0.001 * meter;
         var miles = 0.62137119 * km;
         var feet = 3.28084 * meter
         $('#km').val(km);
         $('#miles').val(miles);
         $('#feet').val(feet);


    });

    $('#feet').on('keyup', function() {
         var feet = $(this).val();
         var meter = 0.3048 * feet;
         var km = 0.001 * meter;
         var miles = 0.62137119 * km;
         $('#km').val(km);
         $('#miles').val(miles);
         $('#meter').val(meter);


    });


    $('#gram').on('keyup', function() {
         var gram = $(this).val();
         var kg = 0.001 * gram;
         var pound = 0.45359237 * kg;
         var carat = gram / 0.2;
         var mt = kg / 1000;
         $('#kg').val(kg);
         $('#pound').val(pound);
         $('#ct').val(carat);
         $('#mt').val(mt);


    });

    $('#kg').on('keyup', function() {
         var kg = $(this).val();
         var gram =  kg * 1000;
         var pound = 0.45359237 * kg;
         var carat = gram / 0.2;
         var mt = kg / 1000;
         $('#gram').val(gram);
         $('#pound').val(pound);
         $('#ct').val(carat);
         $('#mt').val(mt);

    });

    $('#pound').on('keyup', function() {
         var pound = $(this).val();
         var kg = pound / 2.2046;
         var gram =  kg * 1000;
         var carat = gram / 0.2;
         var mt = kg / 1000;
         $('#gram').val(gram);
         $('#kg').val(kg);
         $('#ct').val(carat);
         $('#mt').val(mt);

    });

    
    $('#ct').on('keyup', function() {
         var carat = $(this).val();
         var gram =  carat * 0.2;
         var kg = gram / 1000;
         var pound = 0.45359237 * kg;
         var mt = kg / 1000;
         $('#gram').val(gram);
         $('#kg').val(kg);
         $('#pound').val(pound);
         $('#mt').val(mt);

    });

    $('#mt').on('keyup', function() {
         var mt = $(this).val();
         var kg = mt * 1000;

         var gram =  kg * 1000;
         var pound = 0.45359237 * kg;
         var ct = gram / 0.2;
         $('#gram').val(gram);
         $('#kg').val(kg);
         $('#pound').val(pound);
         $('#ct').val(ct);

    });


    $('#km-speed').on('keyup', function() {
         var km = $(this).val();
         var miles = 0.62137119 * km;
         var time_h = $('#time-h').val();
         var time_m = $('#time-m').val();
         var kmph;
         var mps;
         var mph;

         console.log(time_h);
         $('#miles-speed').val(miles);

         if(time_h !== '' || time_m !== ''){
            kmph = km / ((time_h)?time_h:(time_m * 60));
            mps = (km * 1000) / ((time_h)?time_h * 60 :(time_m * 60 * 60));
            mph = miles / ((time_h)?time_h:(time_m * 60));
            $('#kmph').val(kmph);
            $('#mps').val(mps);
            $('#mph').val(mph);

         }

    });


    $('#miles-speed').on('keyup', function() {
         var miles = $(this).val();
         var km = 1.609344 * miles;
         var time_h = $('#time-h').val();
         var time_m = $('#time-m').val();
         var kmph;
         var mps;
         var mph;


         console.log(time_h);
         $('#km-speed').val(km);

         if(time_h !== '' || time_m !== ''){
            kmph = km / ((time_h)?time_h:(time_m * 60));
            mps = (km * 1000) / ((time_h)?time_h * 60 :(time_m * 60 * 60));
            mph = miles / ((time_h)?time_h:(time_m * 60));

            $('#kmph').val(kmph);
            $('#mps').val(mps);
            $('#mph').val(mph);

         }

    });


    $('#time-h').on('keyup', function(){
        var time_h = $(this).val();
        var time_m = time_h * 60;
        var miles = $('#miles-speed').val();
        var km = ($('#km-speed').val()) ? $('#km-speed').val() : (1.609344 * miles);
        
        var kmph;
        var mps;
        var mph;

        $('#time-m').val(time_m);
        if(time_h !== '' || time_m !== ''){
            kmph = km / ((time_h)?time_h:(time_m * 60));
            mps = (km * 1000) / ((time_h)?time_h * 60 :(time_m * 60 * 60));
            mph = miles / ((time_h)?time_h:(time_m * 60));

            $('#kmph').val(kmph);
            $('#mps').val(mps);
            $('#mph').val(mph);

         }

    })

    $('#time-m').on('keyup', function(){
        var time_m = $(this).val();
        var time_h = time_m / 60;
        var miles = $('#miles-speed').val();
        var km = ($('#km-speed').val()) ? $('#km-speed').val() : (1.609344 * miles);
        
        var kmph;
        var mps;
        var mph;

        $('#time-h').val(time_h);
        if(time_h !== '' || time_m !== ''){
            kmph = km / ((time_h)?time_h:(time_m * 60));
            mps = (km * 1000) / ((time_h)?time_h * 60 :(time_m * 60 * 60));
            mph = miles / ((time_h)?time_h:(time_m * 60));

            $('#kmph').val(kmph);
            $('#mps').val(mps);
            $('#mph').val(mph);

         }

    })

    $('#time-m').on('keyup', function(){
        var time_m = $(this).val();

        var time_m = time_m / 60;

        $('#time-h').val(time_m);
    })

    $('.clear').on("click", function(){
        $('.mes-table').find('input').val('');

    })

});

</script>
</body>
</html>
