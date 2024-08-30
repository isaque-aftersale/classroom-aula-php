<?php

function isGetOnPath(string $path) {
    return ($_SERVER['PATH_INFO'] ?? $_SERVER['REQUEST_URI']) === $path && $_SERVER['REQUEST_METHOD'] === "GET";
}