<?= $this->extend('master') ?>

<?= $this->section('content') ?>
<section id="search-result" class="search-result">
      <div class="container">
        <div class="row">
          <div class="col-md-9">

            <?php if(!$posts): ?>
              <h3 class="category-title">Registers not found(0)</h3>
              <p>Your search for <?php echo $searched ?> return 0 registers.</p>

              <?php else: ?>
            <h3 class="category-title">Search Results: (<?php echo $pager->getTotal(); ?>)</h3>
              
            <?php foreach($posts as $post): ?>
            <div class="d-md-flex post-entry-2 small-img">
              <a href="/post/<?php echo $post->slug ?>" class="me-4 thumbnail">
                <img src="<?php echo $post->image; ?>" alt="" class="img-fluid">
              </a>
              <div>
                <div class="post-meta"><span class="date"><?php echo $post->categoryName ?></span> <span class="mx-1">&bullet;</span> <span><?php echo CodeIgniter\I18n\Time::parse($post->created_at)->humanize(); ?></span></div>
                <h3><a href="/post/<?php echo $post->slug ?>"><?php echo $post->title ?></a></h3>
                <p><?php echo word_limiter($post->description, 20) ?></p>
                <div class="d-flex align-items-center author">
                  <div class="photo"><img src="<?php echo $post->avatar; ?>" alt="" class="img-fluid"></div>
                  <div class="name">
                    <h3 class="m-0 p-0">
                      <?php echo $post->userFirstName ?> <?php echo $post->userLastName ?>
                    </h3>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>

            <!-- Paging -->
            <div class="text-start py-4">
              <div class="custom-pagination">
                  <?php echo $pager->links();  ?>
              </div>
            </div><!-- End Paging -->
              <?php endif; ?>

          </div>

          <div class="col-md-3">
              <?php echo view_cell("App\Cells\CategorySidebar::render"); ?>
          </div>

        </div>
      </div>
    </section>

<?= $this->section('js') ?>
<script type="module" src="https://unpkg.com/@github/include-fragment-element"></script>
<?= $this->endSection() ?>

<?= $this->endSection() ?>