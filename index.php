<?php
require_once 'Menu.php';
$view_menu = new Menu($pdo);
$menu = $view_menu->getAllMenu();

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> &#127856; Novee's Cake</title>
  <link rel="stylesheet" href="./css/style.css">
  <!-- link feather icon -->
  <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
  <!-- Navigation bar -->
  <nav>
    <!-- Logo Pada Navigation Bar -->
    <a href="#" class="navbar-logo">Novee's Cakes</a>
    <!-- List Menu Halaman pada Navigation bar -->
    <div class="navbar-nav">
      <a href="#landing-page">Home</a>
      <a href="#about-us">About Us</a>
      <a href="#menu">Menu</a>
      <?php if (!isset($_SESSION['loggedin'])) {
        echo '<a href="./login.php">Login</a>';
      } ?>
      <?php if (isset($_SESSION['loggedin'])) {
        echo '<a href="./logout.php">Logout</a>';
      } ?>
    </div>
    <!-- Responsive Side Menu Navigation -->
    <a href="#" id="menu-bar"><i data-feather="menu"></i></a>
  </nav>
  <!-- Landing Page -->
  <section class="landing-page" id="landing-page">
    <div class="text">
      <h1>Novee's Cakes</h1>
      <p>
        Ciptakan Kenangan Manis, Temukan Kelezatan Sejati di Setiap Gigitan!
      </p>
      <?php if (isset($_SESSION['loggedin'])) {
        echo '<h2> Selamat Datang, ' . $_SESSION['nama_pelanggan'] .  '</h2>';
      } ?>
      <a href="add_orders.php">
        <button class="btn">Pesan Sekarang</button>
      </a>
    </div>
  </section>

  <!-- About Us -->
  <section class="about-us" id="about-us">
    <header>
      <h1>About Us</h1>
    </header>
    <div class="container">
      <div class="content">
        <div class="picture">
          <img src="./img/about-image.jpg" alt="" />
        </div>
        <div class="text">
          <h1>Novee's Cakes</h1>
          <p>Kami dengan bangga mempersembahkan kepada Anda pengalaman tak terlupakan dalam dunia kue dan penganan
            manis. Di <b>Novee's Cakes</b>, kami tidak hanya menyajikan kue-kue lezat, tetapi juga menciptakan
            momen-momen istimewa yang membekas di setiap kenangan.</p>
          <p>
            Dibangun dengan cinta dan dedikasi, toko kue kami menjadi destinasi utama bagi para pencinta kue yang
            menghargai kualitas, rasa autentik, dan keindahan dalam setiap sajian. Setiap kue kami merupakan karya seni
            yang tercipta melalui pemilihan bahan terbaik dan sentuhan ahli dari para pastry chef berbakat kami.
          </p>
          <p>
          Dari klasik hingga inovatif, kami menawarkan beragam kue yang memikat setiap selera. Apakah Anda mencari kue
          ulang tahun yang istimewa, kue pengantin yang elegan, atau sekadar ingin memanjakan diri dengan pilihan kue
          harian, Novee's Cakes memiliki sesuatu untuk semua orang.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Menu -->
  <section class="menu" id="menu">
    <header>
      <h1>Menu</h1>
    </header>
    <div id="container-slider">
      <!-- Menu Slider -->
      <div class="slider">
        <?php
          foreach ($menu as $view_menu) 
          { ?>
        <div class="item-menu">
          <img src="./img/menu/<?php echo htmlspecialchars($view_menu['image']); ?>" alt="" />
          <h2><?php echo htmlspecialchars($view_menu['nama_menu']); ?></h2>
          <p>
            <?php echo htmlspecialchars($view_menu['deskripsi']); ?>
          </p>
          <h3>Rp. <?php echo htmlspecialchars($view_menu['harga_menu']); ?></h3>
        </div>
      <?php } ?>
        <!-- Tomboo maju mundur slider -->
        <div class="slider-button">
          <button id="prev">
            <</button>
              <button id="next">></button>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="navbar-nav">
      <a href="#landing-page">Home</a>
      <a href="#about-us">About Us</a>
      <a href="#menu">Menu</a>
    </div>
    <p>Created by <a href="">Krishn</a> | &copy; 2023.</p>
  </footer>


  <!-- Feather Icons -->
  <script>
    feather.replace()
  </script>
  <!-- srcipt js -->
  <script src="./js/script.js"></script>
</body>

</html>