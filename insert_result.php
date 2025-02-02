<?php
            $con=mysqli_connect("dbsrv.idcseoul.internal", "root", "", "sqlDB") or die("MySQL 접속 실패 !!");
            mysqli_query($con, "set session character_set_connection=utf8;");
            mysqli_query($con, "set session character_set_results=utf8;");
            mysqli_query($con, "set session character_set_client=utf8;");
            $sql ="SELECT * FROM userTBL";
            $userID = $_POST["userID"];
            $name = $_POST["name"];
            $birthYear = $_POST["birthYear"];
            $addr = $_POST["addr"];
            $mobile1 = $_POST["mobile1"];
            $mobile2 = $_POST["mobile2"];
            $height = $_POST["height"];   
            $mDate = date("Y-m-j");            
            $sql =" INSERT INTO userTbl VALUES('".$userID."','".$name."',".$birthYear;
            $sql = $sql.",'".$addr."','".$mobile1."','".$mobile2."',".$height.",'".$mDate."')";            
            $ret = mysqli_query($con, $sql);          
              echo "<h1> 신규 회원 입력 결과 </h1>";
            if($ret) {
              echo "데이터가 성공적으로 입력됨.";
            }
            else {
              echo "데이터 입력 실패!!!"."<br>";
              echo "실패 원인 :".mysqli_error($con);
            } 
            mysqli_close($con);            
            echo "<br> <a href='main.html'> <--초기 화면</a> ";
          ?>