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
      <include-fragment src="/category/sidebar/partials/popular">
        <div class="_container">
          <?php echo $this->include('_placeholders/_trendings'); ?>
        </div>
      </include-fragment>
    </div> <!-- End Popular -->

    <!-- Trending -->
    <div class="tab-pane fade" id="pills-trending" role="tabpanel" aria-labelledby="pills-trending-tab">

      <include-fragment src="/category/sidebar/partials/trending">
        <div class="_container">
          <?php echo $this->include('_placeholders/_trendings'); ?>
        </div>
      </include-fragment>

    </div> <!-- End Trending -->

    <!-- Latest -->
    <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">

      <include-fragment src="/category/sidebar/partials/latest">
        <div class="_container">
          <?php echo $this->include('_placeholders/_trendings'); ?>
        </div>
      </include-fragment>


    </div> <!-- End Latest -->

  </div>
</div>

<div class="aside-block">
  <h3 class="aside-title">Video</h3>
  <div class="video-post">
    <a href="https://www.youtube.com/watch?v=AiFfDjmd0jU" class="glightbox link-video">
      <span class="bi-play-fill"></span>
      <img src="/assets/img/post-landscape-5.jpg" alt="" class="img-fluid">
    </a>
  </div>
</div><!-- End Video -->

<div class="aside-block">
  <?php echo view_cell("App\Cells\CategoryMenu::render", ['view' => 'category_sidebar']); ?>
</div>

</div>