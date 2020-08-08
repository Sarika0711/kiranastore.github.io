<?php

session_start();
if($_SESSION['uid'])
{
    //echo $_SESSION['uid'];
}
else
{
    header('location:clogin.php');
}
?>

<?php
include('access.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  
         <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
          <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
           <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

         <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style >
    body { margin-top:20px; }
.panel-title {display: inline;font-weight: bold;}
.checkbox.pull-right { margin: 0; }
.pl-ziro { padding-left: 0px; }


.payment
{
  margin:70px 0px;
  padding:70px;
}
</style>
</head>


<body>
<div class="payment">
<form method="post">
<label class="align-center"><h4><b>ONLINE PAYMENT</b></h4></label>
<?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                                   $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                   }

                                   }  
                               
                          ?>  

<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Payment Details</h3>
                    <div class="checkbox pull-right">
                        <label><input type="checkbox" />Remember</label>
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form">
                    <div class="form-group">
                        <label for="cardNumber">
                            CARD NUMBER</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cardNumber" placeholder="Valid Card Number"
                                required autofocus />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7 col-md-7">
                            <div class="form-group">
                                <label for="expityMonth">EXPIRY DATE</label>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expityMonth" placeholder="MM" required />
                                </div>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expityYear" placeholder="YY" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-5 col-md-5 pull-right">
                            <div class="form-group">
                                <label for="cvCode">CV CODE</label>
                                <input type="password" class="form-control" id="cvCode" placeholder="CV" required />
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <ul class="nav nav-pills nav-stacked">
                 
                <li class="active"><a href="#"><span class="badge pull-right"><i class="fa fa-rupee"></i>
                    <?php echo number_format($total, 2); ?></span>your amount to pay </a>
                </li>
            </ul>
            <br/>
            <a href="" class="btn btn-success btn-lg btn-block" role="button">Pay</a>
        </div>
    </div>
</div>
</form>
</div>
</body>
</html>