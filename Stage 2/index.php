<?php  // "Front Controller"


require_once("model.php");
require_once("view.php");


$content = "";

foreach ($products as $prod)
{
    if ( $prod instanceof Amiibo)
    {
        $content = $content . renderAmiibo($prod);
    }
    else if ($prod instanceof Tshirt )
    {
        $content = $content . renderTshirt($prod);
    }   
}


?>
<!DOCTYPE>
<html lang="fr">

    <head>
        <title>R3.DWeb-DI.13 - POO</title>
        <link href="https://fonts.googleapis.com/css?family=
        Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">
        <link href="./style.css" , rel="stylesheet">
    </head>

    <body>
        <section>

            <div class="nine">
                <h1>Zelda - Breath Of The Wild<span>Goodies</span></h1>
            </div>
        
            <div class="flex-container">
                <?php echo $content; ?>
            </div>

        </section>
    </body>

</html>