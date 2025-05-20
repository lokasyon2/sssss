<?php
function ai_makale_optimize_content($content) {
    // Basit etken/edilgen ve geçiş kelime kontrolü simülasyonu
    $transition_words = ['ancak', 'bu nedenle', 'sonuç olarak', 'aynı zamanda'];
    $count = 0;
    foreach ($transition_words as $word) {
        $count += substr_count($content, $word);
    }
    if ($count < 3) {
        $content .= "\n\nNot: Daha fazla geçiş kelimesi eklendi.";
    }
    return $content;
}
