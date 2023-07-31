<!DOCTYPE html>
<html>

<head>
    <title>Pascal Scanner</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .type {
            color: #007bff;
        }

        .value {
            color: #28a745;
        }
    </style>
</head>

<body>
    <h1>Pascal Scanner Output</h1>

    <?php

    class PascalScanner
    {
        private $sourceCode;
        private $tokens;
        private $currentPosition;

        private $keywords = array(
            'program', 'var', 'begin', 'end', 'if', 'then', 'else', 'while', 'do', 'for', 'to', 'downto', 'repeat', 'until', 'function', 'procedure',
            'integer', 'real', 'boolean', 'char', 'string', 'array', 'of'
        );

        private $operators = array('+', '-', '*', '/', '=', '<', '>', '<=', '>=', '<>', ':=', ':', ';', '.', ',', '(', ')', '[', ']', '{', '}');

        public function __construct($sourceCode)
        {
            $this->sourceCode = $sourceCode;
            $this->tokens = array();
            $this->currentPosition = 0;
            $this->scanTokens();
        }

        public function getTokens()
        {
            return $this->tokens;
        }

        private function isWhiteSpace($char)
        {
            return in_array($char, array(" ", "\r", "\n", "\t"));
        }

        private function isDigit($char)
        {
            return is_numeric($char);
        }

        private function isAlpha($char)
        {
            return preg_match('/[a-zA-Z]/', $char);
        }

        private function isAlphaNumeric($char)
        {
            return $this->isAlpha($char) || $this->isDigit($char);
        }

        private function advance()
        {
            $this->currentPosition++;
        }

        private function addToken($type, $value = null)
        {
            $this->tokens[] = array(
                'type' => $type,
                'value' => $value
            );
        }

        private function match($expected)
        {
            if ($this->currentPosition >= strlen($this->sourceCode)) return false;

            if ($this->sourceCode[$this->currentPosition] != $expected) return false;

            $this->currentPosition++;
            return true;
        }

        private function peek()
        {
            if ($this->currentPosition >= strlen($this->sourceCode)) return '\0';
            return $this->sourceCode[$this->currentPosition];
        }

        private function peekNext()
        {
            if ($this->currentPosition + 1 >= strlen($this->sourceCode)) return '\0';
            return $this->sourceCode[$this->currentPosition + 1];
        }

        private function scanString()
        {
            $start = $this->currentPosition;
            while ($this->peek() != '"' && $this->peek() != '\0') {
                $this->advance();
            }

            if ($this->peek() == '\0') {
                // Error: Unterminated string
                return;
            }

            $this->advance(); // Consume the closing "
            $value = substr($this->sourceCode, $start + 1, $this->currentPosition - $start - 2);
            $this->addToken('STRING', $value);
        }

        private function scanNumber()
        {
            $start = $this->currentPosition;
            while ($this->isDigit($this->peek())) {
                $this->advance();
            }

            // Look for a fractional part
            if ($this->peek() == '.' && $this->isDigit($this->peekNext())) {
                $this->advance(); // Consume the '.'

                while ($this->isDigit($this->peek())) {
                    $this->advance();
                }
            }

            $value = substr($this->sourceCode, $start, $this->currentPosition - $start);
            $this->addToken('NUMBER', floatval($value));
        }

        private function scanIdentifier()
        {
            $start = $this->currentPosition;
            while ($this->isAlphaNumeric($this->peek())) {
                $this->advance();
            }

            $value = substr($this->sourceCode, $start, $this->currentPosition - $start);
            if (in_array(strtolower($value), $this->keywords)) {
                $this->addToken('KEYWORD', $value);
            } else {
                $this->addToken('IDENTIFIER', $value);
            }
        }

        public function scanTokens()
        {
            while ($this->currentPosition < strlen($this->sourceCode)) {
                $start = $this->currentPosition;
                $char = $this->sourceCode[$this->currentPosition];

                if ($this->isWhiteSpace($char)) {
                    $this->advance();
                } elseif ($this->isDigit($char)) {
                    $this->scanNumber();
                } elseif ($this->isAlpha($char)) {
                    $this->scanIdentifier();
                } elseif ($char == '"') {
                    $this->scanString();
                } elseif (in_array($char, $this->operators)) {
                    $this->advance();
                    $this->addToken($char);
                } else {
                    // Error: Unrecognized character
                    $this->advance();
                }
            }

            $this->addToken('EOF');
        }
    }

    // Contoh penggunaan:
    $sourceCode = '
    program HelloWorld;
    var
        name: string;
    begin
        name := "World";
        writeln("Hello, " + name);
    end.
    ';

    $scanner = new PascalScanner($sourceCode);
    $tokens = $scanner->getTokens();

    echo '<table>';
    echo '<tr><th>Token Type</th><th>Token Value</th></tr>';
    foreach ($tokens as $token) {
        $type = $token['type'];
        $value = htmlspecialchars($token['value']);
        echo '<tr>';
        echo '<td class="type">' . $type . '</td>';
        echo '<td class="value">' . $value . '</td>';
        echo '</tr>';
    }
    echo '</table>';
    ?>
</body>

</html>