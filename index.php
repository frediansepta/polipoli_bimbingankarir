<!DOCTYPE html>
<html lang="en">
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

:root {
  --primary-color: #12ac8e;
  --primary-color-dark: #0d846c;
  --primary-color-light: #e9f7f7;
  --secondary-color: #fb923c;
  --text-dark: #333333;
  --text-light: #767268;
  --white: #ffffff;
  --max-width: 1200px;
}

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

.section__container {
  max-width: var(--max-width);
  margin: auto;
  padding: 5rem 1rem;
}

.section__header {
  margin-bottom: 0.5rem;
  font-size: 2rem;
  font-weight: 600;
  color: var(--text-dark);
}

.btn {
  padding: 0.75rem 2rem;
  outline: none;
  border: none;
  font-size: 1rem;
  white-space: nowrap;
  color: var(--white);
  background-color: var(--secondary-color);
  border-radius: 5px;
  cursor: pointer;
}

img {
  width: 100%;
  display: flex;
}

a {
  text-decoration: none;
}

html,
body {
  scroll-behavior: smooth;
}

body {
  font-family: "Poppins", sans-serif;
}

header {
  background-image: linear-gradient(
      to right,
      rgba(18, 172, 142, 0.9),
      rgba(18, 172, 142, 0.7)
    ),
    url("assets/images/header.jpg");
  background-position: center center;
  background-size: cover;
  background-repeat: no-repeat;
}

.nav__container {
  padding: 2rem 1rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.nav__logo {
  font-size: 1.5rem;
  font-weight: 600;
  color: var(--white);
}

.nav__logo span {
  color: var(--secondary-color);
}

.nav__links {
  list-style: none;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 2rem;
}

.link a {
  padding: 0.5rem;
  color: var(--primary-color-light);
}

.link a:hover {
  color: var(--white);
}

.header__container {
  display: flex;
  align-items: center;
  gap: 5rem;
}

.header__container h1 {
  margin-bottom: 1rem;
  max-width: 800px;
  font-size: 3.5rem;
  line-height: 4rem;
  color: var(--white);
}

.header__container p {
  margin-bottom: 2rem;
  max-width: 600px;
  color: var(--primary-color-light);
}

.header__form {
  width: 100%;
  max-width: 350px;
}

.header__form form {
  display: grid;
  gap: 1rem;
  padding: 2rem;
  background-color: var(--white);
  border-radius: 10px;
  box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.2);
}

.header__form input {
  padding: 1rem;
  outline: none;
  border: none;
  font-size: 1rem;
  color: var(--primary-color);
  background-color: var(--primary-color-light);
  border-radius: 5px;
}

.header__form input::placeholder {
  color: var(--primary-color);
}

.form__btn {
  background-color: var(--primary-color);
  transition: 0.3s;
}

.form__btn:hover {
  background-color: var(--primary-color-dark);
}

.header__form h4 {
  font-size: 1.5rem;
  font-weight: 700;
  color: var(--primary-color);
}

.service__header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 2rem;
}

.service__header__content p {
  max-width: 600px;
  color: var(--text-light);
}

.service__btn {
  padding: 0.75rem 1rem;
  outline: none;
  font-size: 1rem;
  color: var(--primary-color);
  border: 1px solid var(--primary-color);
  background-color: transparent;
  border-radius: 5px;
  white-space: nowrap;
  cursor: pointer;
  transition: 0.3s;
}

.service__btn:hover {
  color: var(--white);
  background-color: var(--primary-color);
}

.service__grid {
  margin-top: 4rem;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 2rem;
}

.service__card {
  padding: 2rem;
  text-align: center;
  border-radius: 10px;
  box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.1);
  cursor: pointer;
}

.service__card span {
  display: inline-block;
  margin-bottom: 1rem;
  padding: 10px 20px;
  font-size: 2.5rem;
  color: var(--primary-color);
  background-color: var(--primary-color-light);
  border-radius: 100%;
  transition: 0.3s;
}

.service__card h4 {
  margin-bottom: 0.5rem;
  font-size: 1.2rem;
  font-weight: 600;
  color: var(--text-dark);
}

.service__card p {
  margin-bottom: 1rem;
  color: var(--text-light);
}

