<?php
/**
 * Custom Metabox for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Construction_Kit
 */


class Construction_Kit_Settings_Meta_Box {

    public function __construct() {

        if ( is_admin() ) {
            add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
            add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
        }

    }

    public function init_metabox() {

        add_action( 'add_meta_boxes', array( $this, 'add_metabox'  )        );
        add_action( 'save_post',      array( $this, 'save_metabox' ), 10, 2 );

    }

    public function add_metabox() {

        add_meta_box(
            'construction_kit_settings',
            esc_html__( 'Construction Kit Settings', 'construction-kit' ),
            array( $this, 'render_metabox' ),
            array('page', 'post'),
            'side',
            'default'
        );

    }

    public function render_metabox( $post ) {

        // Add nonce for security and authentication.
        wp_nonce_field( 'construction_kit_disable_elements_nonce_action', 'construction_kit_disable_elements_nonce' );

        // Retrieve an existing value from the database.
        $disable_title          = get_post_meta( $post->ID, 'disable_title', true );
        $disable_feat_image     = get_post_meta( $post->ID, 'disable_feat_image', true );
        $disable_space          = get_post_meta( $post->ID, 'disable_space', true );

        // Set default values.
        if( empty( $disable_title ) ) $disable_title = '';
        if( empty( $disable_feat_image ) ) $disable_feat_image = '';
        if( empty( $disable_space ) ) $disable_space = '';

        // Form fields.
        echo '<div class="construction-kit-elements-disable-wrap">';

        // For disable title
        echo '<div class="disable-title">';
        echo '<label for="disable_title" class="disable_title_label">';
        echo '<input type="checkbox" id="disable_title" name="disable_title" class="disable_title_field" value="' . $disable_title . '" ' . checked( $disable_title, 'checked', false ) . '> ' . esc_html__( 'Disable Title', 'construction-kit' );
        echo '</label>';
        echo '</div>';

        // For disable feature image
        echo '<div class="disable-feat-image">';
        echo '<label for="disable_feat_image" class="disable_feat_image_label">';
        echo '<input type="checkbox" id="disable_feat_image" name="disable_feat_image" class="disable_feat_image_field" value="' . $disable_feat_image . '" ' . checked( $disable_feat_image, 'checked', false ) . '> ' . esc_html__( 'Disable Featured Image', 'construction-kit' );
        echo '</label>';
        echo '</div>';

        // For disable space
        echo '<div class="disable-space">';
        echo '<label for="disable_space" class="disable_space_label">';
        echo '<input type="checkbox" id="disable_space" name="disable_space" class="disable_space_field" value="' . $disable_space . '" ' . checked( $disable_space, 'checked', false ) . '> ' . esc_html__( 'Disable Top & Bottom Space of the Content', 'construction-kit' );
        echo '</label>';
        echo '</div>';

        echo '</div>'; /*.construction-kit-elements-disable-wrap*/

    }

    public function save_metabox( $post_id, $post ) {

        // Check if a nonce is set.
        if ( ! isset( $_POST['construction_kit_disable_elements_nonce'] ) )
            return;

        // Check if a nonce is valid.
        if ( ! wp_verify_nonce( $_POST['construction_kit_disable_elements_nonce'], 'construction_kit_disable_elements_nonce_action' ) )
            return;

        // Check if the user has permissions to save data.
        if ( ! current_user_can( 'edit_post', $post_id ) )
            return;

        // Check if it's not an autosave.
        if ( wp_is_post_autosave( $post_id ) )
            return;

        // Check if it's not a revision.
        if ( wp_is_post_revision( $post_id ) )
            return;

        // Sanitize user input.
        $disable_title_new      = isset( $_POST[ 'disable_title' ] ) ? 'checked' : '';
        $disable_feat_image_new = isset( $_POST[ 'disable_feat_image' ] ) ? 'checked' : '';
        $disable_space_new      = isset( $_POST[ 'disable_space' ] ) ? 'checked' : '';

        // Update the meta field in the database.
        update_post_meta( $post_id, 'disable_title', $disable_title_new );
        update_post_meta( $post_id, 'disable_feat_image', $disable_feat_image_new );
        update_post_meta( $post_id, 'disable_space', $disable_space_new );

    }

}

new Construction_Kit_Settings_Meta_Box;