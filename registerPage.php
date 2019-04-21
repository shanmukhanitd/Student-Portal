<?php
    session_start();
    if(isset($_SESSION['username'])){
        header("Location: student.php");
    }
    if(isset($_SESSION['adminusername'])){
        header("Location: admin.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="icon" type="image/ico" href="pics/logo.jpg" />
    <link rel="stylesheet" type="text/css" href="registrationStyles.css">   
    <link rel="stylesheet" type="text/css" href="tooltip.css">
    <link href="https://fonts.googleapis.com/css?family=Bad+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="home.css">
    <script type="text/javascript" src="jquery.min.js"></script>
</head>
<body>
    <div class="navbar">
        <a href="home.php">Home</a>
        <a href="adminLogin.php">AdminLogin</a>
        <div class="dropdown">
          <button class="dropbtn" style="background-color:rgb(22, 96, 25);">Student 
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="loginpage.php">Login</a>
            <a href="" style="background-color: rgb(22, 96, 25); cursor: not-allowed;">Register</a>
            
          </div>
        </div>
        <a href="about/Aboutus.php">About Us</a>
    </div>

    <div class="loginBox">
        <img src="pics/avatar1.png" class="avatar">
        <h1>Student Registration Form</h1>
        <form id="myform" onsubmit="return false">
            <p style="text-align:center; color: #f90404;">* fields are required</p>
            <p>Name* :</p>
            <input type="text" name="name" id="name" onkeyup="funcname(this)" onblur="funcname1(this)" class="name" >
            <span id="namespan" class="name" style="color: #f90404;"></span>
            <p>Username* :</p>
            <input type="text" name="username" id="username" onkeyup="funcuser(this)" onblur="funcuser1(this)" class="username">
            <span class="username" id="userspan" style="color: #f90404;"></span>
            <p>Password* :</p>
            <input type="password" name="password" id="password" onkeyup="funcpass()" onblur="funcpass1()" class="password">
            <span class="password" id="passspan" style="color: #f90404;"></span>
            <p>Confirm Password* :</p>
            <input type="password" name="password" id="password1" onblur="funcconfirm()" class="password1">
            <span class="password1" id="confirmspan" style="color: #f90404;"></span>
            <p>Gender* :</p>
            <input type="radio" name="gender" value="male" id="male" checked> Male<br>
            <input type="radio" name="gender" value="female" id="female"> Female<br>
            <input type="radio" name="gender" value="other" id="other"> Other
            <p>Father's Name* :</p>
            <input type="text" name="fatherName" id="fatherName" onkeyup="funcname(this)" onblur="funcname1(this)" class="fatherName">
            <span id="fatherspan" class="fatherName" style="color: #f90404;"></span>
            <p>Mother's Name* :</p>
            <input type="text" name="motherName" id="motherName" onkeyup="funcname(this)" onblur="funcname1(this)" class="motherName">
            <span id="motherspan" class="motherName" style="color: #f90404;"></span>
            <p>Mobile No.* :</p>
            <input type="number" name="mobile" id="mobile" pattern="^[6-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$" onblur="funcmobile()">
            <span id="mobilespan" style="color: #f90404;"></span>
            <p>Email* :</p>
            <input type="email" name="email" id="email" onblur="funcemail()" pattern="^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$">
            <span id="emailspan" style="color: #f90404;"></span>
            <p>ADDRESS* :</p>
            <input type="text" name="address1" id="address1">
            <p>City* :</p>
            <input type="text" name="address2" id="address2">
            <p>State* :</p>
            <input type="text" name="address3" id="address3">
            <p>Pincode* :</p>
            <input type="number" name="address4" id="address4">
            <p>Department* :</p>
            <select name="department" id="department" onblur="dept()">
                <option value=" "></option>
                <option value="Information Technology">IT</option>
                <option value="Computer Science & Engineering">CSE</option>
                <option value="Electronics & Communication Engineering">ECE</option>
                <option value="Electrical Engineering">EE</option>
                <option value="Civil Engineering">Civil</option>
                <option value="Mechanical Engineering">Mechanical</option>
                <option value="Bio Technology">BT</option>
                <option value="Chemical Engineering">Chemical</option>
                <option value="Metallurgical & Material Engineering">MME</option>
            </select>
            <br>
            <span id="departspan" style="color: #f90404;"></span>
            <p>Roll Number* :</p>
            <input type="text" name="roll" id="roll" onblur="funcroll()" title="Format: XX(Dept)80XX">
            <span id="rollspan" style="color: #f90404;"></span>
            <p>Registration Number* :</p>
            <input type="text" name="registration" id="registration" onblur="funcreg()" title="Format: XXU10XXX">
            <span id="regspan" style="color: #f90404;"></span>
            <p>Date of Birth* :</p>
            <input type="date" name="dob" id="dob" onblur="getAge()">
            <p>Age :</p>
            <input type="text" name="age"  id="age" readonly>
            <p>Year of Passing Out* :</p>
            <input type="number" name="year" min="2000" max="2030" id="year">

            <input type="checkbox" name="rules" unchecked onclick="funcrules()" id="rules">Hereby I am accepting the terms & conditions <br>
            <input type="button" name="reset" value="Reset" onclick="resetting()">
            <input type="submit" name="submit" value="Submit" onclick="validation()" id="submit" disabled>
        </form>
    </div>



    <script type="text/javascript">
        function funcname(event)
        {
            var nam=event.value;
            var patt1 = /[^A-Z\s]/gi;
            var result = nam.match(patt1);
            var cls=event.getAttribute('id');
            var x=document.getElementsByClassName(cls);
            if(result!=null)
            {
                x[1].innerHTML="**use only alphabets and spaces";
                nam=nam.substring(0,nam.length-1);
            }
            else
            {
                x[1].innerHTML="";
            }
            event.value=nam.toUpperCase();
        }

        function funcname1(event)
        {
            var name=event.value;
            name=name.trim();
            var l=name.length;
            var patt1 = /[^A-Z\s]/gi;
            var result = name.match(patt1);
            var cls=event.getAttribute('id');
            var x=document.getElementsByClassName(cls);
            if(l<4)
            {
                x[1].innerHTML="**name should be more than 4 letters";
            }
            else if(result!=null)
            {
                x[1].innerHTML="**use only alphabets and spaces";
            }
            else{
                x[1].innerHTML="";
            }
        }

        function funcuser(event)
        {
            var user=event.value;
            var patt1 = /[^A-Z0-9_@]/gi;
            var result = user.match(patt1);
            if(result!=null)
            {
                document.getElementById("userspan").innerHTML="**use only alphabets, digits, _, @ only";
            }
            else
            {
                document.getElementById("userspan").innerHTML="";
            }
        }

        function funcuser1(event)
        {
            var user=event.value;
            var patt1 = /[^A-Z0-9_@]/gi;
            var result = user.match(patt1);
            if(user.length<5)
            {
                document.getElementById("userspan").innerHTML="Username should contain atleast 5 characters";
            }
            else if(result!=null){
                document.getElementById("userspan").innerHTML="**use only alphabets, digits, _, @ only";
            }
            else{
                $.post('verify.php',{'user':user},function(data,status,xhr){
                    if(data=="yes")
                        document.getElementById("userspan").innerHTML="Username already exist, please use another one";
                    else
                        document.getElementById("userspan").innerHTML="";
                });
            }
        }

        function funcpass()
        {
            var password=document.getElementById("password").value;
            var pat1=/[A-Z]/g;
            var pat2=/[a-z]/g;
            var pat3=/[0-9]/g;
            var pat4=/[%!@#$&^*]/g;
            var result="";
            if(password.match(pat1)==null)
            {
                result+="Upper case is required. <br>";
            }
            if(password.match(pat2)==null)
            {
                result+="Lower case is required.<br>";
            }
            if(password.match(pat3)==null)
            {
                result+="digit is required.<br>";
            }
            if(password.match(pat4)==null)
            {
                result+="One special character !@#$%^&* is required.";
            }
            document.getElementById("passspan").innerHTML=result;
        }

        function funcpass1()
        {
            var password=document.getElementById("password").value;
            var pat=/[^A-Z0-9a-z!@#$%^&*]/g;
            var pat1=/[A-Z]/g;
            var pat2=/[a-z]/g;
            var pat3=/[0-9]/g;
            var pat4=/[%!@#$&^*]/g;
            var result="";
            if(password.match(pat1)==null)
            {
                result+="Upper case is required. <br>";
            }
            if(password.match(pat2)==null)
            {
                result+="Lower case is required.<br>";
            }
            if(password.match(pat3)==null)
            {
                result+="digit is required.<br>";
            }
            if(password.match(pat4)==null)
            {
                result+="One special character !@#$%^&* is required.<br>";
            }
            if(password.match(pat)!=null)
            {
                result+="Dont use special characters other than !@#$%^&*.<br>";
            }
            if(password.length<8 || password.length>15)
            {
                result+="Length of Password must be min 8 & max 15.";
            }
            document.getElementById("passspan").innerHTML=result;
        }

        function funcconfirm()
        {
            var password=document.getElementById("password").value;
            var confirm=document.getElementById("password1").value;
            if(password!=confirm)
            {
                document.getElementById("confirmspan").innerHTML="password is not matching.";
            }
            else
            {
                document.getElementById("confirmspan").innerHTML="";
            }
        }

        function funcmobile(){
            var pat=/^[6-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/;
            var n=document.getElementById("mobile").value;
            if(!pat.test(n)){
                document.getElementById("mobilespan").innerHTML="Mobile number is in correct";
            }
            else{
                document.getElementById("mobilespan").innerHTML="";
            }
        }

        function funcemail()
        {
            var str=document.getElementById("email").value;
            var pat=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            if(str.length==0)
            {
                document.getElementById("emailspan").innerHTML="Please enter the email.";
            }
            else if(!pat.test(str)){
                document.getElementById("emailspan").innerHTML="Email address is Invalid.";
            }
            else{
                document.getElementById("emailspan").innerHTML="";
            }
        }

        function dept()
        {
            var selected=document.getElementById("department").value;
            if(selected==" "){
                document.getElementById("departspan").innerHTML="please select your department";
            }
            else
            {
                document.getElementById("departspan").innerHTML="";
            }
        }

        function funcroll()
        {
            var rol=document.getElementById("roll").value;
            var a=[" ","IT","CS","EC","EE","CE","ME","BT","CH","MM"];
            var pat=/^[0-9][0-9](IT|CS|BT|EE|EC|CE|CH|ME|MM)80[0-9][0-9]$/;
            if(rol.length!=8){
                document.getElementById("rollspan").innerHTML="roll number is not in the specified pattern.";
            }
            else if(!pat.test(rol)){
                document.getElementById("rollspan").innerHTML="roll number is not in the specified pattern.";
            }
            else if(a[document.getElementById("department").selectedIndex]!=rol.substring(2,4)){
                document.getElementById("rollspan").innerHTML="selected department is not matching.";
            }
            else{
                $.post('verify.php',{'RollNo':rol},function(data,status,xhr){
                    if(data=="yes")
                        document.getElementById("rollspan").innerHTML="RollNo already exist, if something wrong please contact administrator";
                    else
                        document.getElementById("rollspan").innerHTML="";
                });
            }
        }

        function funcreg(){
            var reg=document.getElementById("registration").value;
            var pat=/^[0-9][0-9](U10)[0-9][0-9][0-9]$/;
            if(reg.length!=8)
            {
                document.getElementById("regspan").innerHTML="registration number is incorrect.";
            }
            if(!pat.test(reg)){
                document.getElementById("regspan").innerHTML="registration number is incorrect.";
            }
            else{
                $.post('verify.php',{'reg':reg},function(data,status,xhr){
                    if(data=="yes")
                        document.getElementById("regspan").innerHTML="RegNo already exist, if something wrong please contact administrator";
                    else
                        document.getElementById("regspan").innerHTML="";
                });
            }
        }

        function isleap(year){
            if(year%4==0 && year%100 !==0 || year%400==0){
                return true;
            }
            return false;
        }

        function getage1(date1,date2){
            m=[31,28,31,30,31,30,31,31,30,31,30,31];
            var year1=parseInt(date1.getFullYear());
            var year2=parseInt(date2.getFullYear());
            var month1=parseInt(date1.getMonth());
            var month2=parseInt(date2.getMonth());
            var day1=parseInt(date1.getDate());
            var day2=parseInt(date2.getDate());

            var days=0,year=0,month=0;
            if(month2>=month1 && day2>=day1){
                year=year2-year1;
                month=month2-month1;
                days=day2-day1;
                return ""+year+" years, "+month+" month, "+days+" days.";
            }
            if(month2>month1){
                year=year2-year1;
                month=month2-month1-1;
                if(month1==1 && isleap(year1)){
                    days=29-day1+day2;
                }
                else{
                    days=m[month1]-day1+day2;
                }
                return ""+year+" years, "+month+" month, "+days+" days.";
            }
            if(day2>=day1){
                year=year2-year1-1;
                month=12-month1+month2;
                days=day2-day1;
                return ""+year+" years, "+month+" month, "+days+" days.";
            }
            year=year2-year1-1;
            month=12-month1+month2-1;
            if(month==1 && isleap(year1)){
                days=29-day1+day2;
            }
            else{
                days=m[month1]-day1+day2;
            }
            return ""+year+" years, "+month+" month, "+days+" days.";
        }
        function getAge() {
            var dateString=document.getElementById("dob").value;
            var today = new Date();
            var birthDate = new Date(dateString);
            document.getElementById("age").value=getage1(birthDate,today);
        }

        function funcrules(){
            if(document.getElementById("rules").checked==true){
                document.getElementById("submit").disabled=false;
            }
            else{
                document.getElementById("submit").disabled=true;
            }
        }

        function resetting()
        {
            var res="";
            var ids=["name","username","password","password1","fatherName","motherName","mobile","email","address1","address2", "address3", "address4", "roll","registration","dob","age","year"]
            var spans=["userspan","passspan","confirmspan","rollspan","regspan","fatherspan","motherspan","emailspan","departspan","namespan"];
            var i;
            for(i in ids)
            {
                document.getElementById(ids[i]).value=res;
            }
            for(i in spans){
                document.getElementById(spans[i]).innerHTML=res;
            }
            document.getElementById("male").checked=true;
            document.getElementById("department").selectedIndex=0;
            document.getElementById("rules").checked=false;
            document.getElementById("submit").disabled=true;
        }

        function validation(){
            var ids=["name","username","password","password1","fatherName","motherName","mobile", "email","address1","address2", "address3", "address4","roll","registration","dob","year"];
            var f=0;
            var i;
            for(i in ids)
            {
                if(document.getElementById(ids[i]).value=="")
                {
                    document.getElementById(ids[i]).focus();
                    return;
                }
            }
            if(document.getElementById("department").value==" ")
            {
                document.getElementById('department').focus();
                return;
            }

            funcname(document.getElementById('name'));
            funcname1(document.getElementById('name'));
            funcname(document.getElementById('fatherName'));
            funcname1(document.getElementById('fatherName'));
            funcname(document.getElementById('motherName'));
            funcname1(document.getElementById('motherName'));
            funcuser(document.getElementById('username'));
            funcuser1(document.getElementById('username'));
            funcpass();funcpass1();
            funcconfirm();
            funcmobile();
            funcemail();
            dept();
            funcroll();
            funcreg();
            getAge();

            var s={"namespan":"name","userspan":"username","passspan":"password","confirmspan":"password1","fatherspan":"fatherName","motherspan":"motherName","mobilespan":"mobile", "emailspan":"email","departspan":"department","rollspan":"roll","regspan":"registration"};
            for(var x in s){
                if(document.getElementById(x).innerHTML!="")
                {
                    document.getElementById(s[x]).focus();
                    return;
                }
            }
            if(document.getElementById('year')<2000 && document.getElementById('year')>2030){
                document.getElementById('year').focus();
                return;
            }

            if(document.getElementById('address4').value.length!=6){
                alert("pincode is incorrect");
                document.getElementById('address4').focus();
                return;
            }
            var ids=["name","username","password","fatherName","motherName","mobile", "email","address1","address2", "address3", "address4","department", "roll","registration","dob","age","year"];
            var formdata={};
            for(i in ids){
                formdata[ids[i]]=$('#'+ids[i]).val();
            }
            formdata['gender']=$('input[name="gender"]:checked').val();
            formdata['submit']='submit';
            $.post('verify.php',formdata,function(data,status,xhr){
                if(data=="yes"){
                    window.location.replace('home.php?registration=successful');
                }
                else{
                    alert(data);
                }
            });

        }
    </script>
</body>
</html>