<?php


function info($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function dd(mixed $data): void
{
    info($data);
    exit();
}