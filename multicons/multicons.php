<?php
/*
Plugin Name: Multicons
Plugin URI: https://doc4design.com/multicons/
Description: Auto generates code for both a favicon and an apple favicon into the header of your website
Version: 6.0
Requires at least: 2.7
Author: Doc4
Author URI: https://doc4design.com/
License: GPL v2.0 or later
License URL: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: multicons
*/

/******************************************************************************

Copyright 2008 - 2024  Doc4 : info@doc4design.com

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
The license is also available at https://www.gnu.org/licenses/gpl-2.0.html

*********************************************************************************/


// install the options pages
function multicons_menu_page() {
    add_options_page( esc_html__( 'Multicons', 'multicons' ), esc_html__( 'Multicons', 'multicons' ), 'manage_options', 'mmf', 'mmf_options_page' );
}
add_action( 'admin_menu', 'multicons_menu_page' );

// admin
function mmf_admin_init() {
    add_settings_section( 'mmf-section', esc_html__( 'Website Favicon', 'multicons' ), 'mmf_section_callback', 'mmf' );
    add_settings_field( 'mmf-field', esc_html__( 'Favicon URL', 'multicons' ), 'mmf_field_callback', 'mmf', 'mmf-section' );
    register_setting( 'mmf-options', 'mmf-setting', 'sanitize_text_field' );

    add_settings_section( 'mmf-section-admin', esc_html__( 'Dashboard Favicon', 'multicons' ), 'mmf_section_callback_admin', 'mmf' );
    add_settings_field( 'mmf-field-admin', esc_html__( 'Favicon URL', 'multicons' ), 'mmf_field_callback_admin', 'mmf', 'mmf-section-admin' );
    register_setting( 'mmf-options', 'mmf-setting-admin', 'sanitize_text_field' );

    add_settings_section( 'mmf-section-ios', esc_html__( 'Apple Touch Original Icon', 'multicons' ), 'mmf_section_callback_ios', 'mmf' );
    add_settings_field( 'mmf-field-ios', esc_html__( 'Favicon URL', 'multicons' ), 'mmf_field_callback_ios', 'mmf', 'mmf-section-ios' );
    register_setting( 'mmf-options', 'mmf-setting-ios', 'sanitize_text_field' );

    add_settings_section( 'mmf-section-iosflat', esc_html__( 'Apple Touch Precomposed Icon', 'multicons' ), 'mmf_section_callback_iosflat', 'mmf' );
    add_settings_field( 'mmf-field-iosflat', esc_html__( 'Favicon URL', 'multicons' ), 'mmf_field_callback_iosflat', 'mmf', 'mmf-section-iosflat' );
    register_setting( 'mmf-options', 'mmf-setting-iosflat', 'sanitize_text_field' );

    add_settings_section( 'mmf-section-androidhirez', esc_html__( 'Android High Resolution Icon', 'multicons' ), 'mmf_section_callback_androidhirez', 'mmf' );
    add_settings_field( 'mmf-field-androidhirez', esc_html__( 'Favicon URL', 'multicons' ), 'mmf_field_callback_androidhirez', 'mmf', 'mmf-section-androidhirez' );
    register_setting( 'mmf-options', 'mmf-setting-androidhirez', 'sanitize_text_field' );

    add_settings_section( 'mmf-section-androidreg', esc_html__( 'Android Regular Icon', 'multicons' ), 'mmf_section_callback_androidreg', 'mmf' );
    add_settings_field( 'mmf-field-androidreg', esc_html__( 'Favicon URL', 'multicons' ), 'mmf_field_callback_androidreg', 'mmf', 'mmf-section-androidreg' );
    register_setting( 'mmf-options', 'mmf-setting-androidreg', 'sanitize_text_field' );
}
add_action( 'admin_init', 'mmf_admin_init' );

// section callbacks
function mmf_section_callback() {
    echo wp_kses_post( '• Upload your favicon file in .ico format to the media library and paste the link below.<br/>• Dimensions: 16 x 16 pixels or Multi-Size<br/>• Sample File Included' );
}

function mmf_section_callback_admin() {
    echo wp_kses_post( '• Upload your favicon file in .ico format to the media library and paste the link below.<br/>• Dimensions: 16 x 16 pixels or Multi-Size<br/>• Sample File Included' );
}

function mmf_section_callback_ios() {
    echo wp_kses_post( '• Upload your icon in .png format to the media library and paste the link below.<br/><strong>Only use one Apple Touch Icon link (Do not add a url to both Original and Precomposed)</strong><br/>• Name your Apple Touch Original Icon [apple-touch-icon.png]<br/>• Dimensions: 180 x 180 pixels<br/>• Sample File Included' );
}

function mmf_section_callback_iosflat() {
    echo wp_kses_post( '• Upload your icon in .png format to the media library and paste the link below.<br/><strong>Only use one Apple Touch Icon link (Do not add a url to both Original and Precomposed)</strong><br/>• Name your Apple Touch Precomposed Icon [apple-touch-icon-precomposed.png]<br/>• Dimensions: 180 x 180 pixels<br/>• Sample File Included' );
}

function mmf_section_callback_androidhirez() {
    echo wp_kses_post( '• Upload your icon in .png format to the media library and paste the link below.<br/><strong>You may use both options for Android (High Resolution and Regular Icons)</strong><br/>• Name your Android High Resolution Icon [icon-hires.png]<br/>• Dimensions: 192 x 192 pixels<br/>• Sample File Included' );
}

