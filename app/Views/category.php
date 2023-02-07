<?= $this->extend('master') ?>

<?= $this->section('content') ?>
<section>
  <div class="container">
    <div class="row">

      <div class="col-md-9" data-aos="fade-up">
        <h3 class="category-title">Category: <?php echo $posts[0]->categoryName; ?></h3>

        <?php foreach ($posts as $post) : ?>
          <div class="d-md-flex post-entry-2 half">
            <a href="single-post.html" class="me-4 thumbnail">
              <img src="<?php echo $post->image; ?>" alt="" class="img-fluid">
            </a>
            <div>
              <div class="post-meta"><span class="date"><?php echo $post->categoryName ?></span> <span class="mx-1">&bullet;</span> <span>
                  <?php echo date('d/m/Y', strtotime($post->created_at)); ?>
                </span></div>
              <h3><a href="single-post.html"><?php echo $post->title; ?></a></h3>
              <p><?php echo word_limiter($post->description, 20) ?></p>
              <div class="d-flex align-items-center author">
                <div class="photo"><img src="/assets/img/person-2.jpg" alt="" class="img-fluid"></div>
                <div class="name">
                  <h3 class="m-0 p-0"><?php echo $post->userFirstName ?> <?php echo $post->userLastName ?></h3>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>


        <div class="text-start py-4">
          <div class="custom-pagination">
            <?php echo $pager->links(); ?>
            <!-- <a href="#" class="prev">Prevous</a>
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#" class="next">Next</a> -->
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <!-- ======= Sidebar ======= -->
        <div class="aside-block">

          <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="true">Popular</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-trending" aria-selected="false">Trending</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill" data-bs-target="#pills-latest" type="button" role="tab" aria-controls="pills-latest" aria-selected="false">Latest</button>
            </li>
          </ul>

          <div class="tab-content" id="pills-tabContent">

            <!-- Popular -->
            <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Sport</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                <h2 class="mb-2"><a href="#">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>

              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                <h2 class="mb-2"><a href="#">17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>

              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                <h2 class="mb-2"><a href="#">9 Half-up/half-down Hairstyles for Long and Medium Hair</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>

              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                <h2 class="mb-2"><a href="#">Life Insurance And Pregnancy: A Working Mom’s Guide</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>

              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                <h2 class="mb-2"><a href="#">The Best Homemade Masks for Face (keep the Pimples Away)</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>

              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                <h2 class="mb-2"><a href="#">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>
            </div> <!-- End Popular -->

            <!-- Trending -->
            <div class="tab-pane fade" id="pills-trending" role="tabpanel" aria-labelledby="pills-trending-tab">
              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                <h2 class="mb-2"><a href="#">17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>

              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                <h2 class="mb-2"><a href="#">9 Half-up/half-down Hairstyles for Long and Medium Hair</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>

              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                <h2 class="mb-2"><a href="#">Life Insurance And Pregnancy: A Working Mom’s Guide</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>

              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Sport</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                <h2 class="mb-2"><a href="#">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>
              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                <h2 class="mb-2"><a href="#">The Best Homemade Masks for Face (keep the Pimples Away)</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>

              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                <h2 class="mb-2"><a href="#">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>
            </div> <!-- End Trending -->

            <!-- Latest -->
            <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">
              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                <h2 class="mb-2"><a href="#">Life Insurance And Pregnancy: A Working Mom’s Guide</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>

              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                <h2 class="mb-2"><a href="#">The Best Homemade Masks for Face (keep the Pimples Away)</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>

              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                <h2 class="mb-2"><a href="#">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>

              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Sport</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                <h2 class="mb-2"><a href="#">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>

              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                <h2 class="mb-2"><a href="#">17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>

              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                <h2 class="mb-2"><a href="#">9 Half-up/half-down Hairstyles for Long and Medium Hair</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>

            </div> <!-- End Latest -->

          </div>
        </div>

        <div class="aside-block">
          <h3 class="aside-title">Video</h3>
          <div class="video-post">
            <a href="https://www.youtube.com/watch?v=AiFfDjmd0jU" class="glightbox link-video">
              <span class="bi-play-fill"></span>
              <img src="assets/img/post-landscape-5.jpg" alt="" class="img-fluid">
            </a>
          </div>
        </div><!-- End Video -->

        <div class="aside-block">
          <h3 class="aside-title">Categories</h3>
          <ul class="aside-links list-unstyled">
            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Business</a></li>
            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Culture</a></li>
            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Sport</a></li>
            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Food</a></li>
            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Politics</a></li>
            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Celebrity</a></li>
            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Startups</a></li>
            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Travel</a></li>
          </ul>
        </div><!-- End Categories -->

        <div class="aside-block">
          <h3 class="aside-title">Tags</h3>
          <ul class="aside-tags list-unstyled">
            <li><a href="category.html">Business</a></li>
            <li><a href="category.html">Culture</a></li>
            <li><a href="category.html">Sport</a></li>
            <li><a href="category.html">Food</a></li>
            <li><a href="category.html">Politics</a></li>
            <li><a href="category.html">Celebrity</a></li>
            <li><a href="category.html">Startups</a></li>
            <li><a href="category.html">Travel</a></li>
          </ul>
        </div><!-- End Tags -->

      </div>

    </div>
  </div>
</section>

<?= $this->endSection() ?>