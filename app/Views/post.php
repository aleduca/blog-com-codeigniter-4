<?= $this->extend('master') ?>

<?= $this->section('content') ?>
<section class="single-post-content">
  <div class="container">
    <div class="row">
      <div class="col-md-9 post-content" data-aos="fade-up">

        <!-- ======= Single Post Content ======= -->
        <div class="single-post">
          <div class="post-meta"><span class="date"><?= $post->categoryName; ?></span> <span class="mx-1">&bullet;</span> <span><?php echo date('d/m/Y', strtotime($post->created_at))  ?></span></div>
          <h1 class="mb-5"><?= $post->title; ?></h1>
          <p><?= $post->description; ?></p>
        </div><!-- End Single Post Content -->

        <!-- ======= Comments ======= -->
        <?php if ($comments) : ?>
          <div class="comments">
            <h5 class="comment-title py-4">2 Comments</h5>
            <?php foreach ($comments->comments as $comment) : ?>
              <div class="comment d-flex mb-4">
                <div class="flex-shrink-0">
                  <div class="avatar avatar-sm rounded-circle">
                    <img class="avatar-img" src="<?php echo $comment->avatar ?>" alt="" class="img-fluid">
                  </div>
                </div>
                <div class="flex-grow-1 ms-2 ms-sm-3">
                  <div class="comment-meta d-flex align-items-baseline">
                    <h6 class="me-2">
                      <?php echo $comment->userFirstName ?>
                      <?php echo $comment->userLastName ?>
                    </h6>
                    <span class="text-muted">
                      <?php echo CodeIgniter\I18n\Time::parse($comment->created_at)->humanize(); ?>
                      <?php if (!$comment->isAuthor && session()->has('auth')) : ?>
                        <button type="button" class="btn btn-outline-primary btn-sm btn-reply" data-id="<?php echo $comment->id; ?>">Reply to <?php echo $comment->userFirstName ?></button>
                      <?php endif; ?>
                      <?php if ($comment->isAuthor) : ?>
                        <span class="badge bg-dark">My reply <i class="bi bi-star-fill"></i></span>
                      <?php endif; ?>
                    </span>
                  </div>
                  <div class="comment-body">
                    <?php echo $comment->comment; ?>
                  </div>

                  <?php if (isset($comment->replies)) : ?>
                    <div class="comment-replies bg-light p-3 mt-3 rounded">
                      <h6 class="comment-replies-title mb-4 text-muted text-uppercase"><?php echo count($comment->replies) ?> replies</h6>
                      <?php foreach ($comment->replies as $reply) : ?>
                        <div class="reply d-flex mb-4">
                          <div class="flex-shrink-0">
                            <div class="avatar avatar-sm rounded-circle">
                              <img class="avatar-img" src="<?php echo $reply->avatar; ?>" alt="" class="img-fluid">
                            </div>
                          </div>
                          <div class="flex-grow-1 ms-2 ms-sm-3">
                            <div class="reply-meta d-flex align-items-baseline">
                              <h6 class="mb-0 me-2">
                                <?php echo $reply->userFirstName ?>
                                <?php echo $reply->userLastName ?>
                              </h6>
                              <span class="text-muted">
                                <?php echo CodeIgniter\I18n\Time::parse($reply->created_at)->humanize(); ?>
                                <?php if (!$reply->isAuthor && session()->has('auth')) : ?>
                                  <button type="button" class="btn btn-outline-primary btn-sm btn-reply" data-id="<?php echo $comment->id; ?>">Reply to <?php echo $reply->userFirstName ?></button>
                                <?php endif; ?>
                                <?php if ($reply->isAuthor) : ?>
                                  <span class="badge bg-dark">My reply <i class="bi bi-star-fill"></i></span>
                                <?php endif; ?>
                              </span>
                            </div>
                            <div class="reply-body">
                              <?php echo $reply->comment; ?>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div><!-- End Comments -->
        <?php endif; ?>

        <div class="modal fade" id="modal-comment" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <textarea rows="10" class="w-100" id="modal-comment-text"></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="btn-send-reply">Send Reply</button>
              </div>
            </div>
          </div>
        </div>

        <!-- ======= Comments Form ======= -->
        <div class="row justify-content-center mt-5">

          <div class="col-lg-12">
            <h5 class="comment-title">Leave a Comment</h5>
            <div class="row">
              <div class="col-lg-6 mb-3">
                <label for="comment-name">Name</label>
                <input type="text" class="form-control" id="comment-name" placeholder="Enter your name">
              </div>
              <div class="col-lg-6 mb-3">
                <label for="comment-email">Email</label>
                <input type="text" class="form-control" id="comment-email" placeholder="Enter your email">
              </div>
              <div class="col-12 mb-3">
                <label for="comment-message">Message</label>

                <textarea class="form-control" id="comment-message" placeholder="Enter your name" cols="30" rows="10"></textarea>
              </div>
              <div class="col-12">
                <input type="submit" class="btn btn-primary" value="Post comment">
              </div>
            </div>
          </div>
        </div><!-- End Comments Form -->

      </div>
      <div class="col-md-3">
        <!-- ======= Sidebar ======= -->
        <?php echo view_cell("App\Cells\CategorySidebar::render"); ?>
      </div>
    </div>
</section>

<?= $this->section('js') ?>
<script>
  const btnReplies = document.querySelectorAll('.btn-reply');
  const btnSendReply = document.querySelector('#btn-send-reply');
  const modal = new bootstrap.Modal(document.getElementById('modal-comment'))
  const modalTitle = document.querySelector('.modal-title')

  btnReplies.forEach(btn => {
    btn.addEventListener('click', function() {

      modalTitle.textContent = this.textContent;

      btnSendReply.setAttribute('data-id', this.getAttribute('data-id'));

      modal.show();
    })
  });

  btnSendReply.addEventListener('click', async function() {
    const commentId = this.getAttribute('data-id');
    const reply = document.querySelector('#modal-comment-text');
    if (!reply.value.length) {
      alert('Digite uma resposta');
      return;
    }
    this.textContent = 'Enviando resposta, aguarde...';
    try {
      const data = await fetch('/api/reply', {
        method: 'post',
        headers: {
          'Content-Type': "application/json",
          'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({
          commentId,
          reply: reply.value
        })
      })

      const response = await data.json();

      if (response.message === 'replied') {
        alert('Resposta cadastrada com sucesso');
        this.textContent = 'Send Reply';
        reply.value = '';
      }

      setTimeout(() => {
        modal.hide();
      }, 1000);

      console.log(response);
    } catch (error) {
      console.log(error);
    }
  })
</script>
<?= $this->endSection() ?>

<?= $this->endSection() ?>