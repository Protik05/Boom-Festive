<?php
/**
 * Template Overrides for WooCommerce pages
 *
 * @link https://docs.woocommerce.com/document/woocommerce-theme-developer-handbook/#section-3
 *
 * @package Boom Festive
 */
function ibsf_wc_modify(){
        /** 
        * Modify WooCommerce opening and closing HTML tags
        * We need Bootstrap-like opening/closing HTML tags
        */
        add_action('woocommerce_before_main_content','ibsf_open_container_row',5);
        function ibsf_open_container_row(){
            ?>
				<div class="container shop-content"><div class="row">
			<?php
        }
        add_action('woocommerce_after_main_content','ibsf_close_container_row',5);
        function ibsf_close_container_row(){
            ?>
				</div></div>
			<?php
        }
       
        /** 
        * Remove the main WC sidebar from its original position
        * We'll be including it somewhere else later on
        */
        remove_action('woocommerce_sidebar','woocommerce_get_sidebar');
        if(is_shop()){
            add_action('woocommerce_before_main_content','ibsf_add_sidebar_tags',6);
            function ibsf_add_sidebar_tags(){
                ?>
					<div class="sidebar-shop col-lg-3 col-md-4 order-2 order-md-1">
				<?php
            }
            // Put the main WC sidebar back, but using other action hook and on a different position
            add_action('woocommerce_before_main_content','woocommerce_get_sidebar',7);

            add_action('woocommerce_before_main_content','ibsf_close_sidebar_tags',8);
            function ibsf_close_sidebar_tags(){
                ?>
                </div>
            <?php
            }
            add_action('woocommerce_after_shop_loop_item_title','the_excerpt',1);
           
        }
        
        
        // Modify HTML tags on a shop page. We also want Bootstrap-like markup here (.primary div)
        add_action('woocommerce_before_main_content','ibsf_add_shop_tags',9);
        function ibsf_add_shop_tags(){
            if(is_shop()){
                ?>
                <div class="main-content col-lg-9 col-md-8 order-1 order-md-2">
            <?php  
            }
            else{
                ?>
                <div class="col">
            <?php
            }
        }

        add_action('woocommerce_after_main_content','ibsf_close_shop_tags',4);
        function ibsf_close_shop_tags(){
            ?>
            </div>
        <?php
        }
       
       
}
add_action('wp','ibsf_wc_modify');