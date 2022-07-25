<?php

$url='';
if(isset($_GET['url']))
{
  $url=explode('/', $_GET['url']);
}
if($url== '')
{
  require 'mains/home.php';
}
else if ($url[0]== 'about')
{
	require 'mains/about.php';
}
elseif ($url[0]=='orders')
{
	require 'mains/orders.php';
}
else if ($url[0]== 'contact')
{
	require 'mains/contact.php';
}
elseif ($url[0]=='classes') {
	require'mains/classes.php';
}
else if ($url[0]== 'project')
{
	require 'mains/project.php'; 
}
else if($url[0]=='sign_training')
{
	require 'mains/sign_training.php';
}
else if($url[0]=='galeries')
{
	require 'mains/galeries.php';
}
else if ($url[0]== 'accueil')
{
	require 'mains/home.php'; 
}
else if ($url[0]== 'take_partTraining')
{
	require 'take_partTraining.php';
}
else if ($url[0]== 'inscription')
{
	require 'mains/inscription.php';
}
else if ($url[0]== 'consultance_diverse')
{
	require 'mains/consultance_diverse.php';
}
else if($url[0]=='send'){
	require 'mains/send.php';
}
else if($url[0]=='emploi'){
	require 'mains/emploi.php';
}
else if($url[0]=='formation'){
	require 'mains/formation.php';
}
else if($url[0]=='formateur'){
	require 'mains/formateur.php';
}
else if($url[0]=='detail_trainings'){
	require 'detail_trainings.php';
}
else
{
  require 'mains/404.php';
}
