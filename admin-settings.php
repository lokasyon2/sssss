<?php
add_action('admin_menu', function() {
    add_menu_page('AI Makale Botu', 'AI Makale Botu', 'manage_options', 'ai-makale-botu', 'ai_makale_botu_settings_page');
});

function ai_makale_botu_settings_page() {
    ?>
    <div class="wrap">
        <h1>AI Makale Botu Ayarları</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('ai_makale_botu_options');
            do_settings_sections('ai_makale_botu');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

add_action('admin_init', function() {
    register_setting('ai_makale_botu_options', 'ai_makale_botu_options');
    add_settings_section('api_settings', 'API Ayarları', null, 'ai_makale_botu');

    add_settings_field('deepseek_api_key', 'DeepSeek API Key', function() {
        $options = get_option('ai_makale_botu_options');
        echo '<input type="text" name="ai_makale_botu_options[deepseek_api_key]" value="' . esc_attr($options['deepseek_api_key'] ?? '') . '" size="50">';
    }, 'ai_makale_botu', 'api_settings');

    add_settings_field('copyleaks_webhook_url', 'Copyleaks Webhook URL', function() {
        $options = get_option('ai_makale_botu_options');
        echo '<input type="text" name="ai_makale_botu_options[copyleaks_webhook_url]" value="' . esc_attr($options['copyleaks_webhook_url'] ?? '') . '" size="50">';
    }, 'ai_makale_botu', 'api_settings');
});
