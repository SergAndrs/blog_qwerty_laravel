<?php

/**
 * Change posts words from array.
 *
 * @param $post
 * @return mixed
 */
function replaceOutputText($post)
{
    $attributes = [
        'бублик',
        'ревербератор',
        'кастет',
        'хорь',
        'алкоголь',
        'превысокомногорассмотрительствующий',
        'гражданин',
        'паста'
    ];

    for ($i = 1; $i < count($attributes) - 1; $i++) {
        $post = str_replace($attributes[$i], '*', $post);
    }

    return $post;
}