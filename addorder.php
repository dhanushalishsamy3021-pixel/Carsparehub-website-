<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

include "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name    = $_POST['customer_name'] ?? '';
    $phone   = $_POST['phone'] ?? '';
    $email   = $_POST['email'] ?? '';
    $address = $_POST['address'] ?? '';
    $part    = $_POST['name'] ?? '';
    $price   = $_POST['price'] ?? '';
    $brand   = $_POST['brand'] ?? '';  
    $qty     = $_POST['qty'] ?? '';

    $stmt = $conn->prepare("
        INSERT INTO orders (customer_name, phone, email, address, name, price, brand, qty)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ");

    if (!$stmt) {
        die("SQL ERROR: " . $conn->error);
    }

    $stmt->bind_param(
        "sssssisi",
        $name, 
        $phone, 
        $email, 
        $address, 
        $part, 
        $price, 
        $brand, 
        $qty
    );

    if ($stmt->execute()) {

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'kingthanushkingthanush@gmail.com';
            $mail->Password   = 'wbgk uxjb nsnz crkg';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom('noreply@yourwebsite.com', 'Your Website');
            $mail->addAddress('kingthanushkingthanush@gmail.com');

            if (!empty($email)) {
                $mail->addAddress($email);
            }

            $mail->isHTML(true);
            $mail->Subject = 'Order Confirmation - CarSpareHub';
            $mail->Body = "
            <html>
            <body style='font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;'>
                <div style='background-color: #fff; padding: 20px; border-radius: 8px; max-width: 600px; margin: auto;'>
                    <h2 style='color: #ff6600;'>CarSpareHub Order Confirmation</h2>
                    <p>Dear <strong>{$name}</strong>,</p>
                    <p>Thank you for your order! Here are your order details:</p>
                    <table style='width: 100%; border-collapse: collapse; margin-top: 10px;'>
                        <tr style='background-color: #f8f8f8;'><th style='padding: 8px; border: 1px solid #ddd; text-align: left;'>Part Name</th><td style='padding: 8px; border: 1px solid #ddd;'>{$part}</td></tr>
                        <tr><th style='padding: 8px; border: 1px solid #ddd; text-align: left;'>Brand</th><td style='padding: 8px; border: 1px solid #ddd;'>{$brand}</td></tr>
                        <tr style='background-color: #f8f8f8;'><th style='padding: 8px; border: 1px solid #ddd; text-align: left;'>Price</th><td style='padding: 8px; border: 1px solid #ddd;'>{$price}</td></tr>
                        <tr><th style='padding: 8px; border: 1px solid #ddd; text-align: left;'>Quantity</th><td style='padding: 8px; border: 1px solid #ddd;'>{$qty}</td></tr>
                        <tr style='background-color: #f8f8f8;'><th style='padding: 8px; border: 1px solid #ddd; text-align: left;'>Address</th><td style='padding: 8px; border: 1px solid #ddd;'>{$address}</td></tr>
                        <tr><th style='padding: 8px; border: 1px solid #ddd; text-align: left;'>Phone</th><td style='padding: 8px; border: 1px solid #ddd;'>{$phone}</td></tr>
                    </table>
                    <p style='margin-top: 20px;'>We will process your order soon.</p>
                    <p>Best regards,<br><strong>CarSpareHub Team</strong></p>
                </div>
            </body>
            </html>";

            $mail->send();
            
        } catch (Exception $e) {
            echo "<script>alert('Order saved but email could not be sent!');</script>";
        }

        echo "
        <!DOCTYPE html>
        <html>
        <head>
        <title>Order Success</title>
        <style>
            body{
                margin:0;
                font-family: Arial, sans-serif;
                background:linear-gradient(rgb(0,0,0), rgb(13,46,136));
                display:flex;
                justify-content:center;
                align-items:center;
                height:100vh;
            }
            .success-box{
                background:linear-gradient(rgb(0,0,0), rgb(20,70,150));
                padding:40px;
                border-radius:12px;
                box-shadow:0 0 20px rgba(255,102,0,0.7);
                text-align:center;
                width:400px;
                color:#ff6600;
            }
            .success-box h2{
                font-size:28px;
                margin-bottom:10px;
            }
            .success-box p{
                font-size:18px;
                margin-bottom:20px;
            }
            .success-box a{
                display:inline-block;
                background:#ff6600;
                padding:10px 25px;
                border-radius:6px;
                color:white;
                text-decoration:none;
                font-weight:bold;
                box-shadow:0 0 10px rgba(255,102,0,0.5);
                transition:0.3s;
            }
            .success-box a:hover{
                background:#ffd500;
                color:black;
            }
            .check-icon{
                font-size:55px;
                color:#ffd500;
            }
        </style>
        </head>
        <body>
            <div class='success-box'>
                <div class='check-icon'>✔</div>
                <h2>Order Placed Successfully!</h2>
                <p>Your order has been submitted successfully.<br>Check your email for confirmation.</p>
                <a href='shop.php'>Back to Shop</a>
            </div>
        </body>
        </html>
        ";
        exit();

    } else {
        echo "<script>alert('Order failed. Try again!'); window.location='order.php';</script>";
    }
}
?>
