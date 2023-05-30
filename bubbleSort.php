<!DOCTYPE html>
<html>
<head>
  <title>Sorting Algorithm with jQuery</title>
</head>
<style>
    .container {
  width: 85%;
  margin: 0 auto;
  padding: 20px;
}

.bars {
  display: flex;
  justify-content: flex-start;
}

.bar {
  width: 20px;
  height: 100px;
  background-color: #333;
  margin-right: 5px;
}
.sort, .clear{
    width: 45px;
    height: 30px;
    background: black;
    color: white;
    padding: 5px;
}

.grid-container, .grid-container-sorted, .grid-container-unsorted{
    /* margin-top: 30px; */
    margin-bottom: 40px;

    display: flex;
    align-items: flex-end;

}

.grid-item {
            background-color: #eaeaea;
            /* padding: 10px; */
            text-align: center;
            width: 45px;
            font-size: 12px;
            border-radius: 10px;

        }
/* .grid-container-unsorted{
    margin-bottom: 30px;
    display: flex;
    align-items: flex-end;

} */

.grid-container-unsorted-tree, .grid-container-sorted-tree{
    margin-top: 30px;
    display: flex;
    align-items: flex-end;

}
.sort-table{
    background-color: cornsilk;
    padding: 40px;
}
.input-array{
    height: 24px;
    margin: 20px;
}
.aqua{
    background-color: aqua;
}

.green{
    background-color: #c3ffc3;
}
.tree{
    border-radius: 0;
}
</style>
<body>
  <div class="container">
    <h2>Bubble Sort Algorithm Visualization</h2>
    <p>Enter the array (Comma separated)</p>
    <input type="text" class="input-array">
    <button class="sort">Sort</button>
    <button class="clear">Clear</button>
    <div class="sort-table">
            
    



<div class="grid-container-sorted">
          
</div>
    </div>


  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
$(document).ready(function() {



    function bubbleSort(arr){
        var tmp_arr;
        $('.sort-table').empty();
        var cell;
        var cell2;
        var unsorted = $('<div class="grid-container-unsorted"></div>');        
        var unsorted_tree = $('<div class="grid-container-unsorted-tree"></div>');

        var max = Math.max(...arr);


        $.each(arr, function(index, value){
            var p_value = (value/max) * 100;
        cell2 = $('<button class="grid-item tree" id="id'+value+'">' + value + '</button>');
        cell = $('<button class="grid-item">' + value + '</button>');
        // console.log($('#id'+value));
        

        unsorted_tree.append(cell2);
        unsorted.append(cell);
        $(cell2).css("height", p_value);
        // $('.grid-tree').css("width", "300px");

        });

        $('.sort-table').append(unsorted_tree);
        $('.sort-table').append(unsorted);

        var n = arr.length;
        var i, j, temp;
        var swapped;
        var sort_grid = $('<div class="grid-container-sorted"></div>');


        for (i = 0; i < n - 1; i++)
        {

            swapped = false;    
            for (j = 0; j < n - i - 1; j++)
            {            
                tmp_arr = [...arr];
                var sorting_grid = $('<div class="grid-container-sorting"></div>');
                if (arr[j] > arr[j + 1])
                {
                    // Swap arr[j] and arr[j+1]
                    temp = arr[j];
                    arr[j] = arr[j + 1];
                    arr[j + 1] = temp;
                    swapped = true;
                }
                if(swapped){
                    
                    $.each(arr, function(index, value){
                        if(value === tmp_arr[index]){
                            cell = $('<button class="grid-item">' + value + '</button>');

                            sorting_grid.append(cell);
                        }else{
                            cell = $('<button class="grid-item aqua">' + value + '</button>');
                            sorting_grid.append(cell);
                        }
                    
                        })
                    if(tmp_arr[j] !== arr[j]){
                        $('.sort-table').append('<div class="index-check">Swapped index: '+ j +','+(j+1)+ '</div>');
                    }else{
                        $('.sort-table').append('<div class="index-check">Already sorted: '+ j +','+(j+1)+ '</div>');

                    }
                    $('.sort-table').append(sorting_grid);
                    $('.sort-table').append('<br>');
                }
                
            }
          
            // IF no two elements were
            // swapped by inner loop, then break
            if (swapped == false)
            break;
        }

        console.log(arr)
        var sorted_tree = $('<div class="grid-container-sorted-tree"></div>');

        $.each(arr, function(index, value){
            var p_value = (value/max) * 100;

            cell2 = $('<button class="grid-item tree" id="id'+value+'">' + value + '</button>');
            cell = $('<button class="grid-item green">' + value + '</button>');

            sorted_tree.append(cell2);
            sort_grid.append(cell);
            $(cell2).css("height", p_value);

        })
        $('.sort-table').append(sorted_tree);
        $('.sort-table').append(sort_grid);
        // return arr;
    }
    



    $('.sort').on("click", function(){
        var arr = $('.input-array').val();
        var array = arr.split(',').map(function(item) {
        return parseInt(item, 10);
        });
        bubbleSort(array);

    })

    
    $('.clear').on("click", function(){
        $('.sort-table').empty();

    })

});

  </script>
</body>
</html>