function mmf_section_callback_androidreg() {
    echo wp_kses_post( '• Upload your icon in .png format to the media library and paste the link below.<br/><strong>You may use both options for Android (High Resolution and Regular Icons)</strong><br/>• Name your Android Regular Icon [icon-regular.png]<br/>• Dimensions: 128 x 128 pixels<br/>• Sample File Included' );
}

// field callbacks (styles preserved)
function mmf_field_callback() {
    $mmf_setting = get_option( 'mmf-setting' );
    echo '<input type="text" size="60" maxlength="150" name="mmf-setting" value="' . esc_attr( $mmf_setting ) . '" /><br/><br/><br/><br/>';
}

function mmf_field_callback_admin() {
    $mmf_setting_admin = get_option( 'mmf-setting-admin' );
    echo '<input type="text" size="60" maxlength="150" name="mmf-setting-admin" value="' . esc_attr( $mmf_setting_admin ) . '" /><br/><br/><br/><br/>';
}

function mmf_field_callback_ios() {
    $mmf_setting_ios = get_option( 'mmf-setting-ios' );
    echo '<input type="text" size="60" maxlength="150" name="mmf-setting-ios" value="' . esc_attr( $mmf_setting_ios ) . '" /><br/><br/><br/><br/>';
}

function mmf_field_callback_iosflat() {
    $mmf_setting_iosflat = get_option( 'mmf-setting-iosflat' );
    echo '<input type="text" size="60" maxlength="150" name="mmf-setting-iosflat" value="' . esc_attr( $mmf_setting_iosflat ) . '" /><br/><br/><br/><br/>';
}

function mmf_field_callback_androidhirez() {
    $mmf_setting_androidhirez = get_option( 'mmf-setting-androidhirez' );
    echo '<input type="text" size="60" maxlength="150" name="mmf-setting-androidhirez" value="' . esc_attr( $mmf_setting_androidhirez ) . '" /><br/><br/><br/><br/>';
}

function mmf_field_callback_androidreg() {
    $mmf_setting_androidreg = get_option( 'mmf-setting-androidreg' );
    echo '<input type="text" size="60" maxlength="150" name="mmf-setting-androidreg" value="' . esc_attr( $mmf_setting_androidreg ) . '" /><br/><br/><br/><br/>';
}

// options page
function mmf_options_page() {
?>
<div class="wrap">
    <h1><?php esc_html_e( 'Multicons [ Multiple Favicons ]', 'multicons' ); ?></h1>
    <hr>
    <form action="options.php" method="POST">
        <?php settings_fields( 'mmf-options' ); ?>
        <?php do_settings_sections( 'mmf' ); ?>
        <?php submit_button( esc_html__( 'Save Changes', 'multicons' ) ); ?>
    </form>
    <hr>
    <p><?php esc_html_e( 'Note: When no link is provided, a default regular favicon will be used - this is to ensure the plugin is working properly.', 'multicons' ); ?></p>
</div>
<?php
}

// frontend favicon
function mmf_display_favicon() {
    $mmf_custom_favicon  = get_option( 'mmf-setting' );
    $mmf_default_favicon = plugins_url( 'images/favicon.ico', __FILE__ );
    $favicon_url = !empty( $mmf_custom_favicon ) ? $mmf_custom_favicon : $mmf_default_favicon;
    echo '<link rel="shortcut icon" href="' . esc_url( $favicon_url ) . '" />' . "\n";
}
add_action( 'wp_head', 'mmf_display_favicon' );

// admin favicon
function mmf_display_icon_admin() {
    $mmf_custom_favicon_admin = get_option( 'mmf-setting-admin' );
    if ( !empty( $mmf_custom_favicon_admin ) ) {
        echo '<link rel="shortcut icon" href="' . esc_url( $mmf_custom_favicon_admin ) . '" />' . "\n";
    }
}
add_action( 'admin_head', 'mmf_display_icon_admin' );

// apple touch icons
function mmf_display_icon_ios() {
    $mmf_custom_icon_ios = get_option( 'mmf-setting-ios' );
    if ( !empty( $mmf_custom_icon_ios ) ) {
        echo '<link rel="apple-touch-icon" href="' . esc_url( $mmf_custom_icon_ios ) . '" />' . "\n";
    }
}
add_action( 'wp_head', 'mmf_display_icon_ios' );

function mmf_display_icon_iosflat() {
    $mmf_custom_icon_iosflat = get_option( 'mmf-setting-iosflat' );
    if ( !empty( $mmf_custom_icon_iosflat ) ) {
        echo '<link rel="apple-touch-icon" href="' . esc_url( $mmf_custom_icon_iosflat ) . '" />' . "\n";
    }
}
add_action( 'wp_head', 'mmf_display_icon_iosflat' );

// android icons
function mmf_display_icon_androidhirez() {
    $mmf_custom_icon_androidhirez = get_option( 'mmf-setting-androidhirez' );
    if ( !empty( $mmf_custom_icon_androidhirez ) ) {
        echo '<link rel="icon" href="' . esc_url( $mmf_custom_icon_androidhirez ) . '" />' . "\n";
    }
}
add_action( 'wp_head', 'mmf_display_icon_androidhirez' );

function mmf_display_icon_androidreg() {
    $mmf_custom_icon_androidreg = get_option( 'mmf-setting-androidreg' );
    if ( !empty( $mmf_custom_icon_androidreg ) ) {
        echo '<link rel="icon" href="' . esc_url( $mmf_custom_icon_androidreg ) . '" />' . "\n";
    }
}
add_action( 'wp_head', 'mmf_display_icon_androidreg' );
?>