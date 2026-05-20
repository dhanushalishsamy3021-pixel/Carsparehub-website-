<?php include "db.php"; ?>
<?php
$brand = $_GET['brand'] ?? '';
$part_name = $_GET['name'] ?? $_GET['part_name'] ?? '';
$price = $_GET['price'] ?? '';

echo "<h2>Showing products for: " . strtoupper($brand) . "</h2>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Now</title>

    <style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Segoe UI',sans-serif;
    background:#0f172a;
    min-height:100vh;
    overflow-x:hidden;
    color:white;
    position:relative;
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
    linear-gradient(rgba(0,0,0,0.82),rgba(0,0,0,0.86)),
    url('https://images.unsplash.com/photo-1503376780353-7e6692767b70');

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;

    z-index:-1;
}

/* Top Brand */
.brand-title{
    text-align:center;
    font-size:34px;
    font-weight:700;
    color:#ffffff;
    margin-bottom:25px;
    letter-spacing:1px;
}

.brand-title span{
    color:#d4af37;
}

/* Order Card */
.order-box{

    width:100%;
    max-width:520px;

    margin:50px auto;

    background:rgba(255,255,255,0.06);

    backdrop-filter:blur(12px);

    border:1px solid rgba(255,255,255,0.08);

    border-radius:24px;

    padding:35px;

    box-shadow:
    0 12px 35px rgba(0,0,0,0.45),
    0 0 25px rgba(212,175,55,0.08);
}

/* Heading */
.order-box h2{

    text-align:center;

    font-size:32px;

    margin-bottom:30px;

    color:#ffffff;

    letter-spacing:1px;
}

.order-box h2 span{
    color:#d4af37;
}

/* Labels */
label{

    display:block;

    margin-top:16px;
    margin-bottom:8px;

    font-size:15px;
    font-weight:600;

    color:#e2e8f0;
}

/* Inputs */
input,
textarea,
select{

    width:100%;

    padding:14px 15px;

    border-radius:14px;

    border:1px solid rgba(255,255,255,0.08);

    background:rgba(255,255,255,0.07);

    color:white;

    font-size:15px;

    outline:none;

    transition:0.3s ease;
}

/* Placeholder */
input::placeholder,
textarea::placeholder{
    color:#cbd5e1;
}

/* Focus */
input:focus,
textarea:focus,
select:focus{

    border-color:#d4af37;

    box-shadow:0 0 15px rgba(212,175,55,0.22);

    background:rgba(255,255,255,0.09);
}

/* Dropdown */
select{
    cursor:pointer;
}

/* Button */
button{

    width:100%;

    margin-top:28px;

    padding:15px;

    border:none;

    border-radius:16px;

    background:linear-gradient(135deg,#d4af37,#facc15);

    color:black;

    font-size:17px;
    font-weight:700;

    cursor:pointer;

    transition:0.35s ease;

    box-shadow:0 8px 24px rgba(212,175,55,0.25);
}

button:hover{

    transform:translateY(-4px);

    background:linear-gradient(135deg,#facc15,#d4af37);

    box-shadow:0 12px 28px rgba(250,204,21,0.35);
}

/* Small top heading */
.top-show{

    text-align:center;

    margin-top:20px;

    color:#ffffff;

    font-size:18px;

    font-weight:600;
}

.top-show span{
    color:#d4af37;
}

/* Mobile */
@media(max-width:768px){

    .order-box{
        width:92%;
        padding:28px 20px;
    }

    .order-box h2{
        font-size:26px;
    }

    .brand-title{
        font-size:26px;
    }
}

</style>
</head>
<body>

    <div class="order-box">
        <h2>Order Now</h2>

        <form action="addorder.php" method="POST">

            <label>Your Name</label>
            <input type="text" name="customer_name" required>

            <label>Mobile Number</label>
            <input type="text" name="phone" pattern="[0-9]{10}" maxlength="10" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Address</label>
            <textarea name="address" rows="3" required></textarea>

            <label>Part Name</label>
            <input type="text" name="name" value="<?php echo($part_name); ?>" required>
             
            <label>Price</label>
            <input type="text" name="price" value="<?php echo($price); ?>" required>

            <label>Brand</label>
            <input type="text" name="brand" value="<?php echo($brand); ?>" required>
            
            <label>Quantity</label>
            <input type="number" name="qty" min="1" required>

            <label>Payment</label>
            <select name="payment" id="">
                <option value="">Please choose the payment</option>
                <option value="case on delivery">Case On Delivery</option>
                <option value="upi">UPI</option>
                <option value="net banking">Net Banking</option>
    </select>

            <button type="submit">Place Order</button>
            
          </form>
    </div>

</body>
</html>

