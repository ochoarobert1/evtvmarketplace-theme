<?php
/* --------------------------------------------------------------
WP CUSTOMIZE SECTION - CUSTOM SETTINGS
-------------------------------------------------------------- */

add_action( 'customize_register', 'evtvmarket_customize_register' );

function evtvmarket_customize_register( $wp_customize ) {

    /* SOCIAL */
    $wp_customize->add_section('evmp_social_settings', array(
        'title'    => __('Redes Sociales', 'evtvmarket'),
        'description' => __('Agregue aqui las redes sociales de la página, serán usadas globalmente', 'evtvmarket'),
        'priority' => 175,
    ));

    $wp_customize->add_setting('evmp_social_settings[facebook]', array(
        'default'           => '',
        'sanitize_callback' => 'evtvmarket_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( 'facebook', array(
        'type' => 'url',
        'section' => 'evmp_social_settings',
        'settings' => 'evmp_social_settings[facebook]',
        'label' => __( 'Facebook', 'evtvmarket' ),
    ) );

    $wp_customize->add_setting('evmp_social_settings[twitter]', array(
        'default'           => '',
        'sanitize_callback' => 'evtvmarket_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( 'twitter', array(
        'type' => 'url',
        'section' => 'evmp_social_settings',
        'settings' => 'evmp_social_settings[twitter]',
        'label' => __( 'Twitter', 'evtvmarket' ),
    ) );

    $wp_customize->add_setting('evmp_social_settings[instagram]', array(
        'default'           => '',
        'sanitize_callback' => 'evtvmarket_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( 'instagram', array(
        'type' => 'url',
        'section' => 'evmp_social_settings',
        'settings' => 'evmp_social_settings[instagram]',
        'label' => __( 'Instagram', 'evtvmarket' ),
    ) );

    $wp_customize->add_setting('evmp_social_settings[linkedin]', array(
        'default'           => '',
        'sanitize_callback' => 'evtvmarket_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( 'linkedin', array(
        'type' => 'url',
        'section' => 'evmp_social_settings',
        'settings' => 'evmp_social_settings[linkedin]',
        'label' => __( 'LinkedIn', 'evtvmarket' ),
    ) );

    $wp_customize->add_setting('evmp_social_settings[youtube]', array(
        'default'           => '',
        'sanitize_callback' => 'evtvmarket_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( 'youtube', array(
        'type' => 'url',
        'section' => 'evmp_social_settings',
        'settings' => 'evmp_social_settings[youtube]',
        'label' => __( 'YouTube', 'evtvmarket' ),
    ) );

    $wp_customize->add_setting('evmp_social_settings[yelp]', array(
        'default'           => '',
        'sanitize_callback' => 'evtvmarket_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( 'yelp', array(
        'type' => 'url',
        'section' => 'evmp_social_settings',
        'settings' => 'evmp_social_settings[yelp]',
        'label' => __( 'Yelp', 'evtvmarket' ),
    ) );


    $wp_customize->add_section('evmp_cookie_settings', array(
        'title'    => __('Cookies', 'evtvmarket'),
        'description' => __('Opciones de Cookies', 'evtvmarket'),
        'priority' => 176,
    ));

    $wp_customize->add_setting('evmp_cookie_settings[cookie_text]', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
        'type'           => 'option'

    ));

    $wp_customize->add_control( 'cookie_text', array(
        'type' => 'textarea',
        'label'    => __('Cookie consent', 'evtvmarket'),
        'description' => __( 'Texto del Cookie consent.' ),
        'section'  => 'evmp_cookie_settings',
        'settings' => 'evmp_cookie_settings[cookie_text]'
    ));

    $wp_customize->add_setting('evmp_cookie_settings[cookie_link]', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( 'cookie_link', array(
        'type'     => 'dropdown-pages',
        'section' => 'evmp_cookie_settings',
        'settings' => 'evmp_cookie_settings[cookie_link]',
        'label' => __( 'Link de Cookies', 'evtvmarket' ),
    ) );

}

function evtvmarket_sanitize_url( $url ) {
    return esc_url_raw( $url );
}

/* --------------------------------------------------------------
CUSTOM CONTROL PANEL
-------------------------------------------------------------- */

function register_evtvmarket_settings() {
    register_setting( 'evtvmarket-settings-group', 'monday_start' );
    register_setting( 'evtvmarket-settings-group', 'monday_end' );
    register_setting( 'evtvmarket-settings-group', 'monday_all' );
}

add_action('admin_menu', 'evtvmarket_custom_panel_control');

function evtvmarket_custom_panel_control() {
    add_menu_page(
        __( 'Panel de Control', 'evtvmarket' ),
        __( 'Panel de Control','evtvmarket' ),
        'manage_options',
        'evtvmarket-control-panel',
        'evtvmarket_control_panel_callback',
        'dashicons-admin-generic',
        120
    );
    add_action( 'admin_init', 'register_evtvmarket_settings' );
}

function evtvmarket_control_panel_callback() {
    ob_start();
?>
<div class="evtvmarket-admin-header-container">
    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="evtvmarket" />
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
</div>
<form method="post" action="options.php" class="evtvmarket-admin-content-container">
    <?php settings_fields( 'evtvmarket-settings-group' ); ?>
    <?php do_settings_sections( 'evtvmarket-settings-group' ); ?>
    <div class="evtvmarket-admin-content-item">
        <table class="form-table">
            <tr valign="center">
                <th scope="row"><?php _e('Monday', 'evtvmarket'); ?></th>
                <td>
                    <label for="monday_start">Starting Hour: <input type="time" name="monday_start" value="<?php echo esc_attr( get_option('monday_start') ); ?>"></label>
                    <label for="monday_end">Ending Hour: <input type="time" name="monday_end" value="<?php echo esc_attr( get_option('monday_end') ); ?>"></label>
                    <label for="monday_all">All Day: <input type="checkbox" name="monday_all" value="1" <?php checked( get_option('monday_all'), 1 ); ?>></label>
                </td>
            </tr>
        </table>
    </div>
    <div class="evtvmarket-admin-content-submit">
        <?php submit_button(); ?>
    </div>
</form>
<?php 
    $content = ob_get_clean();
    echo $content;
}
