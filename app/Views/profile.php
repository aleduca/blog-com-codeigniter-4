<?= $this->extend('master') ?>

<?= $this->section('content') ?>

<section id="contact" class="contact mb-5">
  <div class="container" data-aos="fade-up">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Profile</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password" type="button" role="tab" aria-controls="password" aria-selected="false">Password</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="avatar-tab" data-bs-toggle="tab" data-bs-target="#avatar" type="button" role="tab" aria-controls="avatar" aria-selected="false">Avatar</button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <h2 class="mt-3">Profile</h2>
        <form id="form-update-profile">
          <input type="hidden" name="id" value="<?php echo session()->get('user')->id; ?>">
          <div class="row mb-4">
            <?php echo csrf_field(); ?>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="form3Example1">First name</label>
                <input type="text" id="form3Example1" name="firstName" class="form-control" value="<?php echo session()->get('user')->firstName; ?>" />
                <span id="error-firstName"></span>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="form3Example2">Last name</label>
                <input type="text" id="form3Example2" name="lastName" class="form-control" value="<?php echo session()->get('user')->lastName; ?>" />
                <span id="error-lastName"></span>
              </div>
            </div>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Email address</label>
            <input type="text" id="form3Example3" name="email" class="form-control" value="<?php echo session()->get('user')->email; ?>" />
            <span id="error-email"></span>
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-block mb-4" id="btn-update">Update</button>
        </form>
      </div>
      <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
        <h2 class="mt-3">Password</h2>
        <form id="form-update-password">
          <input type="hidden" name="id" value="<?php echo session()->get('user')->id; ?>">
          <div class="row mb-4">
            <?php echo csrf_field(); ?>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="form3Example1">Actual password</label>
                <input type="text" id="form3Example1" name="password" class="form-control" placeholder="Your current password" />
                <span id="error-password"></span>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="form3Example2">Your new password</label>
                <input type="text" id="form3Example2" name="newPassword" class="form-control" placeholder="Your new password" />
                <span id="error-newPassword"></span>
              </div>
            </div>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Confirm new password</label>
            <input type="text" id="form3Example3" name="confirmNewPassword" class="form-control" placeholder="Confirm your current password" />
            <span id="error-confirmNewPassword"></span>
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-block mb-4" id="btn-update-password">Update</button>
        </form>
      </div>
      <div class="tab-pane fade" id="avatar" role="tabpanel" aria-labelledby="avatar-tab">
        <h2>Avatar</h2>
        <img src="" alt="" id="preview-image">
        <form enctype="multipart/form-data" id="form-update-avatar">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="id" value="<?php echo session()->get('user')->id; ?>">
          <input type="file" id="avatar-image">
          <button disabled id="btn-change-avatar">Change Avatar</button>
        </form>
      </div>
    </div>

  </div>

</section>
<?= $this->section('js') ?>
<script src="assets/js/sweetalert.js"></script>
<script src="assets/js/profileUpdate.js"></script>
<script src="assets/js/profileUpdatePassword.js"></script>
<script src="assets/js/profileUpdateAvatar.js"></script>
<?= $this->endSection() ?>

<?= $this->endSection() ?>