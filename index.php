<?php

require_once "./utils/routes-utils.php";
require_once "./utils/view-utils.php";


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

class Controllers
{
    public static function multiplicationTableController(): void
    {
        $message = null;
        $number = $_GET['number'] ?? null;

        if (empty($number)) {
            view(ViewEnum::MULTIPLICATION_TABLE, [
                'error' => "Field number is required"
            ]);
        }

        for ($i = 0; $i <= 10; $i++) {
            $res = intval($number) * $i;

            $message .= "$number * $i = $res </br>";
        }

        view(ViewEnum::MULTIPLICATION_TABLE, compact('message'));
    }

    public static function isParOrImparController(): void
    {
        $message = null;
        $number = $_GET['number'] ?? null;

        if ($number % 2) {
            $message = "This number is Impar";
        } else if (empty($number)) {
            $message = "This number is zero";
        } else if (!($number % 2)) {
            $message = "This number is Par";
        }

        view(ViewEnum::IS_PAR_IMPAR, compact('message'));
    }

    public static function userSalureController(): void
    {
        $message = null;
        $name = $_GET['name'] ?? null;
        $age = $_GET['age'] ?? null;

        if (empty($name)) {
            $error = "User name not defined";
            view(ViewEnum::USER_SALURE, compact('error'));
        }

        if (empty($age)) {
            $error = "User age not defined";
            view(ViewEnum::USER_SALURE, compact('error'));
        }

        if (!is_numeric($age)) {
            $error = "User age it should integer";
            view(ViewEnum::USER_SALURE, compact('error'));
        }

        if ($age > 18) {
            $message = "$name é maior de 18 e tem $age Anos.";
        } else if ($age < 18) {
            $message = "$name não é maior de 18 e tem $age Anos.";
        } else if ($age == 18) {
            $message = "$name tem 18 Anos.";
        }

        view(ViewEnum::USER_SALURE, compact('message'));
    }

    public static function calculateRectangleAreaController(): void
    {
        $width = get('width');
        $height = get('height');

        if (empty($width)) {
            $error = 'Field width is required';
            view(ViewEnum::CALCULATE_RECTANGLE_AREA, compact('error'));
        }

        if (empty($width)) {
            $error = 'Field height is required';
            view(ViewEnum::CALCULATE_RECTANGLE_AREA, compact('error'));
        }

        if (!is_numeric($width)) {
            $error = 'Field width expected numeric value';
            view(ViewEnum::CALCULATE_RECTANGLE_AREA, compact('error'));
        }

        if (!is_numeric($height)) {
            $error = 'Field height expected numeric value';
            view(ViewEnum::CALCULATE_RECTANGLE_AREA, compact('error'));
        }

        $area = (floatval($width) * floatval($height)) . 'm²';

        view(ViewEnum::CALCULATE_RECTANGLE_AREA, compact('area'));
    }

    public static function basicCalculatorController(): void
    {
        $value1 = get('value1');
        $value2 = get('value2');
        $operator = get('operator');

        if (!is_numeric($value1)) {
            $error = "Field value 1 expected numeric";
            view(ViewEnum::BASIC_CALCULATOR, compact('error'));
        }

        if (!is_numeric($value2)) {
            $error = "Field value 2 expected numeric";
            view(ViewEnum::BASIC_CALCULATOR, compact('error'));
        }

        if (empty($value1)) {
            $error = "Field value 1 is required";
            view(ViewEnum::BASIC_CALCULATOR, compact('error'));
        }

        if (empty($value2)) {
            $error = "Field value 2 is required";
            view(ViewEnum::BASIC_CALCULATOR, compact('error'));
        }

        if (empty($operator)) {
            $error = "Field operator is required";
            view(ViewEnum::BASIC_CALCULATOR, compact('error'));
        }

        $value1 = intval($value1);
        $value2 = intval($value2);

        if ($value1 === 0 && $value2 === 1) {
            $error = "Dividinzio from zero numeric invalid infinit number";
            view(ViewEnum::BASIC_CALCULATOR, compact('error'));
        }

        $calc = match ($operator) {
            '+' => $value1 + $value2,
            '-' => $value1 - $value2,
            '*' => $value1 * $value2,
            '^' => $value1 ^ $value2,
            '%' => $value1 % $value2,
            '/' => $value1 / $value2,
            default => view(ViewEnum::BASIC_CALCULATOR, ['error' => "Field operator is required"]),
        };

        $result = "$value1 $operator $value2 = $calc";

        view(ViewEnum::BASIC_CALCULATOR, compact('result'));
    }
}

if (isGetOnPath('/')) {
    $menu = [];

    $menu[] = [
        'path' => EndPointEnum::MULTIPLICATION_TABLE,
        'text' => 'Multiplication Table',
        'br' => 'BR.: Retorna a tabuada a partir de um número decimal',
        'us' => 'US.: Return an multiplication table of decimal number'
    ];

    $menu[] = [
        'path' => EndPointEnum::IS_PAR_OR_IMPAR,
        'text' => 'Number is Par or Impar',
        'br' => 'BR.: Verificar se um número é impar ou par',
        'us' => 'US.: Cheking if number is impar or par'
    ];

    $menu[] = [
        'path' => EndPointEnum::USER_SALURE,
        'text' => 'User Salure',
        'br' => 'BR.: Fazer uma saldação para o usuário',
        'us' => 'US.: Make salure to user'
    ];

    $menu[] = [
        'path' => EndPointEnum::CALCULATE_RECTANGLE_AREA,
        'text' => 'Calculate Rectangle Area',
        'br' => 'BR.: Calcular area de um retangulo',
        'us' => 'US.: Calculate rectangle area'
    ];

    $menu[] = [
        'path' => EndPointEnum::BASIC_CALCULATOR,
        'text' => 'Basic Calculator',
        'br' => 'BR.: Calculadora basica de dois números',
        'us' => 'US.: Basic calculator of two numbers'
    ];

    $releases = [
        'Calculate Rectangle Area',
        'Number is Par or Impar',
        'Basic Calculator'
    ];

    view('home', compact('menu', 'releases'));
    return;
}

if (isGetOnPath(EndPointEnum::MULTIPLICATION_TABLE)) {
    view("multiplication-table");
    return;
}

if (isGetOnPath(EndPointEnum::MULTIPLICATION_TABLE_CALC)) {
    Controllers::multiplicationTableController();
    return;
}


if (isGetOnPath(EndPointEnum::IS_PAR_OR_IMPAR)) {
    view("is-par-impar");
    return;
}

if (isGetOnPath(EndPointEnum::IS_PAR_OR_IMPAR_CALC)) {
    Controllers::isParOrImparController();
    return;
}

if (isGetOnPath(EndPointEnum::USER_SALURE)) {
    view("user-salure");
    return;
}

if (isGetOnPath(EndPointEnum::USER_SALURE_CALC)) {
    Controllers::userSalureController();
    return;
}

if (isGetOnPath(EndPointEnum::BASIC_CALCULATOR)) {
    view(ViewEnum::BASIC_CALCULATOR);
    return;
}

if (isGetOnPath(EndPointEnum::BASIC_CALCULATOR_CALC)) {
    Controllers::basicCalculatorController();
    return;
}

if (isGetOnPath(EndPointEnum::CALCULATE_RECTANGLE_AREA)) {
    view(ViewEnum::CALCULATE_RECTANGLE_AREA);
    return;
}

if (isGetOnPath(EndPointEnum::CALCULATE_RECTANGLE_AREA_CALC)) {
    Controllers::calculateRectangleAreaController();
    return;
}


echo "404 Not Found";
headerTemplate();
http_response_code(404);
