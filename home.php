<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link href="css/bootstrap.css" media="all" type="text/css" rel="stylesheet">
      <style>
      input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}     
      </style>
</head>
<body class="container">
<!--Form Main Div Contaier Start-->
<div class="container-fluid mt-5">
<Form  method="POST">
      <div class="mb-3">
            <label class="form-label">Number of Lecture </label>
            <input name="number_of_lecture" id="number_of_row" type="text" required  data-bv-integer="true"     data-bv-integer-message="The value is not an integer"   class="w-25 form-control" placeholder="Enter Number 1 to 7">
      </div>
      <div class="mb-3">
            <label  class="form-label">Start Time of TimeTable </label>
            <input name="start_time" id="start_time" type="time" class="w-25 form-control" >
      </div>
      <Container id="wrapper">
      </Container>
<p>
      <!-- <div class="mb-3">
            <label  class="form-label">Each Leacture Time </label>
            <input name="start_time" type="tel"  pattern="[0-9]{5}" class="w-25 form-control" >
      </div> -->
       <div style="width: 350px;">
            <input name="submit" id="create_table" type="button" class="w-25 btn btn-success form-control"  value="Submit" >
      </div>
</Form>

<table class="table table-dark mt-5" >
      <thead>
            <tr>
                  <th scope="col">No</th>
                  <th scope="col">Time</th>
                  <th scope="col">Mon</th>
                  <th scope="col">Tue</th>
                  <th scope="col">Wen</th>
                  <th scope="col">Thu</th>
                  <th scope="col">Fri</th>
                  <th scope="col">Sat</th>
            </tr>
      </thead >
      <tbody id="table">
      </tbody>
</table>
</div>
<!--Form Main Div Contaier End-->


<!--------------------------Script Files added -------------------------------->

      <script src="JS/bootstrap.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
<script src="JS/jquery.js"></script>
<!--------------------------Script Code -------------------------------->
<script>
//Disable Wirting in number text filed

//Dynamicly create table
            //Code Start
              function createTable() {
                  var table=document.getElementById('table');
                  var column=8;
                  var row=document.getElementById("number_of_row").value;
                  table.innerHTML="";
                  for (var rowIndex=0; rowIndex<row;rowIndex++){  
                        var tr=document.createElement('tr');
                        for(var colIndex=0; colIndex<column;colIndex++){
                             
                    
                               var td=document.createElement('td');
                               if(colIndex==0){
                                    var text= document.createTextNode(rowIndex+1);
                               }
                               else if(colIndex==1){
                                      var value=document.getElementById('start_time').value+20;
                                     var text= document.createTextNode(value);
                                                
                               }
                              else if(colIndex>1){
                                     var value=document.getElementById('subject'+rowIndex+'').value;
                                     var text= document.createTextNode(value);
                               }
                               else{
                                     var text= document.createTextNode("-");
                               }
                              

                              td.appendChild(text);
                              tr.appendChild(td);     
                             
                        }
                        table.appendChild(tr);
                  }
            }
      
      document.getElementById('create_table').addEventListener("click",createTable);
          

            //Code End



//Enter Number and add textfield automaticaly

 $(document).ready(function () {
       
    $(number_of_row).keyup(function () {
      var value=parseInt($(number_of_row).val());
      if(value<0){
            alert("Please Enter 1 to 7");
            $(number_of_row).val(1);
      }
      else if( value >7){
            alert("Please Enter 1 to 7");
            $(number_of_row).val(1);
      }
      else if(value>0 && value <8){
            $(wrapper).html('');
            for(var i=0;i<value;i++){
                  $(wrapper).append('<div><input type="text" id="subject'+i+'" name="subject'+i+'" value="sub'+(i+1)+'"/></div>'); //add input box
                
            }

      }
      else{
           alert("Please Enter valid value"); 
      
      }
      
    });
  });






</script>
</body>
</html>