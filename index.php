<?php

include "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your one-stop shop for genuine car spare parts. Buy quality parts online with easy returns and a 1-year warranty.">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <title>CarSpareHub</title>

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

/* Background Image */
.ig{

    position:fixed;

    top:0;
    left:0;

    width:100%;
    height:100%;

    background-image:
    linear-gradient(rgba(0,0,0,0.82),rgba(0,0,0,0.88)),
    url('https://images.unsplash.com/photo-1492144534655-ae79c964c9d7');

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
.car-run{

    text-align:center;

    padding:35px 20px;

    background:
    linear-gradient(
    90deg,
    rgba(0,0,0,0.92),
    rgba(15,23,42,0.92)
    );

    border-bottom:2px solid #d4af37;

    box-shadow:
    0 5px 20px rgba(0,0,0,0.45);
}

/* Logo */
.car-run h1{

    font-size:48px;

    font-weight:700;

    letter-spacing:2px;

    color:white;
}

/* Car Icon */
.car-run i{

    color:#d4af37;

    margin-right:12px;

    animation:drive 3s ease-in-out infinite;
}

/* Car Animation */
@keyframes drive{

    0%{
        transform:translateX(0);
    }

    50%{
        transform:translateX(15px);
    }

    100%{
        transform:translateX(0);
    }
}

/* Hero Section */
.hero{

    width:92%;

    max-width:1200px;

    margin:40px auto;

    padding:50px 30px;

    border-radius:28px;

    background:rgba(255,255,255,0.06);

    backdrop-filter:blur(14px);

    border:
    1px solid rgba(255,255,255,0.08);

    text-align:center;

    box-shadow:
    0 12px 35px rgba(0,0,0,0.35);
}

/* Hero Heading */
.hero h2{

    font-size:38px;

    line-height:1.5;

    color:white;
}

/* Hero Icon */
.hero i{

    color:#d4af37;

    margin-right:10px;
}

/* Warranty Section */
.warranty-section{

    width:92%;

    max-width:1300px;

    margin:50px auto;

    display:grid;

    grid-template-columns:
    repeat(auto-fit,minmax(280px,1fr));

    gap:30px;
}

/* Warranty Box */
.warranty-box{

    background:rgba(255,255,255,0.07);

    backdrop-filter:blur(14px);

    border-radius:24px;

    padding:35px 25px;

    text-align:center;

    border:
    1px solid rgba(255,255,255,0.08);

    box-shadow:
    0 12px 30px rgba(0,0,0,0.35),
    0 0 18px rgba(212,175,55,0.05);

    transition:0.4s ease;
}

/* Warranty Hover */
.warranty-box:hover{

    transform:
    translateY(-10px)
    scale(1.03);

    border-color:#d4af37;

    box-shadow:
    0 20px 40px rgba(0,0,0,0.45),
    0 0 28px rgba(212,175,55,0.22);
}

/* Warranty Icons */
.warranty-box i{

    font-size:52px;

    color:#d4af37;

    margin-bottom:20px;
}

/* Warranty Title */
.warranty-box h3{

    font-size:24px;

    margin-bottom:15px;

    color:white;
}

/* Warranty Text */
.warranty-box p{

    font-size:16px;

    line-height:1.7;

    color:#d1d5db;
}

/* Products Preview */
.products-preview{

    width:92%;

    max-width:1300px;

    margin:60px auto;

    padding:45px 25px;

    border-radius:28px;

    background:rgba(255,255,255,0.06);

    backdrop-filter:blur(14px);

    border:
    1px solid rgba(255,255,255,0.08);

    text-align:center;

    box-shadow:
    0 12px 35px rgba(0,0,0,0.35);
}

/* Product Heading */
.products-preview h2{

    font-size:38px;

    color:white;

    margin-bottom:25px;
}

/* Gear Icons */
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

/* Product Grid */
.products-grid{

    display:grid;

    grid-template-columns:
    repeat(auto-fit,minmax(240px,1fr));

    gap:25px;

    margin-top:30px;
}

/* Button */
.button{

    margin-top:25px;

    background:
    linear-gradient(
    135deg,
    #d4af37,
    #facc15
    );

    color:black;

    border:none;

    padding:15px 38px;

    border-radius:14px;

    font-size:17px;
    font-weight:700;

    cursor:pointer;

    transition:0.35s ease;

    box-shadow:
    0 8px 25px rgba(212,175,55,0.35);
}

/* Button Hover */
.button:hover{

    transform:
    translateY(-4px)
    scale(1.04);

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

    margin-top:70px;

    text-align:center;

    padding:25px;

    background:
    rgba(0,0,0,0.82);

    border-top:
    1px solid rgba(255,255,255,0.08);

    color:#d1d5db;

    font-size:15px;
}

/* Mobile */
@media(max-width:768px){

    .car-run h1{

        font-size:32px;
    }

    .hero h2{

        font-size:26px;
    }

    .products-preview h2{

        font-size:28px;
    }

    .warranty-box{

        padding:28px 20px;
    }

    .button{

        width:100%;
    }
}

/* Small Mobile */
@media(max-width:480px){

    .car-run h1{

        font-size:26px;
    }

    .hero{

        padding:35px 20px;
    }

    .hero h2{

        font-size:22px;
    }
}

</style>
</head>

<body>
    <div class="ig"></div>
    <div class="content">

<header>
    <div class="car-run">
    <h1> <i class="fa-solid fa-car-side"></i>CarSpareHub</h1>
    </div>
</header>

<section class="hero">
    <h2> <i class="fa-solid fa-plug-circle-bolt"></i>Welcome to the Best Online Car Spare Hub</h2>
</section>

<section class="warranty-section">
    <div class="warranty-box">
        <i class="fas fa-shield-alt"></i>
        <h3>1-Year Warranty</h3>
        <p>All spare parts include a standard manufacturer warranty.</p>
    </div>

    <div class="warranty-box">
        <i class="fas fa-tools"></i>
        <h3>Genuine Parts</h3>
        <p>100% original and verified car & bike spare parts.</p>
    </div>

    <div class="warranty-box">
        <i class="fas fa-sync-alt"></i>
        <h3>Easy Replacement</h3>
        <p>7-day return and free replacement for damaged items.</p>
    </div>
</section>

<section class="products-preview">
    <h2> <i class="fa-solid fa-gear icon icon1"></i>
         <i class="fa-solid fa-gear icon icon2"></i>
        CarSpareHub Products</h2>
    <div class="products-grid" id="previewProducts"></div>

    <p style="text-align:center; margin-top:20px;">
        <a href="home.php"><button class="button">See Now</button></a>
    </p>
</section>

<footer>
    <p>© 2025 CarSpareHub. All rights reserved.</p>
</footer>
    </div>
</body>
</html>
