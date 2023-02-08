  <?php foreach ($posts as $post) : ?>
    <div class="post-entry-1 border-bottom">
      <div class="post-meta"><span class="date"><?php echo $post->categoryName ?></span> <span class="mx-1">&bullet;</span> <span>
          <?php echo date('d/m/Y', strtotime($post->created_at)); ?>
        </span></div>
      <h2 class="mb-2"><a href="#"><?php echo $post->title; ?></a></h2>
      <span class="author mb-3 d-block">
        <?php echo $post->userFirstName ?>
        <?php echo $post->userLastName ?>
      </span>
    </div>
  <?php endforeach ?>