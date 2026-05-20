<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
include "db.php";

$msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $message = $_POST['message'] ?? '';

    $stmt= $conn->prepare("
    INSERT INTO contacts(name,email,phone,message)
    VALUES(?,?,?,?)
    ");
    $stmt->bind_param("ssss",$name,$email,$phone,$message);
    if($stmt->execute()){
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'kingthanushkingthanush@gmail.com';
            $mail->Password   = 'wbgk uxjb nsnz crkg';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;
        
            $mail->setFrom('noreply@CarSpareHub.com', 'CarSpareHub');
            $mail->addAddress('mkamesh4567@gmail.com');
            $mail->Subject = 'New Contact Received!';
            $mail->Body = "New Contact Details\n=====================\n".
                          "Name: $name\n".
                          "Phone: $phone\n".
                          "Email: $email\n".
                          "Message: $message\n";
        
            $mail->send();
            $msg = "Your message has been sent!";
        } catch (Exception $e) {
            echo "Contact Detail Received but email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        
} else {
echo "DB Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

} else {
}
?>

    


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
<title>Contact - CarSpareHub</title>

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

/* Content */
.content{

    position:relative;

    z-index:10;
}

/* Header */
h1{

    text-align:center;

    padding:28px;

    font-size:42px;
    font-weight:700;

    letter-spacing:2px;

    color:white;

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

/* Navbar */
.header-menu{

    display:flex;

    justify-content:center;
    align-items:center;

    gap:35px;

    padding:18px;

    background:rgba(255,255,255,0.05);

    backdrop-filter:blur(12px);

    border-bottom:
    1px solid rgba(255,255,255,0.08);

    flex-wrap:wrap;
}

/* Menu Items */
.header-menu h3{

    transition:0.3s ease;
}

/* Hover */
.header-menu h3:hover{

    transform:translateY(-4px);
}

/* Navbar Icons */
.header-menu i{

    color:#d4af37;

    margin-right:8px;
}

/* Links */
.header-menu a{

    text-decoration:none;

    color:#f8fafc;

    font-size:17px;
    font-weight:600;

    transition:0.3s ease;
}

/* Link Hover */
.header-menu a:hover{

    color:#facc15;
}

/* Contact Container */
.container{

    width:92%;
    max-width:520px;

    margin:60px auto;

    padding:40px 35px;

    border-radius:28px;

    background:rgba(255,255,255,0.07);

    backdrop-filter:blur(14px);

    border:
    1px solid rgba(255,255,255,0.08);

    box-shadow:
    0 12px 35px rgba(0,0,0,0.35),
    0 0 20px rgba(212,175,55,0.05);
}

/* Contact Heading */
.container h2{

    text-align:center;

    font-size:34px;

    margin-bottom:28px;

    color:white;
}

/* Success Message */
.success{

    background:
    linear-gradient(
    135deg,
    #d4af37,
    #facc15
    );

    color:black;

    text-align:center;

    padding:14px;

    border-radius:14px;

    margin-bottom:22px;

    font-weight:700;

    box-shadow:
    0 8px 20px rgba(212,175,55,0.3);
}

/* Labels */
label{

    display:block;

    margin-bottom:8px;
    margin-top:18px;

    color:#facc15;

    font-size:15px;
    font-weight:600;
}

/* Inputs & Textarea */
input,
textarea{

    width:100%;

    padding:15px 18px;

    border:none;

    outline:none;

    border-radius:14px;

    background:rgba(255,255,255,0.08);

    color:white;

    font-size:15px;

    transition:0.3s ease;

    border:
    1px solid rgba(255,255,255,0.06);
}

/* Placeholder */
input::placeholder,
textarea::placeholder{

    color:#d1d5db;
}

/* Focus Effect */
input:focus,
textarea:focus{

    border-color:#d4af37;

    box-shadow:
    0 0 18px rgba(212,175,55,0.2);
}

/* Textarea */
textarea{

    resize:none;
}

/* Button */
button{

    width:100%;

    margin-top:28px;

    padding:15px;

    border:none;

    border-radius:16px;

    background:
    linear-gradient(
    135deg,
    #d4af37,
    #facc15
    );

    color:black;

    font-size:17px;
    font-weight:700;

    cursor:pointer;

    transition:0.35s ease;

    box-shadow:
    0 8px 25px rgba(212,175,55,0.35);
}

/* Button Hover */
button:hover{

    transform:
    translateY(-4px)
    scale(1.02);

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

    h1{

        font-size:30px;
    }

    .header-menu{

        flex-direction:column;

        gap:18px;
    }

    .container{

        padding:30px 22px;
    }

    .container h2{

        font-size:28px;
    }
}

/* Small Mobile */
@media(max-width:480px){

    h1{

        font-size:26px;
    }

    .container h2{

        font-size:24px;
    }
}

</style>
</head>

<body>
    <div class="ig"></div>
    <div class="content">

<h1>CarSpareHub</h1>

<div class="header-menu">
    <h3><i class="fas fa-camera" ></i><a href="about.php">About</a></h3>
    <!-- <h3><i class="fas fa-shopping-cart"></i><a href="order.php">Add Order</a></h3> -->
    <h3><i class="fas fa-store"></i><a href="shop.php">Shop</a></h3>
    <h3><i class="fas fa-user"></i><a href="contact.php">Contact</a></h3>
</div>

<div class="container">
    <h2>Contact Us</h2>

    <?php if($msg != "") echo "<p class='success'>$msg</p>"; ?>

    <form action="contact.php" method="POST">
        <label>Your Name</label>
        <input type="text" name="name" required>

        <label>Your Email</label>
        <input type="email" name="email">

        <label>Your Phone</label>
        <input type="text" name="phone" required>

        <label>Your Message</label>
        <textarea name="message" rows="5" required></textarea>

        <button type="submit">Send Message</button>
    </form>
</div>
</div>
</body>
</html>
