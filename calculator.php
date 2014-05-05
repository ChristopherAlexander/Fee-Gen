<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="TeamBuilder is a technical staffing agency. Their team is made from experienced professions who have hands on experience in the IT industry for which they recruit. Each candidate presented to you comes with the guarantee that they were hand picked, we met them in person and drilled into their experience, and that they will come to your table ready for the position you have open. No more resume filtering or passing the weight of finding talent to your team. TeamBuilder builds technical teams."/>
    <title>TeamBuilder</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
     <link href="../css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../css/teambuilder-new.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="http://www.teambuildergroup.com/teambuilder-ico.png">
    <link rel="shortcut icon" type="image/png" href="http://www.teambuildergroup.com/teambuilder-ico.png">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php
  if (!empty($_POST['calculate-button']))
  {
    //echo "<strong>data passed...</strong> </br>";
    $pay_rate =  addslashes(trim($_POST['pay-rate']));
    $bill_rate =  addslashes(trim($_POST['bill-rate']));
    $tax_burden =  addslashes(trim($_POST['tax-burden']));
    $contractors_num =  addslashes(trim($_POST['contractors-num']));
    /*
    echo "pay rate: " . $pay_rate . "</br>";
    echo "bill rate: " . $bill_rate . "</br>";
    echo "tax rate: " . $tax_burden . "%</br>";
    echo "number of contractors: " . $contractors_num."</br>";
    */

    $tax_burden_percent   = $tax_burden / 100;
    $burden_amount        = $tax_burden_percent * $pay_rate;
    $gross_margin_amount  = $bill_rate - ($pay_rate + $burden_amount);
    $gross_margin_percent = ($gross_margin_amount / $bill_rate ) * 100;
    $mark_up              = (($bill_rate/$pay_rate)-1) * 100;

    $hours_in_day         = 8;
    $hours_in_week        = $hours_in_day * 5;
    $hours_in_month       = $hours_in_week * 4;
    $hours_in_year        = 2080;

    $gm_day               = $gross_margin_amount * $hours_in_day;
    $gm_week              = $gross_margin_amount * $hours_in_week;
    $gm_month             = $gross_margin_amount * $hours_in_month;
    $gm_year              = $gross_margin_amount * $hours_in_year;

    $annual_revenue       = $bill_rate * $hours_in_year;

    //mail ( "embassy50@gmail.com", "I am the subject line", "I am the message" );
    /*
    echo "Gross Margin Dollar: $". $gross_margin_amount."</br>";
    echo "Gross Margin Percent: ". $gross_margin_percent."%</br>";
    echo "Markup: ".$mark_up."%</br>";
    echo "Gross Margin Day: $".$gm_day."</br>";
    echo "Gross Margin Week: $".$gm_week."</br>";
    echo "Gross Margin Month: $".$gm_month."</br>";
    echo "Gross Margin Year: $".$gm_year."</br>";

    echo "Annual Revenue: $". $annual_revenue;
    */
  }
?>
    <form id="calculator-data" name="calculator-form" method="post">
    <div class="hero-unit">
          <div class="row">
      <div class="span2"># Contractors:</div>
      <div class="span2"><input name="contractors-num" type="text" value="1"/></div>
    </div>
    <div class="row">
      <div class="span2">Pay Rate:</div>
      <div class="span2"><input name="pay-rate" type="text" value="<?php echo $pay_rate; ?>"></input></div>
    </div>
    <div class="row">
      <div class="span2">Bill Rate:</div>
      <div class="span2"><input name="bill-rate" type="text" value="<?php echo $bill_rate; ?>"></input></div>
    </div>
    <div class="row">
      <div class="span2">Tax Burden:</div>
      <div class="span2"><input name="tax-burden" type="text" value="15">%</div>
    </div>

    </br>
    <div class="row">
      <div class="span2">Gross Margin Dollar</div>
      <div class="span2">$<?php echo number_format((float)$gross_margin_amount, 2, '.', ''); ?></div>
    </div>
    <div class="row">
       <div class="span2">Gross Margin</div>
        <div class="span2"><?php echo $gross_margin_percent ?>%</div>
    </div>
    <div class="row">
      <div class="span2">Mark Up</div>
      <div class="span2"><?php echo number_format((float)$mark_up, 2, '.', ''); ?>%</div>
    </div>
    </br>
    <div class="row">
      <div class="span2">Gross Margin Day</div>
      <div class="span2">$<?php echo number_format((float)$gm_day, 2, '.', ''); ?></div>
    </div>
    <div class="row">
      <div class="span2">Gross Margin Week</div>
      <div class="span2">$<?php echo number_format((float)$gm_week, 2, '.', ''); ?></div>
    </div>
    <div class="row">
      <div class="span2">Gross Margin Month</div>
      <div class="span2">$<?php echo number_format((float)$gm_month, 2, '.', ''); ?></div>
    </div>
    <div class="row">
      <div class="span2">Gross Margin Year</div>
      <div class="span2">$<?php echo number_format((float)$gm_year, 2, '.', ''); ?></div>
    </div>
  </br>
  <div class="row">
      <div class="span2">Annual Revenue</div>
      <div class="span2">$<?php echo number_format((float)$annual_revenue, 2, '.', ''); ?></div>
    </div>
  </br>
    <div class="row">
    <div class="span2"><input name="calculate-button" type="submit" value="calculate"/></div>
  </div>
  </div>
  </form>
  </body>
  </html>