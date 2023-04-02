<?= $this->extend('master') ?>

<?= $this->section('content') ?>
<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp" style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">We are The Lotus Team</h4>
                </div>

                <?php if (session()->has('error')) : ?>
                  <?php echo session()->get('error'); ?>
                <?php endif; ?>

                <form method="post" action="<?php echo url_to('login.store'); ?>">
                  <p>Please login to your account</p>

                  <?php echo csrf_field(); ?>
                  <div class="form-outline mb-4">
                    <?php echo session()->get('errors')['email'] ?? ''; ?>
                    <input type="email" name="email" id="form2Example11" class="form-control" placeholder="Phone number or email address" value="luiz.prado@beltrao.net.br" />
                    <label class="form-label" for="form2Example11">Email</label>
                  </div>

                  <div class="form-outline mb-4">
                    <?php echo session()->get('errors')['password'] ?? ''; ?>
                    <input type="password" name="password" id="form2Example22" class="form-control" value="123" />
                    <label class="form-label" for="form2Example22">Password</label>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submir">Log
                      in</button>
                    <a class="text-muted" href="#!">Forgot password?</a>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <a href="/register" type="button" class="btn btn-outline-danger">Create new</a>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are more than just a company</h4>
                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>