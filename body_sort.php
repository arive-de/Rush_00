<?php
session_start();

require_once("connect_mysqli.php");
include ("auth.php");
if(!$tab = get_img())
{
    echo "An error occured\n";
}
if(!$tab2 = get_price())
{
    echo "An error occured\n";
}
if(!$tab3 = get_name())
{
    echo "An error occured\n";
}
if(!$tab4 = get_category())
{
    echo "An error occured\n";
}
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
            <form action="body_sort.php" method="get">
            <div id="gender">
                Homme: <input type="checkbox" name="homme" value="OK">
                Femme: <input type="checkbox" name="femme" value="OK">
            </div>
            <div id="category">
            T-shirts: <input type="checkbox" name="T-shirts" value="OK">
            Soutiens gorges: <input type="checkbox" name="SG" value="OK">
            Casquettes: <input type="checkbox" name="Casquettes" value="OK">
            Chaussettes: <input type="checkbox" name="Chaussettes" value="OK"><br>
                       <input type="submit" name="submit" value="Afficher les articles">
            </div>
            </form>
            <?php
                for ($i = 0; $i < sizeof($tab); $i++)
                {
                    if ((($_GET['homme'] == "OK" && strstr($tab4[$i]['category'], "homme")
                        || $_GET['femme'] == "OK" && strstr($tab4[$i]['category'], "femme"))
                        && $_GET['T-shirts'] != "OK"
                        && $_GET['Casquettes'] != "OK"
                        && $_GET['Chaussettes'] != "OK"
                        && $_GET['SG'] != "OK")
                        ||
                        (($_GET['homme'] != "OK" && $_GET['femme'] != "OK") &&
                        (($_GET['T-shirts'] == "OK" && strstr($tab4[$i]['category'], "T-shirts")) ||
                        ($_GET['Chaussettes'] == "OK" && strstr($tab4[$i]['category'], "Chaussettes")) ||
                        ($_GET['SG'] == "OK" && strstr($tab4[$i]['category'], "SG")) ||
                        ($_GET['Casquettes'] == "OK" && strstr($tab4[$i]['category'], "Casquettes"))))
                        ||
                        ((($_GET['homme'] == "OK" && strstr($tab4[$i]['category'], "homme")) ||
                        ($_GET['femme'] == "OK" && strstr($tab4[$i]['category'], "femme"))) &&
                        (($_GET['T-shirts'] == "OK" && strstr($tab4[$i]['category'], "T-shirts")) ||
                        ($_GET['Chaussettes'] == "OK" && strstr($tab4[$i]['category'], "Chaussettes")) ||
                        ($_GET['SG'] == "OK" && strstr($tab4[$i]['category'], "SG")) ||
                        ($_GET['Casquettes'] == "OK" && strstr($tab4[$i]['category'], "Casquettes")))))
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
            }
            ?>
        </div>
    </body>
</html>