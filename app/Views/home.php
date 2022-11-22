<?= $this->extend('master') ?>

<?= $this->section('content') ?>
    <!-- ======= Hero Slider Section ======= -->
    <!-- view_cell('App\Libraries\BannerHome::load')  -->
    <section id="hero-slider" class="hero-slider _bannerHome">
    </section><!-- End Hero Slider Section -->

    <!-- ======= Post Grid Section ======= -->
    <section id="posts" class="posts _recent">
    </section> <!-- End Post Grid Section -->

    <!-- ======= Culture Category Section ======= -->
    <section class="category-section _category_culture">
    </section><!-- End Culture Category Section -->

    <!-- ======= Business Category Section ======= -->
    <section class="category-section _category_business">
    </section><!-- End Business Category Section -->

    <!-- ======= Lifestyle Category Section ======= -->
    <section class="category-section _category_lifestyle">
    </section><!-- End Lifestyle Category Section -->
<?= $this->endSection() ?>

<?= $this->section('js') ?>

<script type="module">
import '/assets/js/loadHomeData.js';
</script>

<?= $this->endSection() ?>
