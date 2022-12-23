<div class="container" data-aos="fade-up">
  <div class="row g-5">
    <div class="col-lg-4">
      <?php $post = $recent[0]; ?>
      <div class="post-entry-1 lg">
        <a href="single-post.html"><img src="<?php echo $post->image ?>" alt="" class="img-fluid"></a>
        <div class="post-meta"><span class="date"><?php echo $post->categoryName ?></span> <span class="mx-1">&bullet;</span> <span><?php echo date('d/m/Y H:i:s', strtotime($post->created_at))  ?></span></div>
        <h2><a href="single-post.html"><?php echo $post->title; ?></a></h2>
        <p class="mb-4 d-block"><?php echo word_limiter($post->description, 20) ?></p>

        <div class="d-flex align-items-center author">
          <div class="photo"><img src="assets/img/person-1.jpg" alt="" class="img-fluid"></div>
          <div class="name">
            <h3 class="m-0 p-0"><?php echo $post->userFirstName ?> <?php echo $post->userLastName ?></h3>
          </div>
        </div>
      </div>

    </div>

    <div class="col-lg-8">
      <div class="row g-5">
        <div class="col-lg-4 border-start custom-border">
          <?php $posts = array_slice($recent, 1, 3); ?>
          <?php foreach ($posts as $post) : ?>
            <div class="post-entry-1">
              <a href="single-post.html"><img src="<?php echo $post->image ?>" alt="" class="img-fluid"></a>
              <div class="post-meta"><span class="date"><?php echo $post->categoryName; ?></span> <span class="mx-1">&bullet;</span> <span><?php echo date('d/m/Y H:i:s', strtotime($post->created_at)) ?></span></div>
              <h2><a href="single-post.html"><?php echo $post->title; ?></a></h2>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="col-lg-4 border-start custom-border">
          <?php $posts = array_slice($recent, 4, 6); ?>
          <?php foreach ($posts as $post) : ?>
            <div class="post-entry-1">
              <a href="single-post.html"><img src="<?php echo $post->image ?>" alt="" class="img-fluid"></a>
              <div class="post-meta"><span class="date"><?php echo $post->categoryName; ?></span> <span class="mx-1">&bullet;</span> <span><?php echo date('d/m/Y H:i:s', strtotime($post->created_at)) ?></span></div>
              <h2><a href="single-post.html"><?php echo $post->title; ?></a></h2>
            </div>
          <?php endforeach; ?>

        </div>

        <!-- Trending Section -->
        <div class="col-lg-4">

          <div class="trending _trending">
            <include-fragment src="/trendings">
              <div class="_container">
                <?php echo $this->include('_placeholders/_trendings') ?>
              </div>
            </include-fragment>
          </div>

        </div> <!-- End Trending Section -->
      </div>
    </div>

  </div> <!-- End .row -->
</div>