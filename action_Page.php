<html>
   <style type="text/css" media="screen">
  * {
    margin: 0px 0px 0px 0px;
    padding: 0px 0px 0px 0px;
  }
 body, html {
    padding: 3px 3px 3px 3px;

    background-color: #D8DBE2;

    font-family: Verdana, sans-serif;
    font-size: 11pt;
    text-align: left;
  }

 </style>


<body>

Results: <br>
Replace <?php echo $_POST["word"]; ?>
 with <?php echo $_POST["newWord"]; ?>
<br><br>
<?php 

$file ="./text.txt";
$document = file_get_contents($file);


$open = '0';
$check = explode("-",$document,2);


$toets = preg_split("/\s+/ ",$check[1]);
$toets = $check[1];



if($toets != '1')
{  
 

 $Acces = true;
 file_put_contents($file, "-1");
}
else
{
$Acces = false;
echo "false";
echo "0";
echo $check[1];
echo $open;

}


if($Acces ==true)
{
$lines = preg_split("/\s+/ ",$check[0]);
$x = $_POST["word"];
$y = $_POST["newWord"];
}


if($x != "" && $y != "" && $Acces == true && $x != "-close" && $y != "-open")
{

file_put_contents($file, "");
foreach($lines as $newLine)
{
	
	if($newLine ==  $x)
	{ 
	  
	    echo $y. '<br>';
	    file_put_contents($file,$y, FILE_APPEND);
	    $stat = 1;
	    
	  
	
	}
	elseif($newLine == "-open" || $newLine =="-close")
	{break;}
	else{
	  
	  echo $newLine. '<br>';	  
	   file_put_contents($file,$newLine, FILE_APPEND);
	  
	}
file_put_contents($file," ", FILE_APPEND);
}}


echo "".'<br>';
if($stat == 1)
{
  echo "The words hase been succesfully swopped.";
  file_put_contents($file,"-0", FILE_APPEND);
}
elseif($Acces == false)
{
  echo "The file is bussy. Close tap and try again in a few moments.";
}
else
{
  echo "The word doesnt exists in the file. Swap Unsuccesful.";
  file_put_contents($file,"-0", FILE_APPEND);
}


?>
</body>
</html>
