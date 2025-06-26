<?php

function tr($ee, $ru)
{
    $lang = $_GET['lang'] ?? 'ee';

    if ($lang === 'ee') {
        return $ee;
    } elseif ($lang === 'ru') {
        return $ru;
    } else {
        return $ee;
    }
}
