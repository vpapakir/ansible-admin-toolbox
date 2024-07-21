<?php

/**
 * Recipe floating bar template.
 * 
 * @package Delicious_Recipes_Pro
 */

defined('ABSPATH') || exit;

$commenter    = wp_get_current_commenter();
$global_settings      = delicious_recipes_get_global_settings();
$enableRecaptchaForComments = isset( $global_settings['enableRecaptchaForComments']['0'] ) && 'yes' === $global_settings['enableRecaptchaForComments']['0'] ? true : false;
$recaptchaVersion = $global_settings['recpatchaVersion'];

$comment_form = array(
    /* translators: %s is recipe title */
    'title_reply'         => esc_html__( 'Add a question', 'delicious-recipes-pro' ),
    /* translators: %s is recipe title */
    'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'delicious-recipes-pro' ),
    'title_reply_before'  => '<span id="reply-title" class="comment-reply-title">',
    'title_reply_after'   => '</span>',
    'comment_notes_after' => '',
    'label_submit'        => esc_html__( 'Submit Your Question', 'delicious-recipes-pro' ),
    'logged_in_as'        => '',
    'comment_field'       => '',
);

$name_email_required = (bool) get_option( 'require_name_email', 1 );
$fields              = array(
    'author' => array(
        'label'    => __( 'Your Name', 'delicious-recipes-pro' ),
        'type'     => 'text',
        'value'    => $commenter['comment_author'],
        'required' => $name_email_required,
        'placeholder' => __( 'Name', 'delicious-recipes-pro' )
    ),
    'email'  => array(
        'label'    => __( 'Your Email', 'delicious-recipes-pro' ),
        'type'     => 'email',
        'value'    => $commenter['comment_author_email'],
        'required' => $name_email_required,
        'placeholder' => __( 'Email', 'delicious-recipes-pro' )
    ),
);

$comment_form['fields'] = array();

foreach ( $fields as $key => $field ) {
    $field_html  = '<p class="comment-form-' . esc_attr( $key ) . '">';
    $field_html .= '<label for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] );

    if ( $field['required'] ) {
        $field_html .= '&nbsp;<span class="required">*</span>';
    }

    $field_html .= '</label><input id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( $field['required'] ? 'required' : '' ) . ' placeholder="' . esc_attr( $field['placeholder'] ) . '" /></p>';

    $comment_form['fields'][ $key ] = $field_html;
}

$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Your Question', 'delicious-recipes-pro' ) . '&nbsp;<span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" required placeholder="'. esc_html__( 'Write your question', 'delicious-recipes-pro' ) .'"></textarea></p>';

$comment_form['comment_field'] .= '<input type="hidden" name="comment_type" value="question">';

if ( $enableRecaptchaForComments && $recaptchaVersion === 'v2' ) {
	$comment_form['comment_field'] .= '<div class="g-recaptcha" data-sitekey="' . esc_attr( $global_settings['recaptchaSiteKey'] ) . '" data-widget-id="recaptcha-question"></div>';
}

comment_form( apply_filters( 'delicious_recipes_question_comment_form_args', $comment_form ) );