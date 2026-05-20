<?php
include "db.php";
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires:0");
?>
<?php
session_start();

if (isset($_GET['from']) && $_GET['from'] === 'cart') {
    unset($_SESSION['order']); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <title>Document</title>
    <!-- <style>
        body{
            margin:0;
            font-family:Arial,sans-serif;
            background:linear-gradient(#B296FF,#C1D2DC);
            color:black;
        }
        .site-logo{
            text-align:center;
            background:linear-gradient(#B296FF,#C1D2DC);
            padding:20px 0;
            font-size:32px;
            font-weight:700;
            color:black;
        }
        .site-logo{
            font-size:32px;
            padding:10px;
            border-radius:12px;
            color:black;
        }
        .content{
            width: 90%;
            margin:auto;
            margin-top:30px;
        }
        .content div{
            background:linear-gradient(#B296FF,#C1D2DC);
            padding:15px;
            border-radius:10px;
            margin-bottom:20px;
            color:black;
            display:flex;
            align-items:center;
            gap:20px;
            box-shadow:0 0 10px rgba(255,102,0,0.5);
        }
        .content img{
            width: 110px;
            height:110px;
            border-radius:10px;
            border:2px solid black;
            background:white;
        }
        .content a {
            text-decoration:none;
            color:white;
            padding:8px 12px;
            background:black; 
            border-radius:6px;
            font-weight:bold;
            transition:0.3s;
        }
        .content a:hover{
            background:#B296FF;
        }
        .order-btn{
            background:black !important;
            color:white !important;
            font-weight:bold;
            padding:8px 14px;
            border-radius:6px;
            margin-left:10px;
            text-decoration:none;
            transition:0.3s;
        }
        .order-btn:hover{
            background:#B296FF !important;
            color:white !important;
        }
        .cart-count{
            display:block;
            text-align:center;
            margin-top:25px;
            font-size:22px;
            color:#B296FF;
            text-decoration:none;
        }
        .cart-count:hover{
            color:black;
        }
    </style> -->
    <style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Segoe UI',sans-serif;
    background:linear-gradient(135deg,#0f172a,#1e293b,#111827);
    color:white;
    min-height:100vh;
}

/* Header */
.site-logo{
    background:rgba(0,0,0,0.85);
    backdrop-filter:blur(10px);
    color:#f8fafc;
    text-align:center;
    padding:25px;
    font-size:38px;
    font-weight:700;
    letter-spacing:2px;
    border-bottom:2px solid #d4af37;
    box-shadow:0 4px 20px rgba(0,0,0,0.5);
}

.site-logo i{
    color:#d4af37;
    margin-right:12px;
}

.site-logo span{
    color:#ffffff;
}

/* Main Content */
.content{
    width:92%;
    max-width:1300px;
    margin:40px auto;
}

/* Product Card */
.content div{
    background:rgba(255,255,255,0.06);
    border:1px solid rgba(255,255,255,0.08);
    backdrop-filter:blur(12px);
    border-radius:20px;
    padding:25px;
    margin-bottom:30px;
    display:flex;
    align-items:center;
    gap:25px;
    transition:0.4s ease;
    box-shadow:0 10px 30px rgba(0,0,0,0.4);
}

.content div:hover{
    transform:translateY(-8px) scale(1.01);
    border-color:#d4af37;
    box-shadow:0 15px 40px rgba(212,175,55,0.25);
}

/* Product Image */
.content img{
    width:170px;
    height:170px;
    object-fit:cover;
    border-radius:16px;
    border:3px solid #d4af37;
    background:white;
}

/* Product Text */
.content p{
    font-size:18px;
    line-height:1.8;
    color:#f1f5f9;
    font-weight:500;
}

/* Buttons */
.content a{
    text-decoration:none;
    padding:12px 22px;
    border-radius:10px;
    font-weight:600;
    transition:0.3s;
    display:inline-block;
    letter-spacing:0.5px;
}

/* Remove Button */
.content a[href*="delete"]{
    background:#dc2626;
    color:white;
    border:1px solid transparent;
}

.content a[href*="delete"]:hover{
    background:transparent;
    border:1px solid #dc2626;
    color:#dc2626;
}

/* Order Button */
.order-btn{
    background:linear-gradient(135deg,#d4af37,#facc15) !important;
    color:black !important;
    margin-left:12px;
    font-weight:bold;
    box-shadow:0 5px 18px rgba(212,175,55,0.4);
}

.order-btn:hover{
    transform:scale(1.05);
    background:linear-gradient(135deg,#facc15,#d4af37) !important;
}

/* Cart Button */
a[href='cart.php']{
    display:block;
    width:240px;
    margin:40px auto;
    text-align:center;
    background:linear-gradient(135deg,#111827,#1e293b);
    color:#f8fafc;
    padding:16px;
    border-radius:14px;
    text-decoration:none;
    font-size:22px;
    font-weight:bold;
    border:1px solid #d4af37;
    box-shadow:0 6px 18px rgba(0,0,0,0.4);
    transition:0.3s;
}

a[href='cart.php']:hover{
    background:linear-gradient(135deg,#1e293b,#334155);
    transform:translateY(-3px);
}

/* HR Line */
hr{
    border:none;
    height:1px;
    background:rgba(255,255,255,0.1);
    margin-top:20px;
}

/* Responsive */
@media(max-width:768px){

    .content div{
        flex-direction:column;
        text-align:center;
    }

    .content img{
        width:100%;
        max-width:260px;
        height:auto;
    }

    .order-btn{
        margin-left:0;
        margin-top:12px;
    }

    .site-logo{
        font-size:28px;
    }
}

</style>
</head>
<body>
<h1 class="site-logo"><i class="fas fa-screwdriver-wrench"></i><span>CarSpareHub</span></h1>
<!-- <h3><i class="fas fa-shopping-cart" style="color:white;"></i>
<a href="order.php?part=Add Order" style="text-decoration:none; color:white;">Add Order</a></h3> -->


<div class="grid">
<?php

$action = $_GET['action'] ?? '';
$id     = intval($_GET['id'] ?? 0);
$type   = $_GET['type'] ?? '';

if ($action == "add" && $id > 0) {

    if ($type == "engine")      $table = "engineparts";
    elseif ($type == "gear")    $table = "gearparts";
    elseif ($type == "break")   $table = "breaksystem"; 
    elseif ($type == "electrical") $table = "electricalpart";
    else $table = "";

    if ($table != "") {

        $sql = "SELECT * FROM $table WHERE id = $id";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {

            $item = $result->fetch_assoc();
            $name  = $item['name'];
            $price = $item['price'];
            $model = $item['model'];
            $brand = $item['brand'];
            $image = $item['image'];

            $insert = "INSERT INTO cart (part_id, name, price, model, brand, image) 
                       VALUES ('$id', '$name', '$price','$model','$brand', '$image')";
            $conn->query($insert);

            echo "<script>alert('Item added to cart');window.location='cart.php';</script>";
            exit();
        }
    }
}

if ($action == "delete" && $id > 0) {
    $conn->query("DELETE FROM cart WHERE id = $id");
    echo "<script>alert('Item removed');window.location='cart.php';</script>";
    exit();
}

?>
</div>
<div class="content">
<?php
$sql = "SELECT * FROM cart";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<img src='" . $row['image'] . "' width='100'>";
    echo "<p>" . $row['name'] . " - ₹" . $row['price'] . "</p>";
    echo "<p>Model: " . $row['model'] . " - Brand: " . $row['brand'] . "</p>";
    echo "<a href='cart.php?action=delete&id=" . $row['id'] . "'>Remove</a>";
    
    // echo '<a class="order-btn" href="order.php?from=cart&ts=' . time() . '">Add Order</a>';
    echo '<a class="order-btn" href="order.php?from=cart&name=' . urlencode($row['name']) . '&price=' . urlencode($row['price']) . '&brand=' . urlencode($row['brand']) . '">Add Order</a>';
    
 
    echo "</div><hr>";
}

$count = $conn->query("SELECT COUNT(*) AS total FROM cart")->fetch_assoc()['total'];
echo "<a href='cart.php'>Cart ($count)</a>";
?>
</div>
</body>
</html>
