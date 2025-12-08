<?php
include 'config.php';

// Daftar kategori
$kategoriList = [
    "lauk" => "Lauk Utama",
    "sayur" => "Sayur & Pendamping",
    "minuman" => "Minuman",
    "paketan" => "Paket Snack Jawa"
];

// Ambil data dari database
$sql = "SELECT * FROM menu_costum ORDER BY kategori, id ASC";
$result = mysqli_query($koneksi, $sql);

// Kelompokkan data berdasarkan kategori
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $kat = $row['kategori'];
    if (!isset($data[$kat])) $data[$kat] = [];
    $data[$kat][] = $row;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Menu Custom</title>
    <link href="https://fonts.googleapis.com/css2?family=Salsa&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Salsa', sans-serif;
            background: #fffdfa;
            margin: 0;
            padding: 0;
        }
        /* ======== NAVBAR ======== */
.navbar {
    display: flex;
    align-items: center ;
    justify-content: space-between;
    padding: 12px 10px;
    background:rgb(255, 255, 255);
    border-bottom: 2px solid #e6e6e6;
    border-radius: 10px;
    margin-bottom: 0px;
}

.menu-btn {
    font-size: 28px;
    cursor: pointer;
}

.logo-icon {
    width: 30px;
    margin-right: 6px;
    color: #ff9f1c;
}

.nav-title {
    display: flex;
    font-family: 'salsa', cursive;
    align-items: center;
    font-size: 20px;
    font-weight: bold;
}

.nav-right img {
    width: 28px;
    cursor: pointer;
}
    .sidebar {
        position: fixed;
        top: 0;
        left: -260px;
        width: 240px;
        height: 100%;
        background:#ff9f1c;
        box-shadow: 3px 0px 8px rgba(0,0,0,0.2);
        padding-top: 70px;
        transition: 0.3s;
        border-right: 2px solid #e0e0e0;
        z-index: 9999;
}

.sidebar a {
    display: block;
    padding: 14px 22px;
    font-size: 17px;
    color: black;
    text-decoration: none;
    border-bottom: 1px solid #f0f0f0;
}
.sidebar a:hover {
    background: #ffe2b3;
}
.sidebar.active {
    left: 0;
}

/* ======= OVERLAY ======= */
#overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.4);
    display: none;
    z-index: 500;
}

