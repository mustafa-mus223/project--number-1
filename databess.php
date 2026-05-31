
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/style.css"rel = "stylesheet">
    <title>Document</title>

    <style>
      body{
        background-color:whitesmoke;

      }
      .mother{
          width:100%;
          font-size:20px;
      }
      main{
          background-color:burlywood;
          float:left;
          border:1px solid gray;
          padding:5px;
      }
      input{
          padding:4px;
          border:4px solid black;
          text-align:right;
          font-size:20px;
      }
      aside{
          text-align:center;
          width:300px;
          float:right;
          border:4px solid black;
          padding:5px;
          font-size:25px;
          background-color:silver;
          color:white;
      }
      aside button{
          color:#fff;
          background: seagreen;
          width:200px;
          padding: 8px;
          margin-top: 7px;
          font-size: 20px;
          font-weight:bold;
      }
      #tbl{
          width:890px;
          font-size:20px;
      }
      #tbl th{
          text-align :center;
          background: seagreen;
          color:#fff;
          font-size:20px;
          padding:10px;
      }
      #tbl td{
          text-align :center;
          background-color:whitesmoke;
          color:seagreen;
          font-size:20px;
          padding:10px;
      }
    </style>
</head>
<body dir='rtl'>

<!--start of php -->
<?php
#--الاتصال مع قاعدة البيانات--->
$host="localhost";
    $user="phpMyAdmin";
    $pass='';
    $db="test";
   
    $conn = mysqli_connect($host,$user,$pass,$db);
$res=mysqli_query($conn,"select * from student ");
#button  variable-----

$name='';
$email='';
$id='';
$year='';
$batch='';

if(isset($_POST['name'])){
    $name = $_POST['name'];
}
if(isset($_POST['email'])){
    $email = $_POST['email'];
}
if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['year'])){
    $year = $_POST['year'];
}

if(isset($_POST['batch'])){
    $batch = $_POST['batch'];
}

$sqls ='';
if(isset($_POST['add'])){
    $sqls= "insert into student  value('$name' ,'$email','$id','$year','$batch')";
    mysqli_query($conn,$sqls);
    header("location: databess.php");
}



?>
<!--end of php-->

    <div class='mother'>
       <form method='POST'>
        <!--استمار تسجيل دخول-->
           <aside>
               <div id ='div'>
               <label>اسم الطالب</label><br>
               <input type="text" name='name' id='name'><br><br>
               <label>ايميل</label><br>
               <input type="text" name='email' id='email'><br><br>
               <label>رقم الطالب</label><br>
               <input type="text" name='id' id='id'><br><br>
               <label>السنة الدراسي</label><br>
               <input type="text" name='year' id='year'><br><br>
               <label>اسم الدفعة</label><br>
               <input type="text" name='batch' id='batch'><br><br>
               <button name='add'>اضافة الطالب</button>
               
               </div>
           </aside>
           <!--عرض بيانات الطالب-->
           <main>
               <table id='tbl'>
                  <tr>
                  <th>اسم الطالب</th>
                  <th>ايميل</th>
                  <th>رقم الطالب</th>
                  <th>السنة الدراسية</th>
                  <th>اسم الدفعة</th>
                  </tr>
                  <?php
                  while  ( $row = mysqli_fetch_array($res)){
                      echo "<tr>";
                      echo "<td>".$row['name']."</td>";
                      echo "<td>".$row['email']."</td>";
                      echo "<td>".$row['id']."</td>";
                      echo "<td>".$row['year']."</td>";
                      echo "<td>".$row['batch']."</td>";
                      echo "</tr>";
                  }
                ?>
               </table>
           </main>
       </form>
    </div>
   
</body>
</html>