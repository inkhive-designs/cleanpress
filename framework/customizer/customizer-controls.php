<?php
/*
** Customizer Controls
*/
if (class_exists('WP_Customize_Control')) {
    class Cleanpress_WP_Customize_Category_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         */
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;', 'cleanpress' ),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                )
            );

            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }
}

if ( class_exists('WP_Customize_Control') && class_exists('woocommerce') ) {
    class Cleanpress_WP_Customize_Product_Category_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         */
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;', 'cleanpress' ),
                    'option_none_value' => '0',
                    'taxonomy'          => 'product_cat',
                    'selected'          => $this->value(),
                )
            );

            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }
}
if (class_exists('WP_Customize_Control')) {
    class Cleanpress_WP_Customize_Upgrade_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         */
        public function render_content() {
            printf(
                '<label class="customize-control-upgrade"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $this->description
            );
        }
    }
}


if( class_exists( 'WP_Customize_Control' ) ):
class Cleanpress_Switch_Control extends WP_Customize_Control{
    public $type = 'switch';
    public $enable_disable = array();

    public function __construct($manager, $id, $args = array() ){
        $this->enable_disable = $args['enable_disable'];
        parent::__construct( $manager, $id, $args );
    }

    public function render_content(){
        ?>
        <span class="customize-control-title">
			<?php echo esc_html( $this->label ); ?>
		</span>

        <?php if($this->description){ ?>
            <span class="description customize-control-description">
			<?php echo wp_kses_post($this->description); ?>
			</span>
        <?php } ?>

        <?php
        $switch_class = ($this->value() == 'enable') ? 'switch-enable' : '';
        $enable_disable = $this->enable_disable;
        ?>
        <div class="enable-disable-switch <?php echo $switch_class; ?>">
            <div class="enable-disable-switch-inner">
                <div class="enable-disable-switch-enabled">
                    <div class="enable-disable-switch-switch"><?php echo esc_html($enable_disable['enable']) ?></div>
                </div>

                <div class="enable-disable-switch-disabled">
                    <div class="enable-disable-switch-switch"><?php echo esc_html($enable_disable['disable']) ?></div>
                </div>
            </div>
        </div>
        <input <?php $this->link(); ?> type="hidden" value="<?php echo esc_attr($this->value()); ?>"/>
        <?php
    }
}

        class Cleanpress_Custom_JS_Control extends WP_Customize_Control {
            public $type = 'textarea';

            public function render_content() {
                ?>
                <label>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <textarea rows="8" style="width:100%;background: #222; color: #eee;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
                </label>
                <?php
            }
        }


    class Cleanpress_Fontawesome_Icon_Chooser extends WP_Customize_Control{
        public $type = 'icon';

        public function render_content(){
            ?>
            <label>
                <span class="customize-control-title">
                <?php echo esc_html( $this->label ); ?>
                </span>

                <?php if($this->description){ ?>
                    <span class="description customize-control-description">
	            	<?php echo wp_kses_post($this->description); ?>
	            </span>
                <?php } ?>

                <div class="cleanpress-selected-icon">
                    <i class="fa <?php echo esc_attr($this->value()); ?>"></i>
                    <span><i class="fa fa-angle-down"></i></span>
                </div>

                <ul class="cleanpress-icon-list clearfix">
                    <?php
                    $cleanpress_fa_icon_array = cleanpress_fa_icon_array();
                    foreach ($cleanpress_fa_icon_array as $cleanpress_fa_icon) {
                        $icon_class = $this->value() == $cleanpress_fa_icon ? 'icon-active' : '';
                        echo '<li class='.$icon_class.'><i class="'.$cleanpress_fa_icon.'"></i></li>';
                    }
                    ?>
                </ul>
                <input type="hidden" value="<?php $this->value(); ?>" <?php $this->link(); ?> />
            </label>
            <?php
        }
    }
endif;