.service__card a {
  color: var(--primary-color);
}

.service__card a:hover {
  color: var(--primary-color-dark);
}

.service__card:hover span {
  color: var(--primary-color-light);
  background-color: var(--primary-color);
}

.about__container {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 2rem;
  align-items: center;
}

.about__content p {
  margin-bottom: 1rem;
  color: var(--text-light);
}

.about__image img {
  max-width: 400px;
  margin: auto;
  border-radius: 10px;
}

.footer {
  background-color: var(--primary-color-light);
}

.footer__container {
  display: grid;
  grid-template-columns: 400px repeat(3, 1fr);
  gap: 2rem;
}

.footer__col h3 {
  margin-bottom: 1rem;
  font-size: 1.5rem;
  font-weight: 600;
  color: var(--primary-color);
}

.footer__col h3 span {
  color: var(--secondary-color);
}

.footer__col h4 {
  margin-bottom: 1rem;
  font-size: 1.2rem;
  font-weight: 600;
  color: var(--primary-color);
}

.footer__col p {
  margin-bottom: 1rem;
  color: var(--text-dark);
  cursor: pointer;
  transition: 0.3s;
}

.footer__col p:hover {
  color: var(--primary-color);
}

.footer__col i {
  color: var(--primary-color);
}

.footer__bar {
  background-color: var(--primary-color);
}

.footer__bar__content {
  max-width: var(--max-width);
  margin: auto;
  padding: 0.5rem 1rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 2rem;
}

.footer__bar__content p {
  font-size: 0.8rem;
  color: var(--white);
}

.footer__socials {
  display: flex;
  align-items: center;
  gap: 1rem;
  font-size: 1rem;
  color: var(--white);
  cursor: pointer;
}

