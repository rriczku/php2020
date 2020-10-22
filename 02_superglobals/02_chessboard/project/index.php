<?php
session_start();

if(!isset($_COOKIE['color']))
{
    $kolorek='gray';
} else $kolorek=$_COOKIE['color'];
if(!isset($_SESSION['click']))
{
    $_SESSION['click']=0;
}
if(isset($_POST['color']))
{
    $kolorek=$_POST['color'];
    setcookie('color',$kolorek,time()+3600);
}
function bresenham($x1,$y1,$x2,$y2)
{
     $x=$x1;
     $y=$y1;

    // ustalenie kierunku rysowania
     if ($x1 < $x2)
     {
         $xi = 1;
         $dx = $x2 - $x1;
     }
     else
     {
         $xi = -1;
         $dx = $x1 - $x2;
     }
     // ustalenie kierunku rysowania
     if ($y1 < $y2)
     {
         $yi = 1;
         $dy = $y2 - $y1;
     }
     else
     {
         $yi = -1;
         $dy = $y1 - $y2;
     }
     // pierwszy piksel
     $_SESSION['tab'][$x][$y]=1;
     // oś wiodąca OX
     if ($dx > $dy)
     {
         $ai = ($dy - $dx) * 2;
         $bi = $dy * 2;
         $d = $bi - $dx;
         // pętla po kolejnych x
         while ($x != $x2)
         {
             // test współczynnika
             if ($d >= 0)
             {
                 $x += $xi;
                 $y += $yi;
                 $d += $ai;
             }
             else
             {
                 $d += $bi;
                 $x += $xi;
             }
             //glVertex2i(x, y);
             $_SESSION['tab'][$x][$y]=1;
         }
     }
     // oś wiodąca OY
     else
     {
         $ai = ( $dx - $dy ) * 2;
         $bi = $dx * 2;
         $d = $bi - $dy;
         // pętla po kolejnych y
         while ($y != $y2)
         {
             // test współczynnika
             if ($d >= 0)
             {
                 $x += $xi;
                 $y += $yi;
                 $d += $ai;
             }
             else
             {
                 $d += $bi;
                 $y += $yi;
             }
             $_SESSION['tab'][$x][$y]=1;
         }
     }
}
if(!isset($_SESSION['cols'])&&!isset($_SESSION['rows']))
{
    $_SESSION['maxX']=10;
    $_SESSION['maxY']=10;

    $_SESSION['cols']=10;
    $_SESSION['rows']=10;
    $arrayo=array();
    for($i=0;$i<10;$i++)
    {
        $arrayo[$i]=array();
       // $_SESSION['tab'][$i]=array(0,$_SESSION['rows']);
    }
    $_SESSION['tab']=$arrayo;

}
if(isset($_POST['sz'])&&isset($_POST['sx']))
{
    $_SESSION['cols']=$_POST['sx'];
    $_SESSION['rows']=$_POST['sz'];
//    if($_SESSION['cols']>$_SESSION['maxX'])
//    {
//        $_SESSION['maxX']=$_SESSION['cols'];
//        $roznica=$_SESSION['cols']-$_SESSION['maxX'];
//      //  array_push($arrayo,array(0,$_SESSION['rows']),$roznica);
//        array_push($_SESSION['tab'],array(0,$_SESSION['rows']),$roznica);
//    }
//
//    if($_SESSION['rows']>$_SESSION['maxY'])
//    {
//        $_SESSION['maxY']=$_SESSION['rows'];
//        $roznica=$_SESSION['rows']-$_SESSION['maxY'];
//        for($i=0;$i<$_SESSION['maxX'];$i++)
//        {
//            //array_push($arrayo[$i],0,$roznica);
//            array_push($_SESSION['tab'][$i],0,$roznica);
//        }
//    }
}
if(isset($_GET['x'])&&isset($_GET['z']))
{
    //$_SESSION['tab'][$_GET['x']][$_GET['z']]=1;

    $_SESSION['click']=$_SESSION['click']+1;
    if($_SESSION['click']==2)
    {
        //bresenham
        bresenham($_SESSION['p1x'],$_SESSION['p1y'],$_GET['x'],$_GET['z']);
        //zerowanie clickow
        $_SESSION['click']=0;
        //zerowanie zmiennych
        unset($_SESSION['p1x']);
        unset($_SESSION['p1y']);
    }
    else{
        $_SESSION['p1x']=$_GET['x'];
        $_SESSION['p1y']=$_GET['z'];
    }

}


?>
<html lang="en">
<head>
    <title>Superglobals</title>

    <style type="text/css">
        .block {
            display: inline-block;
            width: 30px;
            height: 30px;
            padding: 0;
            margin: 0;
        }

        .block:hover {
            background-color: lightgray;
        }

        .red {
            background-color: red;
        }

        .blue {
            background-color: blue;
        }

        .green {
            background-color: green;
        }

        .gray {
            background-color: gray;
        }

        .white {
            background-color: white;
        }
    </style>
</head>
<body>

<?php
    for($i=0;$i<$_SESSION['cols'];$i++)
    {
        echo "<div>";
        for($j=0;$j<$_SESSION['rows'];$j++)
        {
            if($_SESSION['tab'][$i][$j]==0)
            echo "<a class=\"block $kolorek\" href=\"?x=$i&z=$j\"></a>";
            else echo "<a class=\"block white\" href=\"?x=$i&z=$j\"></a>";
        }
        echo "</div>";
    }
?>

<form method="post">
    <label>
        Columns:
        <input type="text" name="sx">
    </label>
    <label>
        Rows:
        <input type="text" name="sz">
    </label>
    <input type="submit" value="Change">
</form>

<form method="post">
    <label>
        Color:
        <select name="color">
            <option value="gray">Gray</option>
            <option value="red">Red</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
        </select>
    </label>
    <input type="submit" value="Change">
</form>

</body>
</html>