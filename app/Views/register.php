<?= $this->extend('master') ?>

<?= $this->section('content') ?>
<section id="contact" class="contact mb-5">
  <div class="container">
    <h2>Register</h2>
    <form method="post" action="<?php echo url_to('register.store'); ?>">
      <!-- 2 column grid layout with text inputs for the first and last names -->
      <div class="row mb-4">
        <div class="col">
          <div class="form-outline">
            <input type="text" id="form3Example1" name="firstName" class="form-control" placeholder="Yout first name" />
            <label class="form-label" for="form3Example1">First name</label>
          </div>
        </div>
        <div class="col">
          <div class="form-outline">
            <input type="text" id="form3Example2" name="lastName" class="form-control" placeholder="Your last name" />
            <label class="form-label" for="form3Example2">Last name</label>
          </div>
        </div>
      </div>

      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="email" id="form3Example3" name="email" class="form-control" placeholder="Your email" />
        <label class="form-label" for="form3Example3">Email address</label>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <input type="password" id="form3Example4" name="password" class="form-control" placeholder="Your password" />
        <label class="form-label" for="form3Example4">Password</label>
      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>
  </div>
  </form>
  </div>
</section>
<?= $this->endSection() ?>