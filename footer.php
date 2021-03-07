<?php
/**
 * Footer Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */
?>
    <footer class="page-footer">
		<div class="container">
            <section class="page-footer-section">
            <?php
            dutchtown_multisite_widget( 'footer-1' );
            ?>
            </section>
            <section class="page-footer-section">
            <?php 
            dutchtown_multisite_widget( 'footer-2' );
            ?>
            </section>
            <section class="page-footer-section">
            <?php 
            dutchtown_multisite_widget( 'footer-3' );
            ?>
            </section>
        </div>
	</footer>
<?php
    require get_template_directory() . '/nav/modal-nav.php';
    wp_footer();
?>
</body>
</html>