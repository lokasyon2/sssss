<?php
add_action('rest_api_init', function() {
    register_rest_route('ai-makale-botu/v1', '/copyleaks-webhook', [
        'methods' => 'POST',
        'callback' => 'ai_makale_copyleaks_callback',
        'permission_callback' => '__return_true'
    ]);
});

function ai_makale_copyleaks_callback($request) {
    $data = $request->get_json_params();
    $post_id = $data['metadata']['post_id'];
    $score = $data['results']['score'];

    if ($score >= 90) {
        wp_publish_post($post_id);
    } else {
        wp_trash_post($post_id);
        ai_makale_generate_and_publish(); // yeniden üretim
    }

    return new WP_REST_Response(['success' => true], 200);
}
