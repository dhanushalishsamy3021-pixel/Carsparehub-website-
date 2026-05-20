<?php
include "db.php";

$name = $_GET['name'] ?? '';
$model = $_GET['model'] ?? '';
$category = $_GET['category'] ?? 'engineparts';

$categories=[
    'engineparts'=>'Engine Parts',
    'gearparts'=>'Gear parts',
    'breaksystem'=>'Break System',
    'electricalpart'=>'Electrical Part'
];

if(!array_key_exists($category,$categories)){
    $category='engineparts';
}

$sql = "SELECT * FROM $category WHERE 1=1";
$params = [];
$types = "";

if($name){
    $sql .= " AND name=?";
    $params[] = $name;
    $types .= "s";
}
if($model){
    $sql .= " AND model=?";
    $params[] = $model;
    $types .= "s";
}

$stmt = $conn->prepare($sql);

if ($params){
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Car spare parts shop</title>
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
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
    url('https://images.unsplash.com/photo-1503376780353-7e6692767b70');

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

/* Main Heading */
h1{

    text-align:center;

    padding:30px;

    font-size:46px;
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

    box-shadow:
    0 5px 20px rgba(0,0,0,0.45);
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

    border-bottom:
    1px solid rgba(255,255,255,0.08);
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

/* Filter Form */
form{

    width:92%;
    max-width:1100px;

    margin:35px auto;

    padding:25px;

    border-radius:22px;

    background:rgba(255,255,255,0.06);

    backdrop-filter:blur(12px);

    border:
    1px solid rgba(255,255,255,0.08);

    display:flex;

    justify-content:center;

    gap:15px;

    flex-wrap:wrap;

    box-shadow:
    0 10px 25px rgba(0,0,0,0.35);
}

/* Inputs */
form input,
form select{

    padding:14px 18px;

    border:none;

    outline:none;

    border-radius:12px;

    background:rgba(255,255,255,0.08);

    color:white;

    font-size:15px;

    min-width:180px;
}

/* Placeholder */
form input::placeholder{

    color:#d1d5db;
}

/* Select Option */
form select option{

    color:black;
}

/* Filter Button */
form button{

    padding:14px 28px;

    border:none;

    border-radius:12px;

    background:
    linear-gradient(
    135deg,
    #d4af37,
    #facc15
    );

    color:black;

    font-size:16px;
    font-weight:700;

    cursor:pointer;

    transition:0.35s ease;

    box-shadow:
    0 8px 25px rgba(212,175,55,0.35);
}

/* Button Hover */
form button:hover{

    transform:
    translateY(-4px)
    scale(1.03);

    background:
    linear-gradient(
    135deg,
    #facc15,
    #d4af37
    );
}

/* Category Heading */
h2{

    text-align:center;

    margin-top:20px;

    font-size:34px;

    color:#facc15;

    letter-spacing:1px;
}

/* Product Grid */
.grid{

    width:92%;

    max-width:1300px;

    margin:40px auto;

    display:grid;

    grid-template-columns:
    repeat(auto-fit,minmax(280px,1fr));

    gap:30px;
}

/* Product Card */
.parts{

    position:relative;

    overflow:hidden;

    background:rgba(255,255,255,0.07);

    backdrop-filter:blur(14px);

    border-radius:24px;

    padding:22px;

    border:
    1px solid rgba(255,255,255,0.08);

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

/* Product List */
.parts ul{

    list-style:none;
}

/* Product Items */
.parts li{

    margin-bottom:10px;

    font-size:15px;

    line-height:1.6;

    color:#e5e7eb;
}

/* Strong Text */
.parts strong{

    color:#facc15;
}

/* Order Button */
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

/* Mobile Responsive */
@media(max-width:768px){

    .head{

        flex-direction:column;

        gap:18px;
    }

    h1{

        font-size:30px;
    }

    h2{

        font-size:24px;
    }

    form{

        padding:20px;
    }

    form input,
    form select,
    form button{

        width:100%;
    }

    .grid{

        grid-template-columns:1fr;
    }
}

</style>
</head>
<body>
<div class="ig"></div>
    <div class="content">

<h1>CarSpareHub</h1>

<div class="head">
<h3><i class="fas fa-camera"></i><a href="about.php">About</a></h3>
<h3><i class="fas fa-store"></i><a href="shop.php">Shop</a></h3>
<h3><i class="fas fa-user"></i><a href="contact.php">Contact</a></h3>
</div>

<form method="get">
<select name="category">
<?php foreach($categories as $key => $label): ?>
    <option value="<?= $key ?>" <?= $category==$key?'selected':'' ?>>
        <?= $label ?>
    </option>
<?php endforeach; ?>
</select>
<select name="name">
    <option value="">All Names</option>
    <?php
    $names_result = $conn->query("SELECT DISTINCT name FROM $category");
    while($name_row = $names_result->fetch_assoc()):
    ?>
    <option value="<?= htmlspecialchars($name_row['name']) ?>" <?= $name==$name_row['name']?'selected':'' ?>>
        <?= htmlspecialchars($name_row['name']) ?>
    </option>
    <?php endwhile; ?>
    </select>
<select name="model">
    <option value="">All Models</option>
    <?php
    $models_result = $conn->query("SELECT DISTINCT model FROM $category");
    while($model_row = $models_result->fetch_assoc()):
    ?>
    <option value="<?= htmlspecialchars($model_row['model']) ?>" <?= $model==$model_row['model']?'selected':'' ?>>
        <?= htmlspecialchars($model_row['model']) ?>
    </option>
    <?php endwhile; ?>
    </select>
<button type="submit">Filter</button>
</form>

<h2>
    <?= $categories[$category] ?>
    <?= $name ? ' - '.strtoupper($name) : '' ?>
    <?= $model ? ' - '.$model : '' ?>
</h2>

<div class="grid">
<?php while($row = $result->fetch_assoc()): ?>
<div class="parts">

    <img src="<?= $row['image'] ?>" alt="<?= htmlspecialchars($row['name']) ?>">

    <ul>
        <li><strong>ID:</strong> <?= $row['id'] ?></li>
        <li><strong>Name:</strong> <?= $row['name'] ?></li>
        <li><strong>Price:</strong> ₹<?= $row['price'] ?></li>
        <?php if(isset($row['symptoms'])): ?>
            <li><strong>Symptoms:</strong> <?= $row['symptoms'] ?></li>
        <?php endif; ?>
        <li><strong>Model:</strong> <?= $row['model'] ?></li>
    </ul>

    <a class="order-btn" href="order.php?id=<?= $row['id'] ?>&part_name=<?= urlencode($row['name']) ?>&price=<?= urlencode($row['price']) ?>&brand=<?= urlencode($row['brand'] ?? '') ?>">Add Order</a>

</div>
<?php endwhile; ?>
</div>
        </div>
</body>
</html>
