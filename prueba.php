
<?php 



$x = 75;
$y = 25;

function suma(){
    $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];  
}

suma();

echo $z;


//require_once 'globals.php';
$GLOBALS['y'] = 50;
suma();
print_r($GLOBALS['z']);













# Variable string
$_soy_una_variable = "asignando valores";

echo "<p>".$_soy_una_variable."</p>";


#variable double
$_soy_una_variable = 1234.4536;

echo "<p>".$_soy_una_variable."</p>";


if ($a > $b && $b > $c) {
    echo "a es mayor que b y menor que c";
}

if ($a > $b || $b > $c) {
    echo "a es mayor que b o menor que c";
}

if ($i == 0) {
    echo "i es igual a 0";
} elseif ($i == 1) {
    echo "i es igual a 1";
} elseif ($i == 2) {
    echo "i es igual a 2";
}


switch ($i) {
    case 0:
        echo "i es igual a 0";
        break;
        case 1:
            echo "i es igual a 1";
            break;
            case 2:
                echo "i es igual a 2";
                break;
            }
            
            switch ($i) {
                case "manzana":
                    echo "i es una manzana";
                    break;
                    case "barra":
                        echo "i es una barra";
                        break;
                        case "pastel":
                            echo "i es un pastel";
                            break;
                        }
                        
                        for ($i = 1; $i <= 10; $i++) {
                            echo $i;
                        }
                        
                        $personas = array(
                            array('nombre' => 'Kalle', 'salario' => 856412),
                            array('nombre' => 'Pierre', 'salario' => 215863)
                        );
                        
                        for($i = 0; $i < count($personas); ++$i) {
                            $personas[$i]['salario'] =  rand(000000, 999999);
                        }
                        
                        $i = 1;
                        while ($i <= 10):
                            echo $i;
                            $i++;
                        endwhile;
                        
                        
                        
                        $color = 'verde';
                        $fruta = 'manzana';
                        
                        
                        
                        echo "Una $fruta $color"; // Una
                        
                        include 'vars.php';
                        
                        echo "Una $fruta $color"; // Una manzana verde
                        
                        
                        
                        $arreglo = array("foo", "bar", "hello", "world");
                        
                        $array = array("foo", "bar", "hello", "world");
                        var_dump($array);
                        
                        
                        $a = array ('a' => 'manzana', 'b' => 'banana', 'c' => array ('x', 'y', 'z'));
                        print_r ($a);
                        
                        $arreglo = array(
                            "foo" => "bar",
                            "bar" => "foo",
                        );
                        
                        
                        $arreglo = array(
                            "foo" => "bar",
                            "bar" => "foo",
                            100   => -100,
                            -100  => 100,
                        );
                        
                        
                        
                        $hacer_algo = true;
                        
                        /* No podemos llamar a foo() desde aquí
                        ya que no existe aún,
                        pero podemos llamar a bar() */
                        
                        bar();
                        
                        if ($hacer_algo) {
                            function foo()
                            {
                                echo "No existo hasta que la ejecución del programa llegue hasta mí.\n";
                            }
                        }
                        
                        /* Ahora podemos llamar de forma segura a foo()
                        ya que $hacer_algo se evaluó como verdadero */
                        
                        if ($hacer_algo) foo();
                        
                        function bar()
                        {
                            echo "Existo desde el momento inmediato que comenzó el programa.\n";
                        }
                        
                        
                        
                        
                        function añadir_algo(&$cadena)
                        {
                            $cadena .= 'y algo más.';
                        }
                        $cad = 'Esto es una cadena, ';
                        añadir_algo($cad);
                        echo $cad;    // imprime 'Esto es una cadena, y algo más.'
                        
                        
                        
                        
                        
                        
                        ?>
                        
                        
                        
                        <?php include("menu.php"); ?>
                        
                        <!--Menú-->
                        <ul>
                        <li>Inicio</li>
                        <li>Quiénes somos</li>
                        <li>Contacto</li>
                        </ul>
                        
                        