<?php include 'assets/headernav.php'; ?>
<!-- TEST -->
<?php
require_once('dbcontroller.php');
$db_handle = new DBController;

if (!empty($_GET["action"])) {
  switch ($_GET["action"]) {
    case "add":
      if (!empty($_POST['quantity'])) {
          $productByCode = $db_handle->runQuery("SELECT * from product where ProductID='" . $_GET["ProductID"] . "'");
          $newItem = array(
              'name' => $productByCode[0]['Name'],
              'ProductID' => $productByCode[0]['ProductID'],
              'quantity' => $_POST['quantity'],
              'price' => $productByCode[0]['Price'],
              'image' => $productByCode[0]['Img'],
              'stock' => $productByCode[0]['Stock']
          );
          if (empty($_SESSION['cart_item'])) {
              $_SESSION['cart_item'] = array($productByCode[0]['ProductID'] => $newItem);
          } elseif (isset($_SESSION['cart_item'][$productByCode[0]['ProductID']])) {
              // Product already exists in cart, update quantity or show error message
              $newQuantity = $_SESSION['cart_item'][$productByCode[0]['ProductID']]['quantity'] + $_POST['quantity'];
              if ($newQuantity > $productByCode[0]['Stock']) {
                  echo "Error: Product quantity exceeds available stock.";
              } else {
                  $_SESSION['cart_item'][$productByCode[0]['ProductID']]['quantity'] = $newQuantity;
              }
          } else {
              $_SESSION['cart_item'][$productByCode[0]['ProductID']] = $newItem;
          }
      }
      break;

    case "remove":
      if (!empty($_SESSION['cart_item'])) {
        foreach ($_SESSION['cart_item'] as $k => $v) {
          if ($_GET['ProductID'] == $k) {
            unset($_SESSION['cart_item'][$k]);
          }
          if (empty($_SESSION['cart_item'])) {
            unset($_SESSION['cart_item']);
          }
        }
      }
      break;
    case "empty":
      unset($_SESSION['cart_item']);
      break;
  }
}
?>
<!-- TEST -->
<!-- Header End====================================================================== -->
<?php include 'assets/csl.php'; ?>
<?php include 'body.php'; ?>
<!-- Sidebar end=============================================== -->


<!-- Footer ================================================================== -->
<div class="container mt-5">

</div>
<div class="row">
	<div class="span12">
  <iframe style="width:100%; height:300; border: 0px" scrolling="no" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d555.5015994256885!2d100.04110486773097!3d13.819384203484333!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2e50a71b0b685%3A0xdf93630169a2205!2z4Lit4Liy4LiE4Liy4Lij4Lin4Li04LiX4Lii4Liy4Lio4Liy4Liq4LiV4Lij4LmMIDMg4LihLuC4qOC4tOC4peC4m-C4suC4geC4oyDguIgu4LiZ4LiE4Lij4Lib4LiQ4Lih!5e0!3m2!1sth!2sth!4v1678474548169!5m2!1sth!2sth" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	<!-- <iframe style="width:100%; height:300; border: 0px" scrolling="no" src="https://maps.google.co.uk/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=18+California,+Fresno,+CA,+United+States&amp;aq=0&amp;oq=18+California+united+state&amp;sll=39.9589,-120.955336&amp;sspn=0.007114,0.016512&amp;ie=UTF8&amp;hq=&amp;hnear=18,+Fresno,+California+93727,+United+States&amp;t=m&amp;ll=36.732762,-119.695787&amp;spn=0.017197,0.100336&amp;z=14&amp;output=embed"></iframe><br />
	<small><a href="https://maps.google.co.uk/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=18+California,+Fresno,+CA,+United+States&amp;aq=0&amp;oq=18+California+united+state&amp;sll=39.9589,-120.955336&amp;sspn=0.007114,0.016512&amp;ie=UTF8&amp;hq=&amp;hnear=18,+Fresno,+California+93727,+United+States&amp;t=m&amp;ll=36.732762,-119.695787&amp;spn=0.017197,0.100336&amp;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small> -->
	</div>
	</div>