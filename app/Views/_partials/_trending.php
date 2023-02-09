 <h3>Trending</h3>
 <ul class="trending-post">
   <?php foreach ($posts as $index => $post) : ?>
     <li>
       <a href="/post/<?php echo $post->slug; ?>">
         <span class="number"><?php echo $index + 1 ?></span>
         <h3><?php echo $post->title; ?></h3>
         <span class="author">
           <?php echo $post->userFirstName ?> <?php echo $post->userLastName ?>
         </span>
       </a>
     </li>
   <?php endforeach; ?>
 </ul>