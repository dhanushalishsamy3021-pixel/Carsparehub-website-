<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <title>CarSpareHub</title>
    <style>

/* Google Font Import */
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
    overflow-x:hidden;
    color:white;
}

/* Background Image */
.ig{
    position:fixed;
    top:0;
    left:0;

    width:100%;
    height:100%;

    background-image:
    linear-gradient(rgba(0,0,0,0.78),rgba(0,0,0,0.82)),
    url('https://images.unsplash.com/photo-1503376780353-7e6692767b70');

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;

    z-index:-1;
}

/* Main Content */
.content{
    position:relative;
    z-index:10;
}

/* Header */
header h1{

    text-align:center;

    padding:32px;

    font-size:48px;
    font-weight:700;

    letter-spacing:2px;

    color:#ffffff;

    background:
    linear-gradient(
    90deg,
    rgba(0,0,0,0.88),
    rgba(15,23,42,0.88)
    );

    backdrop-filter:blur(12px);

    border-bottom:2px solid #d4af37;

    text-transform:uppercase;

    box-shadow:0 5px 20px rgba(0,0,0,0.45);
}

/* Main Header Icon */
header h1 i{

    color:#d4af37;

    font-size:44px;

    margin-right:12px;

    animation:rotateGear 6s linear infinite;
}

/* Rotate Animation */
@keyframes rotateGear{

    100%{
        transform:rotate(360deg);
    }
}

/* Hero Subtitle */
.hero-subtitle{

    text-align:center;

    margin-top:18px;

    font-size:20px;

    color:#d1d5db;

    letter-spacing:1px;
}

/* Navbar */
.head{

    display:flex;

    justify-content:center;
    align-items:center;

    gap:35px;

    padding:20px;

    background:rgba(255,255,255,0.05);

    backdrop-filter:blur(12px);

    border-bottom:1px solid rgba(255,255,255,0.08);
}

/* Navbar Menu */
.head h3{

    margin:0;

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

    padding:10px 18px;

    border-radius:10px;

    transition:0.35s ease;
}

/* Navbar Hover */
.head a:hover{

    background:rgba(212,175,55,0.12);

    color:#facc15;
}

