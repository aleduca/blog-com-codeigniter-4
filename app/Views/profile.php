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
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <div class="row mb-4">
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
      <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">Password</div>
      <div class="tab-pane fade" id="avatar" role="tabpanel" aria-labelledby="avatar-tab">Avatar</div>
    </div>

  </div>
</section>

<?= $this->section('js') ?>
<script>
  const formUpdateProfile = document.querySelector('#form-update-profile');
  const btnUpdate = document.querySelector('#btn-update');
  formUpdateProfile.addEventListener('submit', async event => {
    event.preventDefault();
    btnUpdate.textContent = 'Aguarde, atualizando.';

    const formData = new FormData(formUpdateProfile);

    try {
      const response = await fetch('/api/profile', {
        method: 'post',
        headers: {
          'Content-Type': 'application/json',
          'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({
          id: formData.get('id'),
          firstName: formData.get('firstName'),
          lastName: formData.get('lastName'),
          email: formData.get('email'),
        })
      })

      if (!response.ok) {
        throw await response.json();
      }

      console.log(response);
      btnUpdate.textContent = 'Update';

    } catch (error) {
      if (error?.validate) {
        for (const key in error.validate) {
          const spanMessage = document.querySelector(`#error-${key}`);
          spanMessage.setAttribute('class', 'text text-danger fs-5');
          spanMessage.innerHTML = error.validate[key];
          console.log(key);
        }
      }
      console.log('error', error);
      btnUpdate.textContent = 'Update';
    }

  })
</script>
<?= $this->endSection() ?>

<?= $this->endSection() ?>