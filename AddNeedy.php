<?php

	$DB_HOST = 'localhost';
    $DB_USER = 'root';
    $DB_PASSWORD = '';
    $DB_DATABASE = 'khairksa';
	
	//Connect to mysql server
	$con = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
	if(!$con) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db($DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	
mysql_query("SET NAMES 'utf8'");

if($_POST['sex']=='أنثى')
{
	$_POST['social']=$_POST['socialF'];
}
//Create query 1
$qry1="insert into needy 
(needyNum, id, name, sex, nationality, birthday,city,housingType,phoneNo,noOfFamilyMembers,educationalLevel,socialSituation,requirments)
values('','".$_POST['ID1']."','".$_POST['name1']."','".$_POST['sex']."','".$_POST['nationality']."','".$_POST['date']."','".$_POST['txtHint']."','".$_POST['home']."','".$_POST['phone']."','".$_POST['family']."','".$_POST['educational']."','".$_POST['social']."','".$_POST['status']."');";
$result1=mysql_query($qry1);

//For Update
    $ID = mysql_real_escape_string($_POST['ID1']);

//get the checked value
	$selected=$_POST['checkbox'];
	$N = count($selected);
	
    for($i=0; $i < $N; $i++)
{
	if($selected[$i]=='checkbox_1')
	{
	   $salary = mysql_real_escape_string($_POST['txt1']);
       $sql_Salary = "UPDATE needy ".
       "SET salary = '$salary'".
       "WHERE id = $ID" ;
       $sql_Salary = mysql_query( $sql_Salary, $con );
 }
		if($selected[$i]=='checkbox_2')
		{
	   $AnnualHelp = mysql_real_escape_string($_POST['txt2']);
       $sql_AnnualHelp = "UPDATE needy ".
       "SET annualHelp = '$AnnualHelp'".
       "WHERE id = $ID" ;
       $sql_AnnualHelp = mysql_query( $sql_AnnualHelp, $con );
		}
			if($selected[$i]=='checkbox_3')
			{
	   $socialGuarantee = mysql_real_escape_string($_POST['txt3']);
       $sql_Guarantee = "UPDATE needy ".
       "SET socialGuarantee = '$socialGuarantee'".
       "WHERE id = $ID" ;
       $sql_Guarantee = mysql_query( $sql_Guarantee, $con );
			}
		
}

if(isset($_POST['rent2'])) {
	   $Rent = mysql_real_escape_string($_POST['rent2']);
       $sql_Rent = "UPDATE needy ".
       "SET rent = '$Rent'".
       "WHERE id = $ID" ;
       $sql_Rent = mysql_query( $sql_Rent, $con );	
}
if(isset($_POST['bank'])) {
	   $bank = mysql_real_escape_string($_POST['bank']);
       $sql_bank = "UPDATE needy ".
       "SET bank = '$bank'".
       "WHERE id = $ID" ;
       $sql_bank = mysql_query( $sql_bank, $con );	
}
if(isset($_POST['Iban'])) {
	   $Iban = mysql_real_escape_string($_POST['Iban']);
       $sql_Iban = "UPDATE needy ".
       "SET IBAN = '$Iban'".
       "WHERE id = $ID" ;
       $sql_Iban = mysql_query( $sql_Iban, $con );	
}
if(isset($_POST['name2'])) {
	   $beneficiary = mysql_real_escape_string($_POST['name2']);
       $sql_Beneficiary = "UPDATE needy ".
       "SET beneficiary = '$beneficiary'".
       "WHERE id = $ID" ;
       $sql_Beneficiary = mysql_query( $sql_Beneficiary, $con );	
}
if(isset($_POST['other'])) {
	   $other = mysql_real_escape_string($_POST['other']);
       $sql_housingType = "UPDATE needy ".
       "SET housingType = '$other'".
       "WHERE id = $ID" ;
       $sql_housingType = mysql_query( $sql_housingType, $con );	
}



//Get the needyNum
$needy="SELECT needyNum FROM needy WHERE id ='".$ID."'";
$needy = mysql_query($needy); 
$needyNum = mysql_fetch_array( $needy );

//Array of types
$types=$_POST['Case'];
$typesNo = count($types);

	 for($i=0; $i < $typesNo; $i++)
	 {
		
      $qry2="insert into needytype (needyNum,type)values('".$needyNum['needyNum']."','".$types[$i]."');";
      $result2=mysql_query($qry2);			
	 }
	 
	
	
	
//Array of Cases
$NeedTO=$_POST['NeedTO'];
$NeedToNo = count($NeedTO);

	 for($i=0; $i < $NeedToNo; $i++)
	 {
      $qry3="insert into casetype (needyNum,casetype)values('".$needyNum['needyNum']."','".$NeedTO[$i]."');";
      $result3=mysql_query($qry3);			
	 }
	if(isset($_POST['other2']))
	 {$qry3="insert into casetype (needyNum,casetype)values('".$needyNum['needyNum']."','".$_POST['other2']."');";
      $result3=mysql_query($qry3);	}
	 
	 
	  if(isset($_POST['submit'])){
	$imageNameid1=mysql_real_escape_string($_FILES["id1"]["name"]);
	$imageDataid1=mysql_real_escape_string(file_get_contents($_FILES["id1"]["tmp_name"]));
	$imageTypeid1=mysql_real_escape_string($_FILES["id1"]["type"]);
	
	$imageNamelease=mysql_real_escape_string($_FILES["lease"]["name"]);
	$imageDatalease=mysql_real_escape_string(file_get_contents($_FILES["lease"]["tmp_name"]));
	$imageTypelease=mysql_real_escape_string($_FILES["lease"]["type"]);
	
	$imageNamemedicalReport=mysql_real_escape_string($_FILES["medicalReport"]["name"]);
	$imageDatamedicalReport=mysql_real_escape_string(file_get_contents($_FILES["medicalReport"]["tmp_name"]));
	$imageTypemedicalReport=mysql_real_escape_string($_FILES["medicalReport"]["type"]);
	
	$imageNamedept=mysql_real_escape_string($_FILES["dept"]["name"]);
	$imageDatadept=mysql_real_escape_string(file_get_contents($_FILES["dept"]["tmp_name"]));
	$imageTypedept=mysql_real_escape_string($_FILES["dept"]["type"]);
	
	$imageNamelegality=mysql_real_escape_string($_FILES["legality"]["name"]);
	$imageDatalegality=mysql_real_escape_string(file_get_contents($_FILES["legality"]["tmp_name"]));
	$imageTypelegality=mysql_real_escape_string($_FILES["legality"]["type"]);
	
	$imageNameguarantee=mysql_real_escape_string($_FILES["guarantee"]["name"]);
	$imageDataguarantee=mysql_real_escape_string(file_get_contents($_FILES["guarantee"]["tmp_name"]));
	$imageTypeguarantee=mysql_real_escape_string($_FILES["guarantee"]["type"]);
	
	$imageNamemsg1=mysql_real_escape_string($_FILES["msg1"]["name"]);
	$imageDatamsg1=mysql_real_escape_string(file_get_contents($_FILES["msg1"]["tmp_name"]));
	$imageTypemsg1=mysql_real_escape_string($_FILES["msg1"]["type"]);
	
	$imageNamejoinCharitableOrganization=mysql_real_escape_string($_FILES["joinCharitableOrganization"]["name"]);
	$imageDatajoinCharitableOrganization=mysql_real_escape_string(file_get_contents($_FILES["joinCharitableOrganization"]["tmp_name"]));
	$imageTypejoinCharitableOrganization=mysql_real_escape_string($_FILES["joinCharitableOrganization"]["type"]);
	
	
	
	
	}

 $qry4="insert into evidences VALUES ('".$needyNum['needyNum']."', '".$imageNamemsg1."','".$imageNameguarantee."','".$imageNamejoinCharitableOrganization."','".$imageNameid1."','".$imageNamelease."', '".$imageNamemedicalReport."', '".$imageNamedept."', '".$imageNamelegality."');";

	$result4=mysql_query($qry4);
	
	
	if($result1&&$result2&&$result3&&$result4) {
		//header("location:www.google.com");
		echo "تم الاضافة بنجاح";
		}
		else echo "". mysql_error();

		?>
		
	
	