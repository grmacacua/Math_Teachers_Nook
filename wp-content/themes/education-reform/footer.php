<?php
/**
 * The template for displaying the footer
 * @package Education Reform
 * @since 1.0.0
 */

/**
 * Toogle Contents
 * @hooked education_reform_content_offcanvas - 30
*/

do_action('education_reform_before_footer_content_action'); ?>

</div>

<footer id="site-footer" role="contentinfo">

    <?php
    /**
     * Footer Content
     * @hooked education_reform_footer_content_widget - 10
     * @hooked education_reform_footer_content_info - 20
    */

    do_action('education_reform_footer_content_action'); ?>

</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
