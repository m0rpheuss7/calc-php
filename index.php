<html>
    <head>
        <meta charset="utf-8">
        <title>Calculadora Simples</title>
        <style>
// CSS //



        </style>
    </head>
    <body>
        <h1>Calculadora Simples</h1>
        <form method="GET" action="">
            <label for="num1">Primeiro número:</label>
            <input type="text" name="n1">
            
            <label for="num2">Segundo número:</label>
            <input type="text" name="n2">
            
            <fieldset>                
                <legend>Operações</legend>
                <input type="radio" name="op" value="soma" checked>Soma<br>
                <input type="radio" name="op" value="subtracao">Subtração<br>
                <input type="radio" name="op" value="multiplicacao">Multiplicação<br>
                <input type="radio" name="op" value="divisao">Divisão<br>
                <input type="radio" name="op" value="aleatoria">Aleatória<br>
            </fieldset>
            
            <input type="submit" value="Calcular">
        </form>

        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (isset($_GET['n1']) && isset($_GET['n2'])) {
                    $n1 = floatval($_GET['n1']);
                    $n2 = floatval($_GET['n2']);

                    function soma($a, $b) {
                        return $a + $b;
                    }

                    function subtracao($a, $b) {
                        return $a - $b;
                    }

                    function multiplicacao($a, $b) {
                        return $a * $b;
                    }

                    function divisao($a, $b) {
                        if ($b == 0) {
                            return "Erro: Divisão por zero.";
                        }
                        return $a / $b;
                    }

                    function aleatoria() {
                        $ops = ['soma', 'subtracao', 'multiplicacao', 'divisao'];
                        $rand_op = $ops[array_rand($ops)];
                        $rand_n1 = rand(1, 100);
                        $rand_n2 = rand(1, 100);

                        switch ($rand_op) {
                            case 'soma':
                                return "$rand_n1 + $rand_n2 = " . soma($rand_n1, $rand_n2);
                            case 'subtracao':
                                return "$rand_n1 - $rand_n2 = " . subtracao($rand_n1, $rand_n2);
                            case 'multiplicacao':
                                return "$rand_n1 * $rand_n2 = " . multiplicacao($rand_n1, $rand_n2);
                            case 'divisao':
                                return "$rand_n1 / $rand_n2 = " . divisao($rand_n1, $rand_n2);
                        }
                    }

                    $op = $_GET['op'];
                    switch ($op) {
                        case 'soma':
                            echo "<h1 class='result'>$n1 + $n2 = " . soma($n1, $n2) . "</h1>";
                            break;
                        case 'subtracao':
                            echo "<h1 class='result'>$n1 - $n2 = " . subtracao($n1, $n2) . "</h1>";
                            break;
                        case 'multiplicacao':
                            echo "<h1 class='result'>$n1 * $n2 = " . multiplicacao($n1, $n2) . "</h1>";
                            break;
                        case 'divisao':
                            echo "<h1 class='result'>$n1 / $n2 = " . divisao($n1, $n2) . "</h1>";
                            break;
                        case 'aleatoria':
                            echo "<h1 class='result'>Resultado Aleatório: " . aleatoria() . "</h1>";
                            break;
                    }
                } else {
                    echo "<h1 class='result'>Por favor, preencha todos os campos.</h1>";
                }
            }
        ?>
    </body>
</html>
