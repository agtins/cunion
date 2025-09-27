<?php include __DIR__ . '/header.php'; ?>

<section id="contact" class="contact section">
  <div class="container" data-aos="fade-up">
    <h2>Hubungi Kami</h2>
    <p>Silakan hubungi kami melalui form di bawah atau kontak resmi yang tersedia.</p>

    <form action="#" method="post" class="php-email-form">
      <div class="row gy-4">
        <div class="col-md-6">
          <input type="text" name="name" class="form-control" placeholder="Nama Anda" required>
        </div>
        <div class="col-md-6">
          <input type="email" name="email" class="form-control" placeholder="Email Anda" required>
        </div>
        <div class="col-12">
          <input type="text" name="subject" class="form-control" placeholder="Subjek" required>
        </div>
        <div class="col-12">
          <textarea name="message" class="form-control" rows="5" placeholder="Pesan" required></textarea>
        </div>
        <div class="col-12 text-center">
          <button type="submit">Kirim Pesan</button>
        </div>
      </div>
    </form>
  </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>
