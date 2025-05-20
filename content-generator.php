<?php
function ai_makale_generate_and_publish() {
    $options = get_option('ai_makale_botu_options');
    $api_key = $options['deepseek_api_key'] ?? '';
    if (!$api_key) return;

    $prompt = "SEO uyumlu, eğlenceli, mizahi bir dilde 1500 kelimelik bir makale üret. 'yapay zeka' konusunu işle. Sonuç, sonuç olarak gibi ifadelerden kaçın. Giriş-gelişme-sonuç yapısından uzak dur.";

    $response = wp_remote_post('https://openrouter.ai/api/deepseek', [
        'headers' => ['Authorization' => 'Bearer ' . $api_key],
        'body' => json_encode(['prompt' => $prompt]),
        'timeout' => 60
    ]);

    if (is_wp_error($response)) return;

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);
    $content = $data['text'] ?? '';

    $post_id = wp_insert_post([
        'post_title' => 'Yapay Zeka Hakkında Her Şey',
        'post_content' => $content,
        'post_status' => 'draft',
        'post_author' => 1,
        'post_category' => [1]
    ]);

    if ($post_id) {
        update_post_meta($post_id, '_yoast_wpseo_focuskw', 'yapay zeka');
    }
}
