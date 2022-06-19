<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

    <body>
        <?php
        
            $sorteio = [];

            $d = 6;
            $rand_max = 60;
            for($i = 0; $i < $d; $i++) {
                $random = rand(1, $rand_max);
                
                if(!(in_array($random, $sorteio))) {
                    $sorteio[] = $random;
                }else if($rand_max >= 6){
                    $d++;
                }
            }

            echo '<h3>Sorteio mega-sena</h3>';

            foreach($sorteio as $indice => $numero) {
                echo "Número ".$indice+1 .": $numero";
                echo '<hr/>';
            }

        
        ?>
    </body>

</html>