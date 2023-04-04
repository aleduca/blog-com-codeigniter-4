<?= $this->extend('master') ?>

<?= $this->section('content') ?>

<section class="contact mb-5">
  <div class="row d-flex justify-content-center" data-aos="fade-up">
    <div class="card text-center" style="width: 300px;">
        <div class="card-header h5 text-white bg-primary">Password Reset</div>
          <form action="<?php echo url_to('forgot.update', $token); ?>" method="post">
          <?php echo csrf_field(); ?>
            <div class="card-body px-5">
                <p class="card-text py-2">
                    Digite sua nova senha
                </p>
                <div class="form-outline">
                    <input type="password" name="password" id="typeEmail" class="form-control my-3" />
                    <label class="form-label" for="typeEmail">Email input</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Reset password</button>
          </form>
        </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>