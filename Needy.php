<?php
	$DB_HOST = 'localhost';
    $DB_USER = 'root';
    $DB_PASSWORD = '';
    $DB_DATABASE = 'KhairKsa';
	
	
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
?>
<html lang="ar">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>بيانات المحتاج </title>
<Script type="text/javascript">
    function ShowHideDiv(checkbox,a) {

		if( a=='1')
		{
		document.getElementById("div1").style.display = checkbox.checked ? "block" : "none";
		}
     	if( a=='2')
		{
		document.getElementById("div2").style.display = checkbox.checked ? "block" : "none";
		} 
     	if( a=='3')
		{
		document.getElementById("div3").style.display = checkbox.checked ? "block" : "none";
		} 		

    }
	
	
function display(obj,id1) {
txt = obj.options[obj.selectedIndex].value;
document.getElementById(id1).style.display = 'none';
if ( txt.match(id1) ) {
document.getElementById(id1).style.display = 'block';
}
}

	
function RentValue(value) {
    if (value=="Rent") {
        document.getElementById("ValueOfRent").style.display = 'block';
    } else {
		document.getElementById("ValueOfRent").style.display = 'none';
    }
}

function socialSituation(value) {
	document.getElementById("socialSituation1").style.display = 'none';
	document.getElementById("socialSituation2").style.display = 'none';
    if (value=="ذكـر") {
        document.getElementById("socialSituation1").style.display = 'block';
    }
	else {
		document.getElementById("socialSituation2").style.display = 'block';
    }
}
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","city.php?q="+str,true);
        xmlhttp.send();
    }
}
</Script>
</head>
<body>

<h2 style="text-align:right;">مرحبا بك </h2>


<form action="AddNeedy.php" style="text-align:right;" method="post" enctype="multipart/form-data" accept="image/gif, image/jpeg">
<h3>:بيانات شخصية </h3>
  <input type="text" name="name1" id="name1"> :الاسم الثلاثي       <br><br>
  <input type="text" name="ID1" id="ID1"> :الهوية الوطنية/الإقامة <br><br>
  <span>:الجنس</span><br>
   ذكـر <input type="radio" name="sex" value="ذكـر"   id="sex1" onchange="socialSituation(this.value);"> <br>
   أنثى <input type="radio" name="sex" value="أنثى"   id="sex2" onchange="socialSituation(this.value);"> <br><br>
   
   <div id="socialSituation1" style="display:none">
     <span>:الحالة الإجتماعية</span><br>
   أعزب <input type="radio" name="social" value="أعزب"  id="singleM" checked> <br>
   متزوج<input type="radio" name="social" value="متزوج" id="MarriedM"> <br>
   مطلق <input type="radio" name="social" value="مطلق" id="divorceM"> <br>
   </div>
   
   <div id="socialSituation2" style="display:none">
        <span>:الحالة الإجتماعية</span><br>
   عزباء <input type="radio" name="socialF" value="عزباء"  id="singleF" checked> <br>
   متزوجة<input type="radio" name="socialF" value="متزوجة" id="MarriedF"> <br>
   مطلقة <input type="radio" name="socialF" value="مطلقة" id="divorceF"> <br>
   أرملة <input type="radio" name="socialF" value="أرملة" id="MarriedF"> <br>
   </div><br>
   
   <input type="date" name="date" id="date"><span> :تاريخ الميلاد </span><br><br>
   <input type="text" name="phone" id="phone"> <span>:رقم الجوال </span><br><br>
   
   <select name="educational" id="educational">
   <option value="أمية" >أمية</option>
   <option value="إبتدائية">إبتدائية</option>
   <option value="المتوسطة">المتوسطة</option>
   <option value="ثانوية">ثانوية</option>
   <option value="جامعة">جامعة</option>
   <option value="دبلوم">دبلوم</option>
   <option value="معهد">معهد</option>
</select> <span>:المستوى التعليمي</span> <br><br>
  
 <select name="nationality" id="nationality">
<?php
$qry='SELECT * FROM nationality';
$result = mysql_query($qry); 
if($result)
while($info = mysql_fetch_array( $result )) 
Print '<option value='.$info['id'].'>'.$info['nationality'].'</option>';       
?>
</select> <span>:الجنسية</span> <br><br>  
 <input type="number" name="family" min="0" max="100" step="1" value="0" id="family"> <span>:عدد أفراد  لأسرة </span><br><br>
 
 <h3>:بيانات السكن </h3>

 <select name= "region2" id="region2" onchange="showUser(this.value)" >
 <option>اختيار</option>
