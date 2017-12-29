<?php
session_start();

require_once("connect_mysqli.php");
include ("auth.php");

?>

<html>
    <head>
        <title>Boutique</title>
        <link rel="stylesheet" type="text/css" href="front.css">
        <meta charset="utf-8">
    </head>
    <body>
<?php
if (!$logged)
    include('header1.php');
else
    include('header2.php');
?>
        <br><br><br>
        <div id="shop">
            <form action="body_sort.php" method="post">
            <div id="gender">
                       <input type="submit" name="submit" value="Trier les articles">
            </div>
            </form>
            <?php
                for ($i = 0; $i < sizeof($tab); $i++)
                {
            ?>
                    <div style="display:inline-block">
                    <?php echo $tab3[$i]['name']; ?><br>
                    <form action="put_to_basket.php" method="post">
                    <input type='text' name='produit' value="<?= $tab3[$i]['name'] ?>" hidden />
                    <input type="submit" value="Ajouter" />
                    </form>
                    <?php echo $tab2[$i]['price'];?>$<br>
                    <img class="img_panier" src="./images/<?php echo $tab[$i]['img']; ?>" alt="img">
                    </div>
                    <?php
            }
            ?>
        </div>
    </body>
</html>