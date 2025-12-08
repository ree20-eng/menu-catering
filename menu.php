<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Menu Paket Catering</title>
    <link href="https://fonts.googleapis.com/css2?family=Salsa&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

<style>
/* ======== BODY ======== */
body {
    font-family: "Salsa", sans-serif;
    background:rgb(255, 255, 255);
    padding: 20px;
    margin: 0;
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

/* ======== SIDEBAR ======== */
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

/* ======== MENU PAKET ======== */
h1 {
    color: orange;
    font-family: 'salsa', cursive;
    font-size: 28px;
    margin-bottom: 0;
   
}

.subjudul {
    margin-top: 0;
    font-size: 16px;font-family: 'salsa', cursive;
}

.paket-card {
    display: flex;
    background: #ececec;
    border: 2px solid #5a5a5a;
    padding: 10px;
    border-radius: 18px;
    margin: 15px 0;
    gap: 20px;
}

.paket-img img {
    width: 130px;
    height: 130px;
    margin-left: 15px;
    margin-right: 15px;
    border-radius: 12px;
    object-fit: cover;
}

.btn-pesan {
    display: block;
    background: orange;
    color: white;
    padding: 10px;
    text-align: center;
    border-radius: 10px;
    margin-top: 7px;
    margin-left: 7px;
    text-decoration: none;
    font-weight: bold;
    width: 120px;
}

.rating {
    margin-top: 10px;
    font-size: 14px;
   
    height: 16px;
    font-family: 'salsa', cursive;
}

.paket-info {
    width: 100%;
    font-family: 'salsa', cursive;
    margin-left: 20px;
   
    margin-bottom: 0;
}


.paket-info h3 {
    margin: 0 0 10px 0;
    margin-left: 5px;
    font-size: 20px;
    font-weight: bold;
}

.harga {
    font-size: 17px;
    margin-top: 10px;
    font-weight: bold;
    margin-left: 5px;
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

<!-- ===== NAVBAR ===== -->
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

<!-- ===== SIDEBAR ===== -->
<div class="sidebar" id="sidebar">
    <a href="menu_paket.php">Menu Paket</a>
    <a href="menu_costum.php">Menu Costum</a>
    <a href="transaksi.php">Transaksi</a>
    <a href="status.php">Status</a>
    <a href="ulasan.php">Ulasan</a>
</div>
<div id="overlay" onclick="closeSidebar()"></div>


<!-- ===== JUDUL ===== -->
<h1>MENU PAKET</h1>
<p class="subjudul">(Menu paket khas Jawa rumahan & acara hajatan)</p>

<?php
$query = mysqli_query($koneksi, "SELECT * FROM menu_paket");

while ($data = mysqli_fetch_array($query)) {
?>
    <div class="paket-card">

        <!-- FOTO + TOMBOL + RATING -->
        <div class="paket-img">
            <img src="img/<?php echo $data['gambar']; ?>">

            <a class="btn-pesan" 
               href="pesan.php?id=<?php echo $data['id']; ?>">
               Pesan Sekarang
            </a>

            <p class="rating">
                ⭐ <?php echo $data['rating']; ?>/5 
                (<?php echo $data['ulasan']; ?> Ulasan)
            </p>
        </div>

        <!-- INFO -->
        <div class="paket-info">
            <h3><?php echo $data['nama_paket']; ?></h3>

            <p><?php echo nl2br($data['deskripsi']); ?></p>

            <p class="harga">
                Harga: Rp <?php echo number_format($data['harga']); ?>,-
            </p>
        </div>

    </div>
<?php 
} 

?>
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
