<?php include "db.php";?>
<?php
$brand = $_GET['brand'] ?? '';

echo "<h2>Showing products for: " . strtoupper($brand) . "</h2>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  <title>Available parts</title>

  <style>

/* Google Font */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

/* Reset */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

/* Body */
body{

    font-family:'Poppins',sans-serif;

    background:#0f172a;

    color:#f8fafc;

    overflow-x:hidden;
}

/* Background */
body::before{

    content:"";

    position:fixed;

    top:0;
    left:0;

    width:100%;
    height:100%;

    background-image:
    linear-gradient(rgba(0,0,0,0.82),rgba(0,0,0,0.88)),
    url('https://images.unsplash.com/photo-1503376780353-7e6692767b70');

    background-size:cover;
    background-position:center;

    z-index:-1;
}

/* Logo */
.site-logo{

    text-align:center;

    padding:28px;

    font-size:42px;
    font-weight:700;

    letter-spacing:2px;

    color:white;

    background:
    linear-gradient(
    90deg,
    rgba(0,0,0,0.88),
    rgba(15,23,42,0.88)
    );

    border-bottom:2px solid #d4af37;

    box-shadow:0 5px 20px rgba(0,0,0,0.45);
}

/* Logo Icon */
.site-logo i{

    color:#d4af37;

    margin-right:12px;

    animation:rotateGear 6s linear infinite;
}

/* Gear Rotate */
@keyframes rotateGear{

    100%{
        transform:rotate(360deg);
    }
}

/* Navbar */
.head{

    display:flex;

    justify-content:center;
    align-items:center;

    gap:35px;

    padding:18px;

    background:rgba(255,255,255,0.05);

    backdrop-filter:blur(12px);

    border-bottom:1px solid rgba(255,255,255,0.08);
}

/* Navbar Items */
.head h3{

    transition:0.3s ease;
}

.head h3:hover{

    transform:translateY(-4px);
}

/* Navbar Icons */
.head i{

    color:#d4af37;

    margin-right:8px;
}

/* Navbar Links */
.head a{

    text-decoration:none;

    color:#f8fafc;

    font-size:17px;
    font-weight:600;

    transition:0.3s ease;
}

/* Navbar Hover */
.head a:hover{

    color:#facc15;
}

/* Section Heading */
.rotate-box{

    margin:40px auto 20px;

    width:90%;

    text-align:center;

    padding:16px;

    border-radius:16px;

    font-size:30px;
    font-weight:700;

    color:white;

    background:rgba(255,255,255,0.06);

    backdrop-filter:blur(12px);

    border:1px solid rgba(255,255,255,0.08);

    box-shadow:0 8px 25px rgba(0,0,0,0.35);
}

/* Rotating Icons */
.icon{

    color:#d4af37;

    animation:spin 5s linear infinite;
}

.icon2{

    animation-direction:reverse;
}

/* Spin Animation */
@keyframes spin{

    from{
        transform:rotate(0deg);
    }

    to{
        transform:rotate(360deg);
    }
}

/* Brand Heading */
h2{

    text-align:center;

    margin-top:25px;

    color:#facc15;

    font-size:34px;

    letter-spacing:1px;
}

/* Product Grid */
.grid{

    display:grid;

    grid-template-columns:
    repeat(auto-fit,minmax(280px,1fr));

    gap:30px;

    width:92%;

    margin:30px auto;
}

/* Product Card */
.parts{

    position:relative;

    overflow:hidden;

    background:rgba(255,255,255,0.07);

    backdrop-filter:blur(14px);

    border-radius:24px;

    padding:24px;

    border:1px solid rgba(255,255,255,0.08);

    box-shadow:
    0 12px 30px rgba(0,0,0,0.35),
    0 0 18px rgba(212,175,55,0.05);

    transition:0.45s ease;
}

/* Shine Effect */
.parts::before{

    content:"";

    position:absolute;

    top:-100%;
    left:-100%;

    width:200%;
    height:200%;

    background:
    linear-gradient(
    120deg,
    transparent,
    rgba(255,255,255,0.08),
    transparent
    );

    transform:rotate(25deg);

    transition:0.9s;
}

/* Shine Hover */
.parts:hover::before{

    top:100%;
    left:100%;
}

/* Card Hover */
.parts:hover{

    transform:
    translateY(-10px)
    scale(1.03);

    border-color:#d4af37;

    box-shadow:
    0 20px 40px rgba(0,0,0,0.45),
    0 0 28px rgba(212,175,55,0.22);
}

/* Product Image */
.parts img{

    width:100%;
    height:220px;

    object-fit:cover;

    border-radius:18px;

    margin-bottom:18px;

    transition:0.4s ease;
}

/* Image Hover */
.parts:hover img{

    transform:scale(1.04);
}

/* Product Details */
.parts ul{

    list-style:none;
}

.parts li{

    margin-bottom:10px;

    font-size:15px;

    color:#e5e7eb;

    line-height:1.6;
}

