<?php

require_once("./utils/routes-utils.php");


class Controllers
{
    public static function multiplicationTableController(): void
    {
        $multiplecationTable = [];
        $number = $_GET['number'] ?? null;

        if (empty($number)) return;


        for ($i = 0; $i < 10; $i++) {
            $multiplecationTable[] = [
                "value1" => $number,
                "value2" => $i,
                "result" => intval($number) * $i
            ];
        }

        compact($multiplecationTable);

        require_once("./views/multiplication-table.php");
    }

    public static function isParOrImparController(): void
    {
        $response = null;
        $number = $_GET['number'] ?? null;

        if (empty($number)) return;

        if ($number % 2) {
            $response = "This number is Impar";
        } else {
            $response = "This number is Par";
        }

        compact('response');

        require_once("./views/is-par-impar.php");
    }

    public static function userSalureController(): void
    {
        $message = null;
        $name = $_GET['name'] ?? null;
        $age = $_GET['age'] ?? null;

        if (empty($name)) {
            $message = "User name not defined";
        }

        if (empty($age)) {
            $message = "User age not defined";
        }

        if (!is_int($age)) {
            $message = "User age it should integer";
        }

        if ($age > 18) {
            $message = "$name é maior de 18 e tem $age Anos.";
        }

        if ($age < 18) {
            $message = "$name não é maior de 18 e tem $age Anos.";
        }

        if ($age == 18) {
            $message = "$name tem 18 Anos.";
        }

        compact('message');

        require_once("./views/user-salure.php");
    }
}

if (isGetOnPath('/')) {
    $releases = [
        "Multiplication Table",
        "Number is Par or Impar",
        "User Salure"
    ];
    
    require_once("./views/home.php");
    return;
}

if (isGetOnPath('/multiplication-table')) {
    require_once("./views/multiplication-table.php");
    return;
}

if (isGetOnPath('/multiplication-table/calc')) {
    Controllers::multiplicationTableController();
    return;
}


if (isGetOnPath('/is-par-or-impar')) {
    require_once("./views/is-par-impar.php");
    return;
}

if (isGetOnPath('/is-par-or-impar/calc')) {
    Controllers::isParOrImparController();
    return;
}

if (isGetOnPath('/user-salure')) {
    require_once("./views/user-salure.php");
    return;
}

if (isGetOnPath('/user-salure/calc')) {
    Controllers::userSalureController();
    return;
}

echo "404 Not Found";
http_response_code(404);
