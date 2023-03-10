<?= $this->extend('master') ?>

<?= $this->section('content') ?>
<section id="contact" class="contact mb-5">
  <div class="container" data-aos="fade-up">

    <div class="row">
      <div class="col-lg-12 text-center mb-2">
        <h1 class="page-title">Contact us</h1>
      </div>
    </div>

    <?php if (session()->has('contact_sent')) : ?>
      <div class="text text-bg-success text-center p-2 fs-3"><?php echo session()->get('contact_sent'); ?></div>
    <?php endif; ?>

    <?php if (session()->has('contact_not_sent')) : ?>
      <div class="text text-bg-danger text-center p-2 fs-3"><?php echo session()->get('contact_not_sent'); ?></div>

    <?php endif; ?>
    <div class="form mt-5">
      <form action="<?php echo url_to('contact.store') ?>" method="post" role="form" class="php-email-form">
        <div class="row">
          <div class="form-group col-md-6">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="Alexandre">
            <span class="text text-bg-danger fs-3"><?php echo session()->get('error')['name'] ?? '' ?></span>
          </div>
          <div class="form-group col-md-6">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="xandecar@hotmail.com">
            <span class="text text-bg-danger fs-3"><?php echo session()->get('error')['email'] ?? '' ?></span>
          </div>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" value="Assunto de teste">
          <span class="text text-bg-danger fs-3"><?php echo session()->get('error')['subject'] ?? '' ?></span>

        </div>
        <div class="form-group">
          <span class="text text-bg-danger fs-3"><?php echo session()->get('error')['message'] ?? '' ?></span>
          <textarea class="form-control" name="message" rows="5" placeholder="Message">Minha mensagem de teste</textarea>
        </div>
        <div class="my-3">
          <div class="loading">Loading</div>
          <div class="error-message"></div>
          <div class="sent-message">Your message has been sent. Thank you!</div>
        </div>
        <div class="text-center"><button type="submit">Send Message</button></div>
      </form>
    </div><!-- End Contact Form -->

  </div>
</section>
<?= $this->endSection() ?>