<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <title>About - CarSpareHub</title>

    <style>
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
h1{
    text-align:center;
    background:rgba(0,0,0,0.85);
    backdrop-filter:blur(10px);

    color:#ffffff;

    padding:24px;
    margin:0;

    font-size:38px;
    letter-spacing:2px;
    font-weight:700;

    border-bottom:2px solid #d4af37;

    box-shadow:0 4px 20px rgba(0,0,0,0.5);
}

/* Navigation */
.head{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:40px;

    padding:18px;

    background:rgba(255,255,255,0.04);
    backdrop-filter:blur(10px);

    border-bottom:1px solid rgba(255,255,255,0.08);
}

.head h3{
    margin:0;
    transition:0.3s ease;
}

.head h3:hover{
    transform:translateY(-3px);
}

.head i{
    color:#d4af37;
    margin-right:8px;
}

.head a{
    color:#f8fafc;
    text-decoration:none;
    font-size:18px;
    font-weight:600;
    transition:0.3s;
}

.head a:hover{
    color:#facc15;
}

/* Main Container */
.container{
    width:90%;
    max-width:1100px;

    margin:50px auto;

    padding:40px;

    border-radius:24px;

    background:rgba(255,255,255,0.06);
    backdrop-filter:blur(14px);

    border:1px solid rgba(255,255,255,0.08);

    box-shadow:
    0 12px 35px rgba(0,0,0,0.45),
    0 0 25px rgba(212,175,55,0.08);
}

/* Section Heading */
h2{
    color:#facc15;

    margin-top:25px;
    margin-bottom:15px;

    font-size:30px;

    position:relative;
}

h2::after{
    content:"";
    width:70px;
    height:3px;

    background:#d4af37;

    position:absolute;
    left:0;
    bottom:-8px;

    border-radius:10px;
}

/* Paragraph */
p{
    font-size:18px;
    line-height:1.9;
    color:#e5e7eb;
    margin-top:20px;
}

/* Strong Text */
strong{
    color:#facc15;
}

/* Contact Link */
.container a{
    color:#facc15;
    text-decoration:none;
    font-weight:600;
    transition:0.3s;
}

.container a:hover{
    color:#ffffff;
    text-decoration:underline;
}

/* Responsive */
@media(max-width:768px){

    .head{
        flex-direction:column;
        gap:20px;
    }

    h1{
        font-size:28px;
    }

    .container{
        padding:30px 20px;
    }

    h2{
        font-size:24px;
    }

    p{
        font-size:16px;
    }
}

</style>
</head>

<body>

    <h1>CarSpareHub</h1>

    <div class="head">
        <h3><i class="fas fa-camera" ></i><a href="about.php">About</a></h3>
        <!-- <h3><i class="fas fa-shopping-cart"></i><a href="order.php?part=Add Order">Add Order</a></h3> -->
        <h3><i class="fas fa-store"></i><a href="shop.php">Shop</a></h3>
        <h3><i class="fas fa-user"></i><a href="contact.php">Contact</a></h3>
    </div>

    <div class="container">
        <h2>About CarSpareHub</h2>

        <p>
            Welcome to <strong>CarSpareHub</strong> — your trusted online spare parts store.
            We provide high-quality engine parts, gear parts, brake components, and electrical parts
            for all major car brands at affordable prices.
        </p>

        <h2>Our Mission</h2>
        <p>
            Our mission is to make automobile spare parts easily accessible with
            reliable quality, fast delivery, and excellent customer support.
        </p>

        <h2>Why Choose Us?</h2>
        <p>
            ✔ 100% Genuine Spare Parts<br>
            ✔ Affordable Prices<br>
            ✔ Fast Delivery<br>
            ✔ Trusted by Thousands of Customers<br>
            ✔ Expert Customer Support
        </p>

        <h2>Contact Us</h2>
        <p>
            Have questions? Need help finding the right part?<br>
            You can always reach us through our <a href="contact.php">Contact Page</a>.
        </p>
    </div>

</body>
</html>
