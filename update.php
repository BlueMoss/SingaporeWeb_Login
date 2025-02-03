<?php
            $con=mysqli_connect("10.4.1.100", "root", "", "sqlDB") or die("MySQL 접속 실패 !!");
            mysqli_query($con, "set session character_set_connection=utf8mb4;");
            mysqli_query($con, "set session character_set_results=utf8mb4;");
            mysqli_query($con, "set session character_set_client=utf8mb4;");
            $sql ="SELECT * FROM userTBL WHERE userID='".$_GET['userID']."'";
            $ret = mysqli_query($con, $sql);   
            if($ret) {
              $count = mysqli_num_rows($ret);
              if ($count==0) {
                echo $_GET['userID']." 아이디의 회원이 없음!!!"."<br>";
                echo "<br> <a href='main.html'> <--초기 화면</a> ";
                exit();	
              }		   
            }
            else {
              echo "데이터 조회 실패!!!"."<br>";
              echo "실패 원인 :".mysqli_error($con);
              echo "<br> <a href='main.html'> <--초기 화면</a> ";
              exit();
            }   
            $row = mysqli_fetch_array($ret);
            $userID = $row['userID'];
            $name = $row["name"];
            $birthYear = $row["birthYear"];
            $addr = $row["addr"];
            $mobile1 = $row["mobile1"];
            $mobile2 = $row["mobile2"];
            $height = $row["height"];   
            $mDATE = $row["mDATE"];      
          ?>
          <!DOCTYPE html>
          <html lang="en">
          <head>
            <meta http-equiv="content-type" content="text/html; charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>SingaporeWeb 회원 정보 수정</title>
            <style>
              body {
                font-family: Arial, sans-serif;
                background-color: #eef200;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
              }
              .form-container {
                background-color: #28a745;
                padding: 20px 30px;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                width: 100%;
                max-width: 400px;
              }
              .form-container h1 {
                text-align: center;
                color: #007baa;
                margin-bottom: 20px;
                font-size: 24px;
              }
              .form-container label {
                display: block;
                font-weight: bold;
                margin-bottom: 5px;
                color: #495057;
              }
              .form-container input[type="text"],
              .form-container input[type="date"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #cccccc;
                border-radius: 5px;
                font-size: 14px;
              }
              .form-container input[readonly] {
                background-color: #f9f9f9;
                color: #555555;
                cursor: not-allowed;
              }
              .form-container input[type="submit"] {
                width: 100%;
                padding: 10px;
                border: none;
                border-radius: 5px;
                background-color: #28a745;
                color: white;
                font-size: 16px;
                font-weight: bold;
                cursor: pointer;
              }
              .form-container input[type="submit"]:hover {
                background-color: #45a049;
              }
            </style>
          </head>
          <body>
            <div class="form-container">
              <h1>Singapore 리전 - 회원 정보 수정</h1>
              <form method="post" action="update_result.php">
                <label for="userID">아이디</label>
                <input type="text" name="userID" id="userID" value="<?php echo $userID ?>" readonly>                
                <label for="name">이름</label>
                <input type="text" name="name" id="name" value="<?php echo $name ?>">                
                <label for="birthYear">출생년도</label>
                <input type="text" name="birthYear" id="birthYear" value="<?php echo $birthYear ?>">                
                <label for="addr">지역</label>
                <input type="text" name="addr" id="addr" value="<?php echo $addr ?>">                
                <label for="mobile1">휴대폰 국번</label>
                <input type="text" name="mobile1" id="mobile1" value="<?php echo $mobile1 ?>">                
                <label for="mobile2">휴대폰 전화번호</label>
                <input type="text" name="mobile2" id="mobile2" value="<?php echo $mobile2 ?>">                
                <label for="height">신장</label>
                <input type="text" name="height" id="height" value="<?php echo $height ?>">                
                <label for="mDATE">회원가입일</label>
                <input type="date" name="mDATE" id="mDATE" value="<?php echo $mDATE ?>" readonly>                
                <input type="submit" value="정보 수정">
              </form>
            </div>
          </body>
          </html>