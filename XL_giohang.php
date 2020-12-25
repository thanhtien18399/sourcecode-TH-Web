<?php
if (!isset($_SESSION)) session_start();
$tam= isset($_SESSION['cart'])?$_SESSION['cart']:[];
$action= isset($_GET['action'])?$_GET['action']:'';
if ($action=='them')
{
	$maSP= isset($_GET['maSP'])?$_GET['maSP']:'';
	$soluong = 1;
	if ($maSP!='')
	{
		if (isset($tam[$maSP]))
			$tam[$maSP] += $soluong;
		else 
			$tam[$maSP]= $soluong;
	}
}

if ($action=='xoa')
{
	$maSP= isset($_GET['maSP'])?$_GET['maSP']:'';
	unset($tam[$maSP]);
	
}
if ($action=='huy')
{
	$tam=[];
}
if($action=='capnhat'){
	$tam[$key] = $value;                   
}
$_SESSION['cart']= $tam;
header('location:indexgiohang.php');