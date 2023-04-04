<?= $this->extend('master') ?>

<?= $this->section('content') ?>
<section id="contact" class="contact mb-5">
  <div class="container" data-aos="fade-up">
  <div class="row d-flex justify-content-center" data-aos="fade-up">
    <div class="card text-center" style="width: 300px;">
      
    <?php if(session()->has('error')): ?>
      <span class="fs-4 text-bg-danger p-2 mb-2 mt-2"><?php echo session()->get('error'); ?></span>
    <?php endif; ?>

      <?php if(session()->has('forgot_sent')): ?>
      <span class="fs-4 text-bg-success p-2 mb-2 mt-2"><?php echo session()->get('forgot_sent'); ?></span>
    <?php endif; ?>
      

    <?php if(session()->has('forgot_not_sent')): ?>
      <span class="fs-4 text-bg-danger p-2 mb-2 mt-2"><?php echo session()->get('forgot_not_sent'); ?></span>
    <?php endif; ?>


    <?php if(session()->has('token_not_found')): ?>
      <span class="fs-4 text-bg-danger p-2 mb-2 mt-2"><?php echo session()->get('token_not_found'); ?></span>
    <?php endif; ?>

    <?php if(session()->has('updated')): ?>
      <span class="fs-4 text-bg-success p-2 mb-2 mt-2"><?php echo session()->get('updated'); ?></span>
    <?php endif; ?>
      

    <?php if(session()->has('not_updated')): ?>
      <span class="fs-4 text-bg-danger p-2 mb-2 mt-2"><?php echo session()->get('not_updated'); ?></span>
    <?php endif; ?>
      
      
      <div class="card-header h5 text-white bg-primary">Password Reset</div>
          <form action="<?php echo url_to('forgot.store'); ?>" method="post">
          <?php echo csrf_field(); ?>
            <div class="card-body px-5">
                <p class="card-text py-2">
                    Digite seu email e enviaremos as instruções de como resetar sua senha.
                </p>
                <div class="form-outline">
                    <input type="email" name="email" id="typeEmail" class="form-control my-3" value="aparecida09@martines.net" />
                    <label class="form-label" for="typeEmail">Email input</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Reset password</button>
                <div class="d-flex justify-content-between mt-4">
                    <a class="" href="/login">Login</a>
                    <a class="" href="/register">Register</a>
                </div>
          </form>
        </div>
  </div>
  </div>

  </div>
</section>
<?= $this->endSection() ?>