@media (width < 900px) {
  .service__grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
  }

  .about__container {
    grid-template-columns: repeat(1, 1fr);
  }

  .about__image {
    grid-area: 1/1/2/2;
  }

  .about__content {
    text-align: center;
  }

  .why__container {
    grid-template-columns: repeat(1, 1fr);
  }

  .why__content {
    text-align: center;
  }

  .why__grid {
    text-align: left;
  }

  .doctors__grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
  }

  .footer__container {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (width < 780px) {
  .nav__links {
    display: none;
  }

  .header__container {
    flex-direction: column;
  }
}

@media (width < 600px) {
  .service__header {
    flex-direction: column;
    text-align: center;
  }

  .service__grid {
    grid-template-columns: repeat(1, 1fr);
  }

  .why__grid {
    column-gap: 1rem;
  }

  .doctors__header {
    flex-direction: column;
    text-align: center;
  }

  .doctors__grid {
    grid-template-columns: repeat(1, 1fr);
  }

  .footer__bar__content {
    flex-direction: column;
    gap: 1rem;
  }
}

  </style>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" type="text/css" href=""/>
    <title>PoliPoli</title>
  </head>
  <body>
    <header>
      <nav class="section__container nav__container">
        <div class="nav__logo">Poli<span>Poli</span></div>
        <ul class="nav__links">
         <li class="link"><a href="#home">Home</a></li>
          <li class="link"><a href="#about">About Us</a></li>
          <li class="link"><a href="#footer">Contact Us</a></li>
        </ul>
        <a href="#service"><button class="btn">Masuk</button></a>
      </nav>
      <div class="section__container header__container" id="home">
        <div class="header__content">
          <h1>Solusi Kesehatan Anda, Di Mana Saja, Kapan Saja.</h1>
          <p>
            Selamat datang di PoliPoli, tempat di mana pengalaman pasien yang luar biasa menjadi 
            prioritas utama kami. Dengan perawatan yang penuh perhatian, fasilitas modern, dan 
            pendekatan yang berfokus pada pasien, kami berkomitmen untuk menjaga kesehatan Anda. 
            Percayakan kesehatan Anda kepada kami dan rasakan perbedaannya.
          </p>
        </div>
        </div>
      </div>
    </header>

    <section class="section__container service__container" id="service">
      <div class="service__header">
        <div class="service__header__content">
          <h2 class="section__header">Masuk ke Akun Anda</h2>
          <p>
            Masuk sesuai peran Anda untuk mengakses layanan dan fitur yang telah 
            kami sediakan. Pilih kategori di bawah ini untuk melanjutkan.
          </p>
        </div>
      </div>
      <div class="service__grid">
        <div class="service__card">
          <span><i class="ri-microscope-line"></i></span>
          <h4>Pasien</h4>
          <p>
            Masuk sebagai pasien untuk melakukan pendaftaran, konsultasi dengan dokter PoliPoli, 
            dan pemeriksaan diri anda.
          </p>
          <a href="loginUser.php"><button class="service__btn">Masuk</button></a>
        </div>
        <div class="service__card">
          <span><i class="ri-mental-health-line"></i></span>
          <h4>Dokter</h4>
          <p>
            Masuk sebagai dokter untuk melakukan pemeriksaan kepada pasien, 
            mengatur jadwal, dan memberikan layanan terbaik.
          </p>
          <a href="login.php"><button class="service__btn">Masuk</button></a>
        </div>
        <div class="service__card">
          <span><i class="ri-hospital-line"></i></span>
          <h4>Admin</h4>
          <p>
            Masuk sebagai admin untuk mengelola data PoliPoli dan memberikan 
            layanan terbaik untuk pengguna aplikasi.

          </p>
          <a href="login.php"><button class="service__btn">Masuk</button></a>
        </div>
      </div>
    </section>
    <section class="section__container about__container" id="about">
      <div class="about__content">
        <h2 class="section__header">Tentang Kami</h2>
        <p>
          Selamat datang di PoliPoli, aplikasi poliklinik digital yang menghadirkan 
          kemudahan dan kenyamanan dalam mengakses layanan kesehatan. Kami berkomitmen 
          untuk menjadi mitra kesehatan terpercaya Anda, dengan menghadirkan solusi 
          modern yang mendukung kebutuhan kesehatan Anda kapan saja dan di mana saja.
        </p>
        <p>
          Visi Kami: <br>
          Mewujudkan layanan kesehatan yang lebih mudah, cepat, dan dapat diakses oleh semua orang. <br>
          
          Misi Kami: <br>
          -> Memberikan pengalaman kesehatan terbaik melalui teknologi terkini. <br>
          -> Menghubungkan pasien, dokter, dan admin dalam satu platform yang efisien. <br>
          -> Menjamin kemudahan akses riwayat medis dan layanan kesehatan dengan keamanan data yang tinggi.
        </p>
        <p>
          PoliPoli diciptakan untuk mempermudah Anda dalam mendapatkan layanan kesehatan berkualitas 
          tanpa antrian panjang. Dengan fitur-fitur inovatif dan tim profesional, kami siap 
          mendampingi perjalanan kesehatan Anda.
        </p>
      </div>
      <div class="about__image">
        <img src="assets/images/about.jpg" alt="about" />
      </div>
    </section>
    <footer class="footer">
      <div class="section__container footer__container">
        <div class="footer__col">
          <h3>Poli<span>Poli</span></h3>
          <p>
            Kami bangga menjadi bagian dari perjalanan kesehatan Anda dan berkomitmen 
            untuk memberikan layanan yang penuh perhatian, personal, dan berkualitas 
            tinggi di setiap langkahnya.
          </p>
          <p>
            Hubungi kami kapan saja untuk dukungan atau pertanyaan lebih lanjut. 
            Kami selalu di sini untuk Anda.
          </p>
        </div>
        <div class="footer__col">
          <h4>Kontak</h4>
          <p>
            <i class="ri-map-pin-2-fill"></i> Jl.Bersamamu II, Kota Semarang, Jawa Tengah
          </p>
          <p><i class="ri-mail-fill"></i> polipoli@gmail.com</p>
          <p><i class="ri-phone-fill"></i> (012) 3456 789</p>
        </div>
      </div>
      <div class="footer__bar">
        <div class="footer__bar__content">
          <p>Copyright © 2024 PoliPoli. All rights reserved.</p>
          <div class="footer__socials">
            <span><i class="ri-instagram-line"></i></span>
            <span><i class="ri-facebook-fill"></i></span>
            <span><i class="ri-heart-fill"></i></span>
            <span><i class="ri-twitter-fill"></i></span>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
