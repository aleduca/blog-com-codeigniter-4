<h3 class="aside-title">Categories</h3>
<ul class="aside-links list-unstyled">
  <?php foreach ($categories as $category) : ?>
    <li><a href="/category/<?php echo $category->slug ?>"><i class="bi bi-chevron-right"></i> <?php echo $category->name ?></a></li>
  <?php endforeach; ?>
</ul>