<?php
/**
 * Plugin Name: AI Makale Botu (Deepseek + Copyleaks + SEO)
 * Description: Deepseek R1 API kullanarak SEO uyumlu, özgünlük kontrolü yapılan, otomatik görsel, kategori, başlık ve eğlenceli içerik üreten gelişmiş makale botu.
 * Version: 1.0.0
 * Author: OpenAI & Kullanıcı
 */

if (!defined('ABSPATH')) exit;

// === Ayar Sayfası ===
require_once plugin_dir_path(__FILE__) . 'includes/admin-settings.php';

// === İçerik Üretim Mantığı ===
require_once plugin_dir_path(__FILE__) . 'includes/content-generator.php';

// === Cron & Planlama ===
require_once plugin_dir_path(__FILE__) . 'includes/scheduler.php';

// === Webhook & Özgünlük Kontrolü ===
require_once plugin_dir_path(__FILE__) . 'includes/copyleaks-webhook.php';

// === Yardımcı Fonksiyonlar ===
require_once plugin_dir_path(__FILE__) . 'includes/helpers.php';

// === NLP & SEO Optimizasyonu ===
require_once plugin_dir_path(__FILE__) . 'includes/nlp-seo-optimizer.php';

register_activation_hook(__FILE__, 'ai_makale_bot_activate');
function ai_makale_bot_activate() {
    if (!wp_next_scheduled('ai_makale_cron_job')) {
        wp_schedule_event(time(), 'hourly', 'ai_makale_cron_job');
    }
}

register_deactivation_hook(__FILE__, 'ai_makale_bot_deactivate');
function ai_makale_bot_deactivate() {
    wp_clear_scheduled_hook('ai_makale_cron_job');
}

add_action('ai_makale_cron_job', 'ai_makale_generate_and_publish');
