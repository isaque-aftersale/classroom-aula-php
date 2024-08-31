<?php

function get(string $key): mixed
{
    return $_GET[$key] ?? null;
}

function post(string $key): mixed
{
    return $_POST[$key] ?? null;
}

function isGetOnPath(string $path)
{
    return ($_SERVER['PATH_INFO'] ?? $_SERVER['REQUEST_URI']) === $path && $_SERVER['REQUEST_METHOD'] === "GET";
}

function isPostOnPath(string $path)
{
    return ($_SERVER['PATH_INFO'] ?? $_SERVER['REQUEST_URI']) === $path && $_SERVER['REQUEST_METHOD'] === "POST";
}

enum EndPointEnum
{
    const MULTIPLICATION_TABLE = '/multiplication-table';
    const MULTIPLICATION_TABLE_CALC = '/multiplication-table/calc';
    const IS_PAR_OR_IMPAR = '/is-par-or-impar';
    const IS_PAR_OR_IMPAR_CALC = '/is-par-or-impar/calc';
    const USER_SALURE = '/user-salure';
    const USER_SALURE_CALC = '/user-salure/calc';
    const CALCULATE_RECTANGLE_AREA = '/calculate-rectangle-area';
    const CALCULATE_RECTANGLE_AREA_CALC = '/calculate-rectangle-area/calc';
    const BASIC_CALCULATOR = '/basic-calculator';
}
