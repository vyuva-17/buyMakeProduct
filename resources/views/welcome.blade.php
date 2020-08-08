<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Buy/Make Product</title>
      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
      <!--bootstarp Header-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <!--jquery Header-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <!-- Styles -->
      <style>
      </style>
   </head>
   <body>
   <!--container of the form content-->
      <div class="container">
         <h1 style="text-align:center; color:#2e6da4; margin-bottom:2%;">Buy/Make Product</h1>
         <form action = "/create" method = "post">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
            <div class="form-group  row" style="margin-bottom:2%;">
               <span  class="col-lg-5"></span>
               <span class="col-lg-6">
               Transaction
                    <label class="radio-inline">
                            <input type="radio" id="buy" onchange="radiocheck()" name="buy_make" value="buy" checked>Buy
                    </label>
                    <label class="radio-inline">
                            <input type="radio" id="make" onchange="radiocheck()" value="make" name="buy_make">Make
                    </label>
               </span>
            </div>
            <div class="form-group form-inline row">
               <span class="col-lg-1"></span>
               <span class="col-lg-6"  style="text-align: end">
                    <label class="col-lg-4" for="grosswt">GRSWT:</label>
                    <input type="text" class="form-control col-lg-6" name ="grosswt" onchange="netWt()" id="grosswt">
               </span>
               <span class="col-lg-3">
                    <label class="col-lg-3" for="pure">Pure:</label>
                    <input type="text" class="form-control col-lg-6" name ="pure" id="pure">
               </span>
            </div>
            <div class="form-group form-inline row">
               <span class="col-lg-1"></span>
               <span class="col-lg-6"  style="text-align: end">
                    <label class="col-lg-4" for="pcs">Pcs:</label>
                    <input type="text" class="form-control col-lg-6" onchange="totalCalculation();" name ="pcs" id="pcs">
               </span>
               <span class="col-lg-3">
                    <label class="col-lg-3" for="rate">Rate:</label>
                    <input type="text" class="form-control col-lg-6" onchange="totalCalculation();" name ="rate" id="rate">
               </span>
            </div>
            <div class="form-group form-inline row">
               <span class="col-lg-1"></span>
               <span class="col-lg-5" style="text-align: end">
                    <label class="col-lg-6" for="qs">Quantity Selection:</label>
                    <select class="form-control col-lg-6" onchange="purwtCalculation();totalCalculation()" name ="qs" id="qs">
                        <option>Gms</option>
                        <option id="dpcs">Pcs</option>
                    </select>
               </span>
               <span class="col-lg-6"  style="text-align: end">
                    <label class="col-lg-3" for="ms">Make Selection:</label>
                    <select class="form-control col-lg-3" name ="ms" id="ms">
                        <option>Loss</option>
                        <option>Labour Changes</option>
                    </select>
                    <input type="text"  class="form-control col-lg-4" onchange="purwtCalculation();" name ="msvalue" id="msvalue">
               </span>
            </div>
            <div class="form-group form-inline row">
               <span class="col-lg-1"></span>
               <span class="col-lg-6"  style="text-align: end">
                    <label class="col-lg-4" for="purewt">PureWT:</label>
                    <input type="text" readonly class="form-control col-lg-6" onchange="purwtCalculation();" name ="purewt" id="purewt">
               </span>
               <span class="col-lg-3">
                    <label class="col-lg-3" for="netwt">NetWt:</label>
                    <input type="text" readonly class="form-control col-lg-6" onchange="purwtCalculation();totalCalculation();" name ="netwt" id="netwt">
               </span>
            </div>
            <div class="form-group form-inline row">
               <span class="col-lg-1"></span>
               <span class="col-lg-6"  style="text-align: end">
                    <label class="col-lg-4" for="total">Total:</label>
                    <input type="text" readonly class="form-control col-lg-6" name ="total" id="total">
               </span>
            </div>
            <button type="submit" style="display: block; margin: 0 auto;" class="btn btn-primary mb-2">Confirm</button>
         </form>
      </div>
      <script>
         var transaction_value;
         /*onload functionality to check the radio button value and change the functionality */
         window.addEventListener("load",()=>{
             radiocheck();
         });
         /*radio check functionality to change the field and value for make and buy the products */
         function radiocheck(){
             if (document.getElementById('buy').checked) {
                 transaction_value = document.getElementById('buy').value;
             } else {
                 transaction_value = document.getElementById('make').value;
             }
             if(transaction_value == "buy"){
                 $('#ms').attr('disabled','disabled');
                 $('#msvalue').attr('disabled','disabled');
                 $("#dpcs").removeAttr('disabled');
                 $('#purewt').val(0);
             } else {
                 $('#dpcs').attr('disabled','disabled');
                 $("#ms").removeAttr('disabled');
                 $('#msvalue').removeAttr('disabled');
             }
         }
         /*gwt value is assigned to netwt */
         function netWt(){
             $('#netwt').val($('#grosswt').val())
         }
         /*totalvalue calculation for both  buy and make */
         function totalCalculation(){
             if($('#qs').val().toLowerCase()=='pcs'){
                 $('#total').val($('#pcs').val() * $('#rate').val())

             } else if($('#qs').val().toLowerCase()=='gms'){
                 $('#total').val($('#netwt').val() * $('#rate').val())
             }
         }
         /*pureweight calculation for make products */
         function purwtCalculation(){
             if(!$('#msvalue').attr('disabled')){
                 if($('#qs').val().toLowerCase()=='gms'){
                     $('#purewt').val((($('#pure').val() + $('#msvalue').val()) * $('#netwt').val())/100)
                 }
             }
         }


      </script>
   </body>
</html>
