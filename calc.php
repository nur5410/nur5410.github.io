<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Calculator</title>
</head>

<style>
        .calc{
            padding: 30px;
            border: red 1px solid;
            width: 255px;
            background-color: cornsilk;

        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* Create equal columns */
            grid-gap: 10px; /* Add a gap between grid items */
            width:25%;
        }
        
        .grid-item {
            background-color: #eaeaea;
            padding: 15px;
            text-align: center;
            width: 55px;
            font-size: 18px;
            border-radius: 10px;

        }
        .editor{
            background: aliceblue;
            height: 50px;
            width: 98%;
            margin-bottom: 10px;
            padding: 6px;
            font-size: 38px;
        }
       
        </style>
            
        <div class="calc">
            <input class="editor">
             <div class="grid-container">
                <button class="grid-item">Del</button>
                <button class="grid-item">(</button>
                <button class="grid-item">)</button>
                <button class="grid-item">^</button>

                <button class="grid-item">1</button>
                <button class="grid-item">2</button>
                <button class="grid-item">3</button>
                <button class="grid-item">*</button>

                <button class="grid-item">4</button>
                <button class="grid-item">5</button>
                <button class="grid-item">6</button>
                <button class="grid-item">/</button>

                <button class="grid-item">7</button>
                <button class="grid-item">8</button>
                <button class="grid-item">9</button>
                <button class="grid-item">-</button>

                <button class="grid-item">C</button>
                <button class="grid-item">0</button>
                <button class="grid-item">=</button>
                <button class="grid-item">+</button>
            </div>
        </div>
    </body>
    </html>
        <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
        <script>
           $(".grid-item").on("click", function() {
                var buttonText = $(this).text();
                // console.log(buttonText);

                var $editor = $(".editor");
                if (buttonText !== "=" && buttonText !== "C" && buttonText !== "Del") {
                    $editor.val($editor.val() + buttonText);
                } else if (buttonText === "C") {
                    $editor.val('');
                } else if (buttonText === "Del") {
                    $editor.val( $editor.val().slice(0,-1));
                } else {
                    var expression = $editor.val().trim();

                    try {
                        // console.log(eval(Sin(30)))

                        expression  = expression.replace(/\^/g, '**');
                     
                        var result = eval(expression);
                        $editor.val(result);
                    } catch (error) {
                        $editor.val("Invalid Input");
                    }
                }
            });

        </script>