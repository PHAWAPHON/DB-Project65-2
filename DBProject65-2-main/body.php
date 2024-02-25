<?php require("connect.php") ?>



<?php
require_once('dbcontroller.php');
$db_handle = new DBController;
?>


<div id="mainBody">
  <div class="container">
    <div class="row">
      <ul class="nav nav-tabs nav-fill nav-justified" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">ALL</button>
        </li>
        <?php
        $pa = $db_handle->runQuery("SELECT * FROM category ORDER BY categoryid asc;");
        if (!empty($pa)) {
          foreach ($pa as $key => $value) {
        ?>
            <!-- Sidebar ================================================== -->

            <li class="nav-item" role="presentation">
              <button class="nav-link" id="<?php echo $pa[$key]["Name"]; ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo $pa[$key]["Name"]; ?>-tab-pane" type="button" role="tab" aria-controls="<?php echo $pa[$key]["Name"]; ?>-tab-pane" aria-selected="true">
                <div class="text-uppercase"><?php echo $pa[$key]["Name"]; ?></div>
              </button>
            </li>

        <?php }
        } ?>
      </ul>

      <div class="tab-content" id="myTabContent">

        <div class="tab-pane active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">


          <h4>All products</h4>
          <div class="container">
            <div class="row">
              <?php
              $product_array = $db_handle->runQuery("SELECT * FROM product ORDER BY ProductID asc;");
              if (!empty($product_array)) {
                foreach ($product_array as $key => $value) {
              ?>

                  <div class="modal fade" id="<?php echo $product_array[$key]['ProductID']; ?>" tabindex="-1" aria-labelledby="<?php echo $product_array[$key]['ProductID']; ?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="<?php echo $product_array[$key]['ProductID']; ?>Label"><?php echo $product_array[$key]['Name']; ?></h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <img width="50%" height="50%" src="img/<?php echo $product_array[$key]['Img']; ?>"><br>
                          <?php echo number_format($product_array[$key]['Price'], 2) ." บาท" ?><br>
                          <?php echo "เหลือ ".number_format($product_array[$key]['Stock']) ." ชิ้น" ?><br>
                          <?php echo $product_array[$key]['Description']; ?>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="col-sm-3">
                    <div class="card-deck d-flex align-items-stretch">

                      <div class="card">
                        <div class="card-img-container">
                          <a data-bs-toggle="modal" data-bs-target="#<?php echo $product_array[$key]['ProductID']; ?>">
                            <img class='card-img' src="img/<?php echo $product_array[$key]["Img"]; ?>">
                          </a>
                        </div>
                        <div class="card-body">
                          <div class="card-title"><?php echo $product_array[$key]["Name"]; ?></div>
                          <div class="card-text"><?php echo number_format($product_array[$key]["Price"],2)." บาท" ?></div>
                          <?php
                          if ($product_array[$key]['Stock'] == 0) {
                            echo "<p style='color: red;'>สินค้าหมด</p>";
                          } else {
                          ?>
                            <form class="cart-form" action="index.php?action=add&ProductID=<?php echo $product_array[$key]["ProductID"]; ?>" method="post">
                              <input type="hidden" name="ProductID" value="<?php echo $product_array[$key]["ProductID"]; ?>">
                              <div class="input-group mb-3">
                                <input type="number" name="quantity" class="form-control" placeholder="Quantity" value="1" min="1" max="<?php echo $product_array[$key]["Stock"]; ?>">
                                <div class="input-group-append">
                                  <button class="add-to-cart-btn btn btn-outline-info" type="submit" name="add">ใส่ตะกร้า</button>

                                </div>
                              </div>
                              <p class="label">จำนวนคงเหลือ <?php echo number_format($product_array[$key]["Stock"]); ?> ชิ้น</p>
                            </form>



                          <?php } ?>

                        </div>
                      </div>
                    </div>
                  </div>
              <?php }
              } ?>
            </div>
          </div>

        </div>


        <?php
        if (!empty($pa)) {
          foreach ($pa as $key => $value) {
        ?>

            <div class="tab-pane fade" id="<?php echo $pa[$key]["Name"]; ?>-tab-pane" role="tabpanel" aria-labelledby="<?php echo $pa[$key]["Name"]; ?>-tab" tabindex="0">


              <h4><?php echo $pa[$key]["Name"]; ?></h4>
              <div class="container">
                <div class="row">
                  <?php

                  $product_array = $db_handle->runQuery("SELECT * FROM product where categoryID ='" . $pa[$key]['categoryID'] . "'");
                  if (!empty($product_array)) {
                    foreach ($product_array as $key => $value) {
                  ?>





                      <div class="modal fade" id="1<?php echo $product_array[$key]['ProductID']; ?>" tabindex="-1" aria-labelledby="<?php echo $product_array[$key]['ProductID']; ?>Label" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="<?php echo $product_array[$key]['ProductID']; ?>Label"><?php echo $product_array[$key]['Name']; ?></h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <img width="50%" height="50%" src="img/<?php echo $product_array[$key]['Img']; ?>"><br>
                              <?php echo number_format($product_array[$key]['Price'], 2)." บาท" ?><br>
                              <?php echo "เหลือ ".number_format($product_array[$key]['Stock'])." ชิ้น" ?><br>
                              <?php echo $product_array[$key]['Description']; ?>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="col-sm-3">
                        <div class="card-deck d-flex align-items-stretch">

                          <div class="card">
                            <div class="card-img-container">
                              <a data-bs-toggle="modal" data-bs-target="#1<?php echo $product_array[$key]['ProductID']; ?>">
                                <img class='card-img' src="img/<?php echo $product_array[$key]["Img"]; ?>">
                              </a>
                            </div>
                            <div class="card-body">
                              <div class="card-title"><?php echo $product_array[$key]["Name"]; ?></div>
                              <div class="card-text"><?php echo number_format($product_array[$key]["Price"],2)." บาท" ?></div>
                              <?php
                              if ($product_array[$key]['Stock'] == 0) {
                                echo "<p style='color: red;'>สินค้าหมด</p>";
                              } else {
                              ?>
                                <form class="cart-form" action="index.php?action=add&ProductID=<?php echo $product_array[$key]["ProductID"]; ?>" method="post">
                                  <input type="hidden" name="ProductID" value="<?php echo $product_array[$key]["ProductID"]; ?>">
                                  <div class="input-group mb-3">
                                    <input type="number" name="quantity" class="form-control" placeholder="Quantity" value="1" min="1" max="<?php echo $product_array[$key]["Stock"]; ?>">
                                    <div class="input-group-append">
                                      <button class="add-to-cart-btn btn btn-outline-info" type="submit" name="add">ใส่ตะกร้า</button>

                                    </div>
                                  </div>
                                  <p class="label">จำนวนคงเหลือ <?php echo number_format($product_array[$key]["Stock"]); ?> ชิ้น</p>
                                </form>

                              <?php } ?>

                            </div>
                          </div>
                        </div>
                      </div>





                  <?php }
                  } ?>
                </div>
              </div>



            </div>

        <?php }
        } ?>
      </div>

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
        $(document).ready(function() {
          $('.cart-form').on('submit', function(event) {
            event.preventDefault();
            var form = $(this);
            $.ajax({
              url: form.attr('action'),
              type: form.attr('method'),
              data: form.serialize(),
              dataType: 'json',
              success: function(response) {
                // Update the cart count and total price in the HTML
                $('#cart-count').text(response.cartCount);
                $('#cart-total').text(response.cartTotal);
              },
              error: function(xhr, textStatus, errorThrown) {
                console.log('Error:', errorThrown);
              }
            });
          });
        });
      </script>