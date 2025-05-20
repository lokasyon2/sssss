<?php
function ai_makale_random_image_url($keyword) {
    return 'https://source.unsplash.com/featured/?' . urlencode($keyword);
}

function ai_makale_fetch_google_trends($keyword) {
    // Sadece örnek veri - gerçek veri çekimi için dış API entegrasyonu gereklidir
    return [
        'trend_1' => $keyword . ' nedir?',
        'trend_2' => $keyword . ' nasıl çalışır?',
        'trend_3' => '2025 yılında ' . $keyword
    ];
}

function ai_makale_fetch_quora_questions($keyword) {
    return [
        'Quora Question 1 about ' . $keyword,
        'Quora Question 2 about ' . $keyword
    ];
}

function ai_makale_fetch_reddit_topics($keyword) {
    return [
        'Reddit Topic 1 on ' . $keyword,
        'Reddit Thread: Why is ' . $keyword . ' important?'
    ];
}