#overlay.active {
    display: block;
}


        h1 {
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            font-family: "Comic Sans MS";
            margin-top: 20px;
        }

        p.sub {
            text-align: center;
            margin-top: -10px;
        }

        h2.section-title {
            text-align: center;
            font-size: 28px;
            margin: 30px 0 10px;
            font-weight: bold;
            font-family: "Comic Sans MS";
        }

        .line {
            width: 90%;
            height: 3px;
            background: #ff9c00;
            margin: 20px auto;
        }

        /* GRID MENU BIASA */
        .menu-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 25px;
            
            margin-bottom: 40px;
            font-family: 'salsa', cursive;
        }

        .card {
            width: 155px;
            background: #e7e7e7;
            padding: 10px;
            border-radius: 22px;
            text-align: center;
            box-shadow: 3px 3px 6px #b5b5b5;
        }

        .card img {
            width: 100%;
            height: 95px;
            object-fit: cover;
            border-radius: 15px;
        }

        .nama_item {
            font-weight: bold;
            margin-top: 8px;
            font-size: 16px;

        }

        .harga {
            margin-top: 10px ;

            font-size: 14px;
           
        }

        .btn-add {
            margin-top: 8px;
            border: 2px solid #000;
            border-radius: 15px;
            padding: 5px 15px;
            display: inline-block;
            cursor: pointer;
            font-weight: bold;
        }

        /* PAKET SNACK JAWA (KHUSUS) */
        .paketan-box {
            width: 75%;
            background: #ffe3b0;
            padding: 15px;
            border-radius: 18px;
            box-shadow: 3px 3px 10px #c9a86d;
            display: flex;
            gap: 18px;
            align-items: center;
            margin: 0 auto 25px auto;
        }

        .paketan-img {
            width: 200px;
            height: 260px;
            object-fit: cover;
            border-radius: 15px;
        }

        .paketan-text {
            flex: 1;
        }

        .paketan-text .nama_item {
            font-size: 20px;
            margin-bottom: 6px;
            font-weight: bold;
        }

        .paketan-text .harga {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .paketan-text .desc {
            font-size: 14px;
            line-height: 1.4;
            margin-bottom: 10px;
        }
        /* ==== BAGIAN INPUT PORSI & TOTAL ==== */
.porsi-box {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 18px;
    margin-top: 25px;
    font-family: 'Salsa', cursive;
}

.porsi-btn {
    background: none;
    border: none;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.porsi-input {
    padding: 8px 14px;
    border: 2px solid black;
    border-radius: 14px;
    font-size: 18px;
    width: 180px;
    text-align: center;
    font-family: 'Salsa', cursive;
}

.total-box {
    width: 90%;
    margin: 20px auto;
    background: #e7e7e7;
    border-radius: 15px;
    padding: 12px;
    border: 2px solid black;
    font-size: 26px;
    font-family: 'Salsa', cursive;
}

.total-line {
    width: 96%;
    height: 2px;
    background: black;
    margin: 0 auto 5px auto;
    border-radius: 2px;
}

/* ==== TOMBOL BAWAH ==== */
.btn-container {
    width: 90%;
    margin: 25px auto;
    display: flex;
    justify-content: space-between;
    gap: 15px;
}

.btn-keranjang {
    flex: 1;
    background: #5a5a5a;
    color: white;
    padding: 14px;
    font-size: 17px;
    border-radius: 18px;
    font-family: 'Salsa', cursive;
    border: 2px solid black;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.btn-form {
    flex: 1;
    background: #ff9f1c;
    color: black;
    padding: 14px;
    font-size: 17px;
    border-radius: 18px;
    font-family: 'Salsa', cursive;
    border: 2px solid black;
    font-weight: bold;
}

    </style>
<script>
function toggleSidebar() {
    let sb = document.getElementById("sidebar");
    sb.style.left = (sb.style.left === "0px") ? "-260px" : "0px";
}
</script>
</head>

<body>
<div class="navbar">
    <div class="nav-left">
        <span class="menu-btn" onclick="toggleSidebar()">☰</span>
    </div>

    <div class="nav-title">
        <img src="img/plate.png" class="logo-icon">
        <span>Astaguna Jawa Catering</span>
    </div>

    <div class="nav-right">
        <img src="img/cart.png">
    </div>
</div>
<div class="sidebar" id="sidebar">
    <a href="menu.php">Menu Paket</a>
    <a href="menu_costum.php">Menu Costum</a>
    <a href="transaksi.php">Transaksi</a>
    <a href="status.php">Status</a>
    <a href="ulasan.php">Ulasan</a>
</div>

    <h1>MENU CUSTOM</h1>
    <p class="sub">(Bisa dicampur sesuai selera & kebutuhan acara)</p>
    <div class="line"></div>

    <?php
    // Atur urutan tampilan
    $urutan = ["lauk", "sayur", "minuman", "paketan"];

    foreach ($urutan as $kat) {
        if (!isset($data[$kat])) continue;

        echo "<h2 class='section-title'>~" . $kategoriList[$kat] . "~</h2>";

        if ($kat == "paketan") {
            foreach ($data[$kat] as $m) {
                echo 
                <div class='paketan-box'>
                    <img class='paketan-img' src='img/{$m['gambar']}'>
                    <div class='paketan-text'>
                        <div class='nama_item'>{$m['nama_item']}</div>
                        <div class='harga'>Rp 7.000 - 12.000</div>

                        <div class='desc'>
                            Isi paket:<br>
                            • Onde-onde<br>
                            • Arem-arem<br>
                            • Klepon<br>
                            • Wajik ketan<br>
                            • Pisang goreng
                        </div>

                        <div class='btn-add'>+1</div>
                    </div>
                </div>
                ;
            }
            echo "<div class='line'></div>";
            continue;
        }

        // === MENU BIASA (LAUK / SAYUR / MINUMAN) ===
        echo "<div class='menu-container'>";
        foreach ($data[$kat] as $m) {
            echo "
            <div class='card'>
                <img src='img/{$m['gambar']}'>
                <div class='nama_item'>{$m['nama_item']}</div>
                <div class='harga'>Rp " . number_format($m['harga'], 0, ',', '.') . "</div>
                <div class='btn-add'>+1</div>
            </div>";
        }
        echo "</div><div class='line'></div>";
    }
    
    ?>
    <!-- Garis -->
<div class="line"></div>

<!-- Input Jumlah Porsi -->
<div class="porsi-box">
    <button class="porsi-btn">−</button>
    <input type="text" class="porsi-input" placeholder="Masukan Jumlah Porsi">
    <button class="porsi-btn">+</button>
</div>

<!-- Total -->
<div class="total-box">
    <div class="total-line"></div>
    Total : <span id="totalHarga">0</span>
</div>

<!-- Tombol Keranjang & Form -->
<div class="btn-container">
    <div class="btn-keranjang">
        <img src="img/cart.png" style="width:22px;">
        Masukan Keranjang
    </div>

    <div class="btn-form">
        Isi Form Datadiri
    </div>
</div>

<script>
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');

function toggleSidebar() {
    sidebar.classList.toggle('active');
    overlay.classList.toggle('active');
}

function closeSidebar() {
    sidebar.classList.remove('active');
    overlay.classList.remove('active');
}
</script>
</body>

</html>