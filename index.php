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
      <a href="#contact">Contact</a>
      <a href="./login.php">Login</a>
      <a href="./logout.php">Logout</a>
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
      <button>Learn More</button>
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
        <div class="item-menu">
          <img src="./img/landing-page-bg.jpg" alt="" />
          <h2>Hello</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque
            vero commodi porro dignissimos. Sequi libero minus quis, deleniti
            voluptatibus odit saepe? Recusandae quisquam dicta exercitationem
            modi quas ullam perferendis ab!
          </p>
        </div>
        
        <!-- Tomboo maju mundur slider -->
        <div class="slider-button">
          <button id="prev">
            <</button>
              <button id="next">></button>
        </div>
      </div>
    </div>
  </section>

  <!-- Form Contact  -->
  <section class="contact" id="contact">
    <header>
      <h1>Contact</h1>
    </header>
    <div class="container">
      <form action="/" id="formulir">

          <label for="nama">Nama</label>
          <input type="text" name="nama" id="nama" required>

          <label for="alamat">Email</label>
          <input type="email" name="alamat" id="alamat" required>
          
          <label for="kue">No Telepon</label>
          <input type="number" name="kue" id="kue" required>
        <button type="button" onclick="pesan()">Login</button>
        <p id="respon-pesan"></p>
      </form>
    </div>
  </section>










  <footer>
    <div class="navbar-nav">
      <a href="#landing-page">Home</a>
      <a href="#about-us">About Us</a>
      <a href="#menu">Menu</a>
      <a href="#contact">Contact</a>
    </div>
    <p>Created by <a href="">Krishn</a> | &copy; 2023.</p>
  </footer>


  <!-- Feather Icons -->
  <script>
    feather.replace()
  </script>
  <!-- srcipt js -->
  <script src="/js/script.js"></script>
</body>

</html>