/* Strong Text */
.parts strong{

    color:#facc15;
}
/* Stock Status */

.stock{

    display:inline-block;

    margin-top:6px;

    padding:8px 14px;

    border-radius:30px;

    font-size:13px;

    font-weight:700;

    letter-spacing:0.5px;
}

/* Available */

.available{

    background:rgba(34,197,94,0.18);

    color:#4ade80;

    border:1px solid rgba(74,222,128,0.35);

    box-shadow:0 0 12px rgba(74,222,128,0.18);
}

/* Not Available */

.unavailable{

    background:rgba(239,68,68,0.18);

    color:#f87171;

    border:1px solid rgba(248,113,113,0.35);

    box-shadow:0 0 12px rgba(248,113,113,0.18);
}

/* Icons */

.stock i{

    margin-right:6px;
}

/* Add to Cart Button */
.order-btn{

    display:block;

    margin-top:20px;

    text-align:center;

    text-decoration:none;

    background:
    linear-gradient(
    135deg,
    #d4af37,
    #facc15
    );

    color:black;

    padding:14px;

    border-radius:14px;

    font-size:16px;
    font-weight:700;

    transition:0.35s ease;

    box-shadow:
    0 8px 25px rgba(212,175,55,0.35);
}

/* Button Hover */
.order-btn:hover{

    transform:
    translateY(-4px)
    scale(1.03);

    background:
    linear-gradient(
    135deg,
    #facc15,
    #d4af37
    );

    box-shadow:
    0 12px 35px rgba(250,204,21,0.4);
}

/* Mobile */
@media(max-width:768px){

    .head{

        flex-direction:column;

        gap:18px;
    }

    .site-logo{

        font-size:30px;
    }

    .rotate-box{

        font-size:22px;
    }

    .grid{

        grid-template-columns:1fr;
    }

    .parts{

        padding:20px;
    }
}
/* Disabled Button */

.disabled-btn{

    background:
    linear-gradient(
    135deg,
    #475569,
    #334155
    ) !important;

    color:#cbd5e1 !important;

    cursor:not-allowed;

    opacity:0.7;

    box-shadow:none !important;
}

.disabled-btn:hover{

    transform:none !important;
}

</style>
</head>

<body>

  <h1 class="site-logo"><i class="fas fa-screwdriver-wrench"></i><span>CarSpareHub</span></h1>
  <div class="head">
<!-- <h3><i class="fas fa-shopping-cart"></i><a href="order.php?part=Add Order">Add Order</a></h3> -->
<h3><i class="fas fa-store"></i><a href="shop.php">Shop</a></h3>
<h3><i class="fas fa-user"></i><a href="contact.php">Contact</a></h3>
<h3><i class="fas fa-camera" ></i><a href="about.php">About</a></h3>
<h3><i class="fas fa-cart-plus"></i><a href="cart.php">Cart</a></h3>

