<?php

function scanPascalCode($code)
{
    $tokens = array();
    $keywords = array(
        'program', 'uses', 'crt', 'var', 'integer', 'real', 'begin', 'end', 'if', 'then',
        'else', 'while', 'do', 'for', 'to', 'downto', 'repeat', 'until',
        'function', 'procedure', 'array', 'of', 'not', 'and', 'or', 'div', 'mod', 'writeln'
    );

    $operators = array(
        '+', '-', '*', '/', '=', '<', '>', '<=', '>=', ':=', '<>'
    );

    $delimiters = array('(', ')', '[', ']', ',', ':', ';', '.');

    $code = preg_replace('/\s+/', ' ', $code); // ganti hanya spasi satu atau lebih tab, newline dengan spasi

    $code = trim($code); // Hapus spasi depan/belakang

    $length = strlen($code);
    $position = 0;

    while ($position < $length) {
        $char = $code[$position];

        if ($char === '{') {
            $position++;
            while ($position < $length && $code[$position] !== '}') {
                $position++;
            }
            $position++; // lewati kurung tutup
            continue;
        }

        if (preg_match('/[a-zA-Z]/', $char)) {
            $identifier = '';

            while ($position < $length && preg_match('/[a-zA-Z0-9_]/', $code[$position])) {
                $identifier .= $code[$position];
                $position++;
            }

            if (in_array(strtolower($identifier), $keywords)) {
                $tokens[] = array('type' => 'keyword', 'value' => $identifier);
            } elseif (strtolower($identifier) === 'var') {
                $tokens[] = array('type' => 'var', 'value' => $identifier);
            } else {
                $tokens[] = array('type' => 'identifier', 'value' => $identifier);
            }

            continue;
        }

        if (preg_match('/[0-9]/', $char)) {
            $number = '';

            while ($position < $length && preg_match('/[0-9\.]/', $code[$position])) {
                $number .= $code[$position];
                $position++;
            }

            if (strpos($number, '.') !== false) {
                $tokens[] = array('type' => 'real', 'value' => floatval($number));
            } else {
                $tokens[] = array('type' => 'integer', 'value' => intval($number));
            }

            continue;
        }

        if (in_array($char, $operators)) {
            if ($char === ':' && $code[$position + 1] === '=') {
                $tokens[] = array('type' => 'operator', 'value' => ':=');
                $position += 2;
            } elseif (($char === '<' && $code[$position + 1] === '=') || ($char === '>' && $code[$position + 1] === '=')) {
                $tokens[] = array('type' => 'operator', 'value' => $char . '=');
                $position += 2;
            } else {
                $tokens[] = array('type' => 'operator', 'value' => $char);
                $position++;
            }
            continue;
        }

        if (in_array($char, $delimiters)) {
            $tokens[] = array('type' => 'delimiter', 'value' => $char);
            $position++;
            continue;
        }

        $position++;
    }

    return $tokens;
}


