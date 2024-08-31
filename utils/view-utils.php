<?php


function view(string $path, array $data = []): void
{
    extract($data);
    require_once("./views/$path.php");
}

function headerTemplate(): void
{
    require_once('./views/templates/header.php');
}

function when(bool $value, Closure $callback): ?string
{
    if ($value === false) return null;

    return $callback($value);
}

enum ViewEnum
{
    const MULTIPLICATION_TABLE = 'multiplication-table';
    const IS_PAR_IMPAR = 'is-par-impar';
    const USER_SALURE = 'user-salure';
    const CALCULATE_RECTANGLE_AREA = 'calculate-rectangle-area';
    const BASIC_CALCULATOR = 'basic-calculator';
}
