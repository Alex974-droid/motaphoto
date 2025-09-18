<!-- Modal Contact -->
<div id="ContactModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <img  src="<?= get_stylesheet_directory_uri() . '/assets/images/contact_header.png' ?>"/>
    </div>
    <div class="modal-body">
        <!-- Formulaire de contact -->
        <div class="contact-form">
          <?php
            // Shortcode Contact Form 7
            echo do_shortcode('[contact-form-7 id="3d741c8" title="Formulaire de contact"]');
          ?>
        </div>
    </div>
  </div>

</div>