/* Section Heading */
.rotate-box{

    margin-top:45px;

    text-align:center;

    font-size:36px;
    font-weight:700;

    color:#ffffff;

    letter-spacing:1px;
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

/* Brand Section */
.Car-Section{

    display:flex;

    justify-content:center;

    margin-top:45px;
}

/* Brand Grid */
.brand-box{

    width:92%;
    max-width:1250px;

    display:grid;

    grid-template-columns:
    repeat(auto-fit,minmax(220px,1fr));

    gap:30px;
}

/* Brand Cards */
.brand-box a{

    position:relative;

    overflow:hidden;

    text-decoration:none;

    padding:38px 25px;

    text-align:center;

    border-radius:24px;

    background:rgba(255,255,255,0.07);

    backdrop-filter:blur(14px);

    border:1px solid rgba(255,255,255,0.08);

    box-shadow:
    0 12px 30px rgba(0,0,0,0.35),
    0 0 18px rgba(212,175,55,0.05);

    transition:0.45s ease;

    color:white;
}

/* Shine Animation */
.brand-box a::before{

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
.brand-box a:hover::before{

    top:100%;
    left:100%;
}

/* Card Hover */
.brand-box a:hover{

    transform:translateY(-10px) scale(1.03);

    border-color:#d4af37;

    box-shadow:
    0 20px 40px rgba(0,0,0,0.45),
    0 0 28px rgba(212,175,55,0.22);
}

/* Brand Logo Images */
.brand-box img{

    width: 80px;
    height:80px;

    object-fit:contain;

    margin-bottom:15px;

    filter:drop-shadow(
    0 0 12px rgba(212,175,55,0.25)
    );

    transition:0.4s ease;
}

/* Logo Hover */
.brand-box a:hover img{

    transform:scale(1.12);
}

/* Brand Name */
.brand-box p{

    font-size:20px;

    font-weight:600;

    color:#f8fafc;
}

/* Product Section */
.products-preview{

    text-align:center;

    margin-top:80px;
}

/* Product Heading */
.products-preview h2{

    font-size:40px;

    color:#ffffff;

    margin-bottom:28px;
}

/* Shop Button */
.button{

    background:
    linear-gradient(
    135deg,
    #d4af37,
    #facc15
    );

    color:black;

    border:none;

    padding:16px 45px;

    font-size:18px;
    font-weight:700;

    border-radius:14px;

    cursor:pointer;

    transition:0.35s ease;

    box-shadow:
    0 8px 25px rgba(212,175,55,0.35);
}

/* Button Hover */
.button:hover{

    transform:translateY(-5px) scale(1.05);

    background:
    linear-gradient(
    135deg,
    #facc15,
    #d4af37
    );

    box-shadow:
    0 12px 35px rgba(250,204,21,0.4);
}

/* Footer */
footer{

    margin-top:90px;

    text-align:center;

    padding:28px;

    background:rgba(0,0,0,0.75);

    border-top:
    1px solid rgba(255,255,255,0.08);

    color:#d1d5db;

    font-size:16px;

    letter-spacing:1px;
}

/* Mobile Responsive */
@media(max-width:768px){

    .head{

        flex-direction:column;

        gap:18px;
    }

    header h1{

        font-size:30px;
    }

    .rotate-box{

        font-size:26px;
    }

    .products-preview h2{

        font-size:28px;
    }

    .brand-box{

        grid-template-columns:1fr;
    }

    .brand-box a{

        padding:30px 20px;
    }
}

</style>
</head>
<body>
    <div class="ig"></div>
    <div class="content">
<header>
    <h1> <i class="fa-solid fa-gear"></i>Popular Car & bike Brands</h1>
</header>
<div class="head">
    <h3><i class="fas fa-store"></i>
        <a href="shop.php" style="text-decoration:none; color:white;">Shop</a></h3>
    <h3><i class="fas fa-user"></i><a href="contact.php" style="text-decoration:none; color:white;">Contact</a></h3>
    <h3><i class="fas fa-camera" ></i><a href="about.php" style="text-decoration:none; color:white;">About</a></h3>
    <h3><i class="fas fa-cart-plus"></i>
        <a href="cart.php" style="text-decoration: none; color: white;">Cart</a></h3>
</div>
    <h2 class="rotate-box">
        <i class="fa-solid fa-gear icon icon1"></i>
        <i class="fa-solid fa-gear icon icon2"></i>
        India Car Brands</h2>
<section class="Car-Section">
    <div class="brand-box">

    <a href="parts.php?brand=maruti">
        <img src="https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcRcyX8_hzCsP6484i-T96IKtxqDMIAyQbcYenFU6hclPwEK9Tb9DY0XaJx-B3DEWY5uDgvXz_ApIYtfLICiUyhtytRkel27w1hgtkUeJl-NkuakMqekBmoW1K8" alt="">
        <p>Maruti Suzuki</p>
    </a>

    <a href="parts.php?brand=hyundai">
    <img src="https://images7.alphacoders.com/122/1222940.png" alt="Hyundai">
    <p>Hyundai</p>
</a>

    <a href="parts.php?brand=tata">
        <img src="https://www.purppledesigns.com/wp-content/uploads/2023/11/images-1.jpg" alt="">
        <p>Tata Motors</p>
    </a>

   <a href="parts.php?brand=mahindra">
    <img src="https://market-resized.envatousercontent.com/previews/files/65297205/Mahindra%28590x590%29.JPG?w=590&h=590&cf_fit=crop&crop=top&format=auto&q=85&s=cf7e228350bcb3a58d77218cdef1e2a3b03c6a1614de2d7919348fa91664d8a4" alt="Mahindra Logo">
    <p>Mahindra</p>
</a>
    <a href="parts.php?brand=bmw">
    <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/BMW.svg" alt="BMW Logo">
    <p>BMW</p>
</a>
</div>
</section>
<section class="products-preview">
    <div class="Products-grid" id="previewProducts"></div>
    <h2>CarSpareHub All Products</h2>
    <p style="margin-top: 20px;"><a href="parts.php"><button class="button">Shop Now</button></a></p>
</section>
<footer>
    <p>© 2025 CarSpareHub. All rights reserved.</p>
</footer>
</div>
</body>
</html>
