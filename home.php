<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Astaguna Jawa Catering</title>
    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #ffffff;
        }

        /* NAVBAR */
        .navbar {
            width: 100%;
            background: white;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            padding: 20px 20px;
            margin-top: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
            position: sticky;
            top: 0;
            z-index: 10;
        }
        

        .nav-left-icon {
            font-size: 30px;
            cursor: pointer;
            color: #ff9800;
        }

        .logo {
            font-size: 26px;
            font-weight: bold;
            color: #000;
        }

        .cart {
            font-size: 28px;
            color: #ff9800;
            cursor: pointer;
        }

        /* SIDE MENU */
        .sidebar {
            width: 250px;
            height: 100%;
            position: fixed;
            left: 0;
            top: 0;
            background: #ffa200;
            padding-top: 40px;
            transform: translateX(-260px);
            transition: 0.3s;
        }

        .sidebar a {
            display: block;
            padding: 15px 25px;
            color: white;
            font-size: 22px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: #ffbb33;
        }

        .hero {
            width: 100%;
            height: 260px;
            background-size: cover;
            background-position: center;
        }

        .hero-content {
            text-align: center;
            margin-top: -160px;
            color: white;
            text-shadow: 2px 2px 4px black;
        }

        .btn-pesan {
            background: #ff9800;
            padding: 12px 25px;
            font-size: 20px;
            border-radius: 10px;
            text-decoration: none;
            color: white;
        }

        h2 {
            text-align: center;
            padding: 15px;
            background: #ffa200;
            color: white;
            margin-top: 20px;
        }

        /* BEST SELLER */
        .best-container {
            width: 95%;
            margin: auto;
            display: flex;
            gap: 15px;
            justify-content: center;
            padding-bottom: 30px;
        }

        .best-item {
            width: 160px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.15);
            overflow: hidden;
        }

        .best-item img {
            width: 100%;
            height: 120px;
            object-fit: cover;
        }

        .best-item div {
            text-align: center;
            padding: 8px;
            background: #ff9800;
            color: white;
        }
    </style>
</head>
<body>

<!-- SIDEBAR MENU -->
<div id="sidebar" class="sidebar">
    <a href="#">Menu</a>
    <a href="#">Pemesanan</a>
    <a href="#">Status</a>
    <a href="#">Ulasan</a>
    <a href="#">Admin</a>
</div>

<!-- NAVBAR -->
<div class="navbar">
    <div class="nav-left-icon" onclick="toggleMenu()">☰</div>
    <div class="logo">🍴 Astaguna Jawa Catering</div>
    <div class="cart">🛒</div>
</div>

<!-- HERO SECTION -->
<div class="hero" style="background-image: url('img/hero.jpg');"></div>

<div class="hero-content">
    <h1>Everyone Favorite</h1>
    <a href="#" class="btn-pesan">pesan sekarang →</a>
</div>

<h2>- Our Best Seller Menu -</h2>

<div class="best-container">
    <div class="best-item">
        <img src="img/menu1.jpg">
        <div>Nasi Kotak</div>
    </div>

    <div class="best-item">
        <img src="img/menu2.jpg">
        <div>Nasi Ayam</div>
    </div>

    <div class="best-item">
        <img src="img/menu3.jpg">
        <div>Prasmanan</div>
    </div>

    <div class="best-item">
        <img src="img/menu4.jpg">
        <div>Snack Box</div>
    </div>
</div>

<script>
function toggleMenu() {
    var sb = document.getElementById('sidebar');
    if (sb.style.transform === 'translateX(0px)') {
        sb.style.transform = 'translateX(-260px)';
    } else {
        sb.style.transform = 'translateX(0px)';
    }
}
</script>

</body>
</html>
