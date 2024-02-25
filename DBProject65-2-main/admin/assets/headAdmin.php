<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <meta http-equiv="X-UA=Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="admin1.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
</head>

<body>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
    <header>
        <div class="nav">
            <ul>
                <li class="user"><a href="/Digitalden/index.php">หน้าหลัก</a></li>
                <li class="about"><a href="index.php">DD Den</a></li>
                <li class="about"><a href="#">สินค้า</a>
                    <ul>
                        <li><a href="admin_product.php">รายการสินค้า</a></li>
                        <li><a href="admin_managepd.php">จัดการสินค้า</a></li>
                        <li><a href="admin_cate.php">หมวดหมู่</a></li>

                        <li><a href="admin_brand.php">แบรนด์</a></li>
                    </ul>
                </li>
                <li class="about"><a href="#">Transaction</a>
                    <ul>
                        <li class="about"><a href="admin_transaction.php">คำสั่งซื้อ</a></li>
                        <li class="about"><a href="admin_confirm.php">Confirm</a></li>
                    </ul>
                </li>
                <li class="about"><a href="#">User/Admin</a>
                    <ul>
                        <li class="user"><a href="admin_user.php">ผู้ใช้</a></li>
                        <li class="admin"><a href="admin_admin.php">Admin</a></li>
                    </ul>
                </li>
                <li class="about"><a href="profit.php">กำไร</a></li>

            </ul>
    </header>

</body>

</html>