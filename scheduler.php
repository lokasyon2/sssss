<?php
add_filter('cron_schedules', function($schedules) {
    $schedules['every_twelve_minutes'] = [
        'interval' => 720,
        'display' => __('Her 12 dakikada bir')
    ];
    return $schedules;
});
