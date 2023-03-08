<?= $this->extend('master') ?>

<?= $this->section('content') ?>
<section id="contact" class="contact mb-5">
  <div class="container">
    <?php if (!session()->has('auth')) : ?>
      <h2>Register</h2>

      <?php if (isset(session()->get('errors')['user_created'])) : ?>
        <span class="text text-green alert fs-4 p-0"><?php echo session()->get('errors')['user_created'] ?></span>
      <?php endif; ?>

      <?php if (isset(session()->get('errors')['user_not_created'])) : ?>
        <span class="text text-danger alert fs-4 p-0"><?php echo session()->get('errors')['user_not_created'] ?></span>
      <?php endif; ?>

      <form method="post" action="<?php echo url_to('register.store'); ?>">
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row mb-4">
          <div class="col">
            <div class="form-outline">
              <?php if (isset(session()->get('errors')['firstName'])) : ?>
                <span class="text text-danger alert fs-4 p-0"><?php echo session()->get('errors')['firstName'] ?></span>
              <?php endif; ?>
              <input type="text" id="form3Example1" name="firstName" class="form-control" placeholder="Yout first name" value="Alexandre" />
              <label class="form-label" for="form3Example1">First name</label>
            </div>
          </div>
          <div class="col">
            <div class="form-outline">
              <?php if (isset(session()->get('errors')['lastName'])) : ?>
                <span class="text text-danger alert fs-4 p-0"><?php echo session()->get('errors')['lastName'] ?></span>
              <?php endif; ?>
              <input type="text" id="form3Example2" name="lastName" class="form-control" placeholder="Your last name" value="Cardoso" />
              <label class="form-label" for="form3Example2">Last name</label>
            </div>
          </div>
        </div>

        <!-- Email input -->
        <div class="form-outline mb-4">
          <?php if (isset(session()->get('errors')['email'])) : ?>
            <span class="text text-danger alert fs-4 p-0"><?php echo session()->get('errors')['email'] ?></span>
          <?php endif; ?>
          <input type="email" id="form3Example3" name="email" class="form-control" placeholder="Your email" value="emilly94@ramos.com" />
          <label class="form-label" for="form3Example3">Email address</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
          <?php if (isset(session()->get('errors')['password'])) : ?>
            <span class="text text-danger alert fs-4 p-0"><?php echo session()->get('errors')['password'] ?></span>
          <?php endif; ?>
          <input type="password" id="form3Example4" name="password" class="form-control" placeholder="Your password" value="123" />
          <label class="form-label" for="form3Example4">Password</label>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>
  </div>
  </form>
<?php else : ?>
  <h2>Already logged in</h2>
<?php endif; ?>
</div>

</section>
<?= $this->endSection() ?>