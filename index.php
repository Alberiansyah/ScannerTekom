<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Scanner Pascal</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>

        <!-- navbar -->
        <nav class="navbar bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Scanner Pascal</span>
        </div>
        </nav>
        <!-- penutup navbar -->

        <div class="container pt-5 ">
            <form action="" method="post">
                <div class="form-floating">
                    <textarea name="input" id="input" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 400px"></textarea>
                    <button type="submit" value="Submit">Submit</button>
                    <button type="reset" value="Reset">Reset</button>
                <label for="floatingTextarea2">Masukkan Source Code</label>
                </div>
            </form>

        </div>



        <!-- bagian scanner -->
        <?php
            function scanPascalCode($code) {
                $tokens = array();
                $keywords = array(
                    'program', 'var', 'integer', 'real', 'begin', 'end', 'if', 'then',
                    'else', 'while', 'do', 'for', 'to', 'downto', 'repeat', 'until',
                    'function', 'procedure', 'array', 'of', 'not', 'and', 'or', 'div', 'mod','writeln'
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


            function getTokenName($token) {
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


                    // bagian input

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $input = isset($_POST["input"]) ? $_POST["input"] : '';
                        
                // echo htmlspecialchars($input) . "<br>";
            }
            //penutup input

            if (isset($input)) {
                $tokens = scanPascalCode($input);

                $tokenContainer = array();
                // pemberian tipe token
                foreach ($tokens as $token) {
                    $tokenData = array('type' => $token['type'], 'value' => $token['value']);
                    $tokenData['name'] = getTokenName($token);
                    $tokenContainer[] = $tokenData;
                }


                echo '<h1>Hasil Scanner</h1>';
                echo '<div class="container">';
                echo '<table>';
                echo '<tr><th>Token Type</th><th>Token Value</th><th>Token Name</th></tr>';
                foreach ($tokenContainer as $token) {
                    $type = $token['type'];
                    $value = htmlspecialchars($token['value']);
                    $name = htmlspecialchars($token['name']);
                    echo '<tr>';
                    echo '<td class="type">' . $type . '</td>';
                    echo '<td class="value">' . $value . '</td>';
                    if (!empty($token['name'])) {
                        echo '<td class="value">' . $name . '</td>';
                    }
                    echo '</tr>';
                }
                echo '</table>';
                echo '</div>';
            
            }

        ?>


    <!-- penutup scanner -->
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    </body>
</html>







