<!--Footer-->
<footer class="py-4 bg-dark">
    <div class="container">
        <?php dynamic_sidebar('Footer-area-1');?>
    </div>
</footer>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<?php if (ICL_LANGUAGE_CODE == "ar"): ?>
<script src="https://cdn.rtlcss.com/bootstrap/v4.1.3/js/bootstrap.min.js"></script>
<?php endif; ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/owl.carousel.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/pushy.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
<?php wp_footer(); ?>
<!--#Footer-->
</body>

</html>