function getTokenName($token)
{
    $tokenMap = array(
        ':=' => 'T_ASSIGN',
        '>' => 'T_GREAT',
        '<' => 'T_LESS',
        '>=' => 'T_GEQUALS',
        '=' => 'T_EQUALS',
        '<=' => 'T_LEQUALS',
        '+' => 'T_ADD',
        '-' => 'T_SUB',
        '*' => 'T_MUL',
        '/' => 'T_DIV',
        '<>' => 'T_NOTEQ',
        ';' => 'T_SCOLON',
        ':' => 'T_COLON',
        '.' => 'T_DOT',
        '(' => 'T_LPAREN',
        ')' => 'T_RPAREN',
        '[' => 'T_LBRACKET',
        ']' => 'T_RBRACKET',
        ',' => 'T_COMMA',
        'program' => 'T_PROGRAM',
        'uses' => 'T_USES',
        'crt' => 'T_CRT',
        'var' => 'T_VAR',
        'integer' => 'T_INTEGER',
        'real' => 'T_REAL',
        'begin' => 'T_BEGIN',
        'end' => 'T_END',
        'if' => 'T_IF',
        'then' => 'T_THEN',
        'else' => 'T_ELSE',
        'while' => 'T_WHILE',
        'do' => 'T_DO',
        'for' => 'T_FOR',
        'to' => 'T_TO',
        'downto' => 'T_DOWNTO',
        'repeat' => 'T_REPEAT',
        'until' => 'T_UNTIL',
        'function' => 'T_FUNCTION',
        'procedure' => 'T_PROCEDURE',
        'array' => 'T_ARRAY',
        'of' => 'T_OF',
        'not' => 'T_NOT',
        'and' => 'T_AND',
        'or' => 'T_OR',
        'div' => 'T_DIV',
        'mod' => 'T_MOD',
        'writeln' => 'T_WRITELN'
    );

    $tokenValue = $token['value'];

    if ($token['type'] === 'identifier') {
        if ($token['value'] === 'var') {
            return 'T_VAR';
        } else {
            return 'T_LITERAL';
        }
    } elseif ($token['type'] === 'integer' || $token['type'] === 'real') {
        return 'T_VALUE';
    } elseif ($token['type'] === 'keyword' || $token['type'] === 'operator' || $token['type'] === 'delimiter') {
        if (isset($tokenMap[$tokenValue])) {
            return $tokenMap[$tokenValue];
        }
    }

    return '';
}


$pascalCode = $_GET['code'];
// Contoh penggunaan

// $pascalCode = '
//     program HelloWorld;
//     var
//         x, y: integer;
//     begin
//         x := 10;
//         y := x - 5;
//         if y > 10 then
//             writeln("Greater than 10")
//         else
//             writeln("Less than or equal to 10");
//     end.
// ';

// $pascalCode = "
//     program PenghitungPersegi;

//     var
//       sisi, luas: integer;

//     begin
//       writeln('Program Penghitung Luas Persegi');
//       write('Masukkan panjang sisi persegi: ');
//       readln(sisi);

//       luas := sisi * sisi;

//       writeln('Luas persegi dengan sisi ', sisi, ' adalah ', luas);
//       readln;
//     end.

//     ";

$isAjaxRequest = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
if ($isAjaxRequest) :

    $tokens = scanPascalCode($pascalCode);

    $tokenContainer = array();

    $tokenCounter = array(); // Initialize token counters

    // pemberian tipe token
    foreach ($tokens as $token) {
        $tokenData = array('type' => $token['type'], 'value' => $token['value']);
        $tokenData['name'] = getTokenName($token);
        $tokenContainer[] = $tokenData;

        // Increment the token counter
        $tokenType = $tokenData['name'];
        if (!empty($tokenType)) {
            if (!isset($tokenCounter[$tokenType])) {
                $tokenCounter[$tokenType] = 1;
            } else {
                $tokenCounter[$tokenType]++;
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pascalCode = $_POST['pascalCode'];
        $tokens = scanPascalCode($pascalCode);

        $tokenContainer = array();
        // pemberian tipe token
        foreach ($tokens as $token) {
            $tokenData = array('type' => $token['type'], 'value' => $token['value']);
            $tokenData['name'] = getTokenName($token);
            $tokenContainer[] = $tokenData;
        }
    }

endif;

?>

<div class="col-12">

    <div class="d-flex justify-content-center">
        <h4>Token Counter</h4>
    </div>
    <?php foreach ($tokenCounter as $tokenType => $count) : ?>
        <span class="badge text-bg-primary hasilToken" style="cursor: pointer;"><?= "$tokenType: $count\n"; ?></span>
    <?php endforeach; ?>
    <table class="table table-hover table-responsive mt-3">
        <tr>
            <th>Token Tipe</th>
            <th>Token Value</th>
            <th>Token Name</th>
        </tr>
        <?php
        foreach ($tokenContainer as $token) :
            $type = $token['type'];
            $value = htmlspecialchars($token['value']);
            $name = htmlspecialchars($token['name']);
        ?>
            <tr>
                <td class="type text-primary highlightable"><?= strtoupper($type) ?></td>
                <td class="value text-success highlightable"><?= $value ?></td>
                <?php if (!empty($name)) : ?>
                    <td class="name text-danger highlightable"><?= $name ?></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</div>