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
  <div class="help-popup pull-left">
      <div class="help-popup__close" onclick="closeHelpPopup()"><i class="fa fa-close"></i></div>

      <div class="help-popup__content">
          <p class="text-bold">Update</p>
          <small class="callMeBackRequest">Ontvang maandelijks de nieuwste artikelen</small>

          <form class="form-group callMeBackRequest Formisimo_clocked_71859" target="_blank" action="https://www.nieuwsbriefsysteem.nl/p/inschrijven/10862/e18289.html" accept-charset="UTF-8" method="post">
              <input type="email" class="form-control" placeholder="Uw e-mailadres" name="nls[email_address]" id="nls_email_address" value="">
              <button class="btn btn-orange btn-small btn-signup" name="button">Inschrijven</button>
          </form>
      </div>

      <div class="help-popup__finish" style="display: none;">
          <p class="text-bold">Uw e-mailadres is doorgegeven!</p>
      </div>

      <div class="help-popup__error" style="display: none;">
          <p class="text-bold">Er is iets fout gegaan met het doorgeven van uw e-mailadres!</p>
      </div>
  </div>
  <div class="layover"></div>
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
