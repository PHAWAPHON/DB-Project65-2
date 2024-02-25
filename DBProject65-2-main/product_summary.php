<?php include 'assets/headernav.php'; ?>
<!-- Header End====================================================================== -->


<?php
require_once('dbcontroller.php');
$db_handle = new DBController;


if(empty($_SESSION['cart_item'])){

  header("Location:index.php");
}
if(empty($_SESSION['username']) || empty($_SESSION['email'])){
  header("Location:login.php");
}
if (!empty($_GET["action"])) {
  switch ($_GET["action"]) {
    case "add":
      if (!empty($_POST['quantity'])) {
        $productByCode = $db_handle->runQuery("SELECT * from product where ProductID='" . $_GET["ProductID"] . "'");


        $itemArray = array($productByCode[0]['ProductID'] => (array(
          'name' => $productByCode[0]['Name'],
          'ProductID' => $productByCode[0]['ProductID'],
          'quantity' => $_POST['quantity'],
          'price' => $productByCode[0]['Price'],
          'image' => $productByCode[0]['Img']
        )));

        if (!empty($_SESSION['cart_item'])) {
          if (in_array($productByCode[0]["ProductID"], array_keys($_SESSION['cart_item']))) {
            foreach ($_SESSION['cart_item'] as $k => $v) {
              if ($productByCode[0]['ProductID'] == $k) {
                $_SESSION['cart_item'][$k]['quantity'] += $_POST['quantity'];
              }
            }
          } else {
            $_SESSION['cart_item'] = array_merge($_SESSION['cart_item'], $itemArray);
          }
        } else {
          $_SESSION['cart_item'] = $itemArray;
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
      header("Location:index.php");
      break;
    case "update":
      if (!empty($_POST["quantity"])) {
        $productByCode = $db_handle->runQuery("SELECT * from product where ProductID='" . $_GET["ProductID"] . "'");
        $itemArray = array($productByCode[0]['ProductID'] => (array(
          'name' => $productByCode[0]['Name'],
          'ProductID' => $productByCode[0]['ProductID'],
          'quantity' => $_POST['quantity'],
          'price' => $productByCode[0]['Price'],
          'image' => $productByCode[0]['Img']
        )));

        if (!empty($_SESSION['cart_item'])) {
          if (in_array($productByCode[0]["ProductID"], array_keys($_SESSION['cart_item']))) {
            foreach ($_SESSION['cart_item'] as $k => $v) {
              if ($productByCode[0]['ProductID'] == $k) {
                $_SESSION['cart_item'][$k]['quantity'] = $_POST['quantity'];
              }
            }
          } else {
            $_SESSION['cart_item'] = array_merge($_SESSION['cart_item'], $itemArray);
          }
        } else {
          $_SESSION['cart_item'] = $itemArray;
        }
      }
      break;
  }
}
?>





<div id="mainBody">
  <div class="container">
    <div class="row">
      <!-- Sidebar ================================================== -->

      <!-- Sidebar end=============================================== -->
      <div class="span9">
        <ul class="breadcrumb">
          <li><a href="index.php">หน้าแรก</a> <span class="divider">/</span></li>
          <li class="active"> ตะกร้าสินค้า</li>
        </ul>
        <a href="index.php" class="btn btn-dark x-left"><i class="icon-arrow-left"></i> เลือกสินค้าต่อ </a>
        <h3> ตะกร้าสินค้า</h3>



        <?php

        if (isset($_SESSION["cart_item"])) {
          $total_quantity = 0;
          $total_price = 0;


        ?>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>สินค้า</th>
                <th>คำอธิบาย</th>
                <th>จำนวน</th>
                <th>สินค้าคงเหลือ</th>
                <th>ราคา</th>
                <th>ยอดรวม</th>
                <th>นำออก</th>
              </tr>
            </thead>

            <?php

            foreach ($_SESSION["cart_item"] as $item) {
              $item_price = $item['quantity'] * $item['price'];


            ?>

              <tbody>
                <tr>

                  <td> 
                    <img width="60" src="img/<?php echo $item['image']; ?>">
                  </td>
                  <td>
                    <?php echo $item["name"]; ?>
                  </td>
                  <td>
                    <form method="post" action="product_summary.php?action=update&ProductID=<?php echo $item["ProductID"]; ?>">
                      <input type="number" name="quantity" value="<?php echo $item["quantity"]; ?>" min="1" max="<?php echo $item["stock"]; ?>">
                      <button type="submit" name="submit">แก้ไข</button>
                    </form>
                  </td>
                  <td><?php echo ($item["stock"]); ?></td>

                  <td><?php echo number_format($item["price"], 2); ?></td>
                  <td><?php echo number_format($item_price, 2); ?></td>
                  <td>
                    <!-- <a href="product_summary.php?action=remove&code=P0001" class="remove-btn" data-product-id="P0001">Remove</a> -->

                    <a href="product_summary.php" class="btn btn-danger icon-remove icon-white" onclick="removeItem('<?php echo $item['ProductID']; ?>');" data-product-id="<?php echo $item['ProductID']; ?>">นำสินค้าออก</a>
                  </td>
                </tr>
                <?php
                $total_quantity += $item['quantity'];
                $total_price += ($item['price'] * $item['quantity']);
                $_SESSION['total_price'] = $total_price;
                $_SESSION['total_quantity'] = $total_quantity;
                ?>




              <?php
            }

              ?>
              <tr>
                <td colspan="6"></td>
                <td colspan="7">
                  <a href="product_summary.php?action=empty" class="btn btn-outline-danger">เคลียตะกร้า</a>
                </td>
              </tr>
              <tr>
                <td colspan="6" style="text-align:right">สินค้าทั้งหมด: </td>
                <td><?php echo number_format($total_quantity); ?> ชิ้น</td>
              </tr>
              <tr>
                <td colspan="6" style="text-align:right"><strong>ยอดรวม =</strong></td>
                <td class="label label-important" style="display:block"> <strong><?php echo number_format($total_price, 2); ?></strong></td>
              </tr>
              </tbody>
          </table>

         






          <form class="checkout-form" action="checkout_db.php" method="post">

            <div class="row">
            <button class="btn btn-outline-success mx-right" type="submit" name="add">ดำเนินการต่อ</button>
              <div class="col-md-4">
              <br>
                <div class="alert-alert-success" h4 role="alert">
                  ข้อมูลติดต่อ ผู้รับ

                </div>
                <input type="text" name="cus_name" class="form-control" required placeholder="ชื่อ-นามสกุล"><br>
                ที่อยู่จัดส่ง
                <textarea class="form-control" required placeholder="ที่อยู่" name="cus_add" rows="1"></textarea> <br>
                เบอร์โทรศัพท์ผู้รับ
                <input type="number" name="cus_tel" class="form-control" required placeholder="เบอร์โทรศัพท์">
                <br><br><br>
                
              </div>
              
            </div>
            

          </form>


      </div>
    </div>




  <?php
        } else {
  ?>
    <div class="no-records">
      <a href="index.php" class="btn btn-dark"><i class="icon-arrow-left"></i> เลือกสินค้าก่อน! </a>
    </div>
  <?php
        }
  ?>










  </div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->


<!-- Footer ================================================================== -->

<script>
  $(document).ready(function() {
    $('.remove-btn').on('click', function(event) {
      event.preventDefault();
      var productId = $(this).data('product-id');
      $('#row' + productId + '').remove();
    });
  });
</script>
<script>
  function removeItem(productId) {
    console.log('removeItem called with productId:', productId);
    $.ajax({
      type: 'POST',
      url: 'remove_item.php',
      data: {
        'productId': productId
      },
      success: function(response) {
        if (response.success) {
          // Update the cart view or show a success message
          console.log('Item removed successfully');
        } else {
          // Show an error message
          console.log(response.message);
        }
      },
      error: function(xhr, status, error) {
        // Handle errors
        console.log(error);
      }
    });
  }
</script>