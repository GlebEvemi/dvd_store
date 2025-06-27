<?php

function tr($ee, $ru)
{
    $lang = $_SESSION['lang'] ?? 'ee';

    if ($lang === 'ee') {
        return $ee;
    } elseif ($lang === 'ru') {
        return $ru;
    } else {
        return $ee;
    }
}

function toggleLanguage()
{
    $_SESSION['lang'] = tr('ru', 'ee');
}
