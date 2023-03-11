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
        profile
      </div>
      <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">Password</div>
      <div class="tab-pane fade" id="avatar" role="tabpanel" aria-labelledby="avatar-tab">Avatar</div>
    </div>

  </div>
</section>

<?= $this->endSection() ?>