</div>
<h2 class="rotate-box">
        <i class="fa-solid fa-gear icon icon1"></i>
        <i class="fa-solid fa-gear icon icon2"></i>
        ENGINE PARTS</h2>
  <div class="grid">
    <?php
      $sql = "SELECT * FROM engineparts";
      $result = $conn->query($sql);

      while ($row = $result->fetch_assoc()) { ?>
        <div class="parts">
          <img src="<?php echo $row['image']; ?>" alt="">
          <ul>
            <li><strong>ID:</strong> <?php echo $row['id']; ?></li>
            <li><strong>Name:</strong> <?php echo $row['name']; ?></li>
            <li><strong>Price:</strong> ₹<?php echo $row['price']; ?></li>
            <li><strong>Symptoms:</strong> <?php echo $row['symptoms']; ?></li>
            <li><strong>Brand:</strong> <?php echo $row['brand']; ?></li>
            <li><strong>Model:</strong> <?php echo $row['model']; ?></li>


<li>
<strong>Status:</strong>

<?php if($row['stock'] > 0){ ?>

<span class="stock available">
<i class="fa-solid fa-circle-check"></i>
In Stock (<?php echo $row['stock']; ?>)
</span>

<?php } else { ?>

<span class="stock unavailable">
<i class="fa-solid fa-circle-xmark"></i>
Not Available
</span>

<?php } ?>
</li>
        
          </ul>

          <?php if($row['stock'] > 0){ ?>

<a class="order-btn" 
href="cart.php?action=add&id=<?php echo $row['id']; ?>&type=engine">

<i class="fa-solid fa-cart-shopping"></i>
Add to Cart

</a>

<?php } else { ?>

<button class="order-btn disabled-btn" disabled>

<i class="fa-solid fa-ban"></i>
Out Of Stock

</button>

<?php } ?>
        </div>
    <?php } ?>
  </div>

  <h2 class="rotate-box">
        <i class="fa-solid fa-gear icon icon1"></i>
        <i class="fa-solid fa-gear icon icon2"></i>
        GEAR PARTS</h2>

  <div class="grid">
    <?php
      $sql = "SELECT * FROM gearparts";
      $result = $conn->query($sql);

      while ($row = $result->fetch_assoc()) { ?>
        <div class="parts">
          <img src="<?php echo $row['image']; ?>" alt="">
          <ul>
            <li><strong>ID:</strong> <?php echo $row['id']; ?></li>
            <li><strong>Name:</strong> <?php echo $row['name']; ?></li>
            <li><strong>Price:</strong> ₹<?php echo $row['price']; ?></li>
            <li><strong>Model:</strong> <?php echo $row['model']; ?></li>

<li>
<strong>Status:</strong>

<?php if($row['stock'] > 0){ ?>

<span class="stock available">
<i class="fa-solid fa-circle-check"></i>
In Stock (<?php echo $row['stock']; ?>)
</span>

<?php } else { ?>

<span class="stock unavailable">
<i class="fa-solid fa-circle-xmark"></i>
Not Available
</span>

<?php } ?>
</li>
        </ul>

          <?php if($row['stock'] > 0){ ?>

<a class="order-btn" 
href="cart.php?action=add&id=<?php echo $row['id']; ?>&type=gear">

<i class="fa-solid fa-cart-shopping"></i>
Add to Cart

</a>

<?php } else { ?>

<button class="order-btn disabled-btn" disabled>

<i class="fa-solid fa-ban"></i>
Out Of Stock

</button>

<?php } ?>
        </div>
    <?php } ?>
  </div>

  <h2 class="rotate-box">
        <i class="fa-solid fa-gear icon icon1"></i>
        <i class="fa-solid fa-gear icon icon2"></i>
        BREAKSYSTEM</h2>
  <div class="grid">
    <?php
    $sql="SELECT*FROM breaksystem";
    $result=$conn->query($sql);

    while($row=$result->fetch_assoc()){ ?>
<div class="parts">
  <img src="<?php echo $row['image'];?>" alt="">
  <ul>
            <li><strong>ID:</strong> <?php echo $row['id']; ?></li>
            <li><strong>Name:</strong> <?php echo $row['name']; ?></li>
            <li><strong>Price:</strong> ₹<?php echo $row['price']; ?></li>
            <li><strong>Symptoms:</strong><?php echo $row['symptoms'];?></li>
            <li><strong>Model:</strong> <?php echo $row['model']; ?></li>
            <li><strong>Model:</strong> <?php echo $row['model']; ?></li>

<li>
<strong>Status:</strong>

<?php if($row['stock'] > 0){ ?>

<span class="stock available">
<i class="fa-solid fa-circle-check"></i>
In Stock (<?php echo $row['stock']; ?>)
</span>

<?php } else { ?>

<span class="stock unavailable">
<i class="fa-solid fa-circle-xmark"></i>
Not Available
</span>

<?php } ?>
</li>
  </ul>
  <?php if($row['stock'] > 0){ ?>

<a class="order-btn" 
href="cart.php?action=add&id=<?php echo $row['id']; ?>&type=break">

<i class="fa-solid fa-cart-shopping"></i>
Add to Cart

</a>

<?php } else { ?>

<button class="order-btn disabled-btn" disabled>

<i class="fa-solid fa-ban"></i>
Out Of Stock

</button>

<?php } ?>
    </div>
  <?php  }?>
  </div>

  <h2 class="rotate-box">
        <i class="fa-solid fa-gear icon icon1"></i>
        <i class="fa-solid fa-gear icon icon2"></i>
        ELECTRICAL PARTS</h2>
  <div class="grid">
    <?php
    $sql="SELECT*FROM electricalpart";
    $result=$conn->query($sql);

    while($row=$result->fetch_assoc()){ ?>
<div class="parts">
  <img src="<?php echo $row['image'];?>" alt="">
  <ul>
            <li><strong>ID:</strong> <?php echo $row['id']; ?></li>
            <li><strong>Name:</strong> <?php echo $row['name']; ?></li>
            <li><strong>Price:</strong> ₹<?php echo $row['price']; ?></li>
            <li><strong>Brand:</strong><?php echo $row['brand'];?></li>
            <li><strong>Model:</strong> <?php echo $row['model']; ?></li>

<li>
<strong>Status:</strong>

<?php if($row['stock'] > 0){ ?>

<span class="stock available">
<i class="fa-solid fa-circle-check"></i>
In Stock (<?php echo $row['stock']; ?>)
</span>

<?php } else { ?>

<span class="stock unavailable">
<i class="fa-solid fa-circle-xmark"></i>
Not Available
</span>

<?php } ?>
</li>
        </ul>
  
  <?php if($row['stock'] > 0){ ?>

<a class="order-btn" 
href="cart.php?action=add&id=<?php echo $row['id']; ?>&type=electrical">

<i class="fa-solid fa-cart-shopping"></i>
Add to Cart

</a>

<?php } else { ?>

<button class="order-btn disabled-btn" disabled>

<i class="fa-solid fa-ban"></i>
Out Of Stock

</button>

<?php } ?>
    </div>
  <?php  }?>
  </div>
</body>
</html>
