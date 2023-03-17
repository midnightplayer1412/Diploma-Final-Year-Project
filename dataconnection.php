
<?php 
$connect=mysqli_connect( "localhost","root","");
mysqli_select_db($connect,"sweet_bakery_shop");//select database

if(!$connect)
{
	echo "Database connection faild...";
}
else
{

}
?>