<?php
$qry='SELECT * FROM region';
$result = mysql_query($qry); 
if($result)
while($info = mysql_fetch_array( $result )) 
Print '<option value='.$info['id'].'>'.$info['region'].'</option>';       
?>
</select> <span>:المنطقة </span><br><br>
  <select id="txtHint" name="txtHint"> </select> <span>:المدينة </span> <br><br></div>
 
 <select id="home" name="home" onchange="display(this,'other');">
   <option value="فلـة">فلـة</option>
   <option value="شقـة">شقـة</option>
   <option value="غرفة">غرفة</option>
   <option value="غيرذلك">غيرذلك</option> 
</select> <span>:نوع السكن </span> 
 <span  name="other" id="other" style="display:none"> <input type="text"></span><br><br>

 ملك  <input type="radio" name="type" value="NotRent" id="type1" onchange="RentValue(this.value);"> <br>
إيجار <input type="radio" name="type" value="Rent"    id="type2" onchange="RentValue(this.value);"> 

 <div id="ValueOfRent" style="display: none" >
 <input type="text" name="rent2" id="rent2"> :قيمة الإيجار 
 </div><br>
 
<h3> :مصدر الدخل </h3>

وظيفة <input type="checkbox" name="checkbox[]" value="checkbox_1" id="checkbox_1" onclick="ShowHideDiv(this,1)"> 
<div  id="div1"style="display: none"> <input type="text" name="txt1" id="txt1" /><span> :قيمة الراتب الشهري</span></div>
<br>
مساعدة سنوية <input type="checkbox" name="checkbox[]" value="checkbox_2" id="checkbox_2" onclick="ShowHideDiv(this,2)"> 
<div  id="div2"style="display: none"><input type="text" name="txt2" id="txt2" /> <span> :قيمة المساعدة السنوية</span></div>
<br>
ضمـان اجتماعي <input type="checkbox" name="checkbox[]" value="checkbox_3" id="checkbox_3" onclick="ShowHideDiv(this,3)"> 
<div id="div3"style="display: none"><input type="text" name="txt3" id="txt3" /<span> :قيمة الضمان الاجتماعي</span>></div>
<br>
<h3>: بيانات مالية -اختياري </h3>
  <input type="text" name="bank" id="bank"> :إسم البنك <br><br>
  <input type="text" name="Iban" id="Iban"> :الآيبان <br><br>
  <input type="text" name="name2" id="name2"> :إسم المستفيد <br><br>
<h3> :نوع الحاجة </h3>
  <span>:أحتاج إلى  </span><br>
مـاء <input type="checkbox" name="NeedTO[]" id="water" value="ماء"> 
<br>
كهرباء <input type="checkbox" name="NeedTO[]" id="Electricity" value="كهرباء"> 
<br>
إيجار <input type="checkbox" name="NeedTO[]" id="rent" value="إيجار"> 
<br>
غذاء <input type="checkbox" name="NeedTO[]" id="food" value="غذاء"> 
<br>
إتصالات <input type="checkbox" name="NeedTO[]" id="communication" value="إتصالات"> 
<br>
ملبوسات <input type="checkbox" name="NeedTO[]" id="clothes" value="ملبوسات"> 
<br>
ترميم <input type="checkbox" name="NeedTO[]" id="Maintenance" value="ترميم"> 
<br><br>
<input type="text" name="other2" id="other2">:غيرذلك <br>
<br>

<span>:حالتك</span><br>
عـنف <input type="checkbox" name="Case[]" value="عـنف" id="case1" > <br>
هجـر <input type="checkbox" name="Case[]" value="هجـر" id="case2" > <br>
فقـر <input type="checkbox" name="Case[]" value="فقـر" id="case3" > <br>
يتم <input  type="checkbox" name="Case[]" value="يتم" id="case4" > <br><br>
<span>:أوصف حالتك</span><br>
<textarea name="status" id="status" rows="7" cols="40">

</textarea>


<h3> :إرفاق الاثباتات كصور </h3>
  <input type="file" id="id1" name="id1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span> :بطاقة الأحوال/الاقامة</span>
 <br><br>
  <input type="file" id="lease" name="lease" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>:عقد الإيجار </span>
 <br><br>
 <input type="file" id="medicalReport" name="medicalReport" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>:تقارير طبية </span>
 
 <br><br>
  <input type="file" id="dept" name="dept" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>:أوراق الدين </span>
 
 <br><br>
<input type="file" name="legality" id="legality" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>:إجراءات قانونية </span>
 
 <br><br>
 <input type="file" id="guarantee" name="guarantee" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>:بطاقة ضمان </span>
 
 <br><br>
 <input type="file" name="joinCharitableOrganization" id="joinCharitableOrganization" > <span>:بطاقة الانضمام لجمعية خيرية </span>
 
 <br><br>
 <input type="file" name="msg1" id="msg1" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>:خطاب </span>
 
 <br><br>

  <input type="submit"  name="submit"value="حفظ">
</form>

</body>
</html> 