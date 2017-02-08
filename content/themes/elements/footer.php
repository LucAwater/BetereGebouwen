  </main>

  <!-- Footer -->
  <footer class="footer">
    <div class="footer__body">
        <?php
        $logo = get_field('logo', 'option');
        $logo_url = $logo['sizes']['medium'];
        $logo_alt = $logo['alt'];
        ?>
        <img src="<?php echo $logo_url; ?>" alt="<?php echo $logo_alt; ?>">
        <div>
            <?php echo get_field('text', 'option'); ?>
        </div>
    </div>
  </footer>

  <!-- Scripts -->
  <?php wp_footer(); ?>

  <!--[if IE]>
    <script src="/scripts/flexibility.js"></script>
    <script type="text/javascript">
        flexibility(document);
    </script>
  <![endif]-->
</body>
</html>