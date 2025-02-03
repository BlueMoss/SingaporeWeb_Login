<?php
            $con=mysqli_connect("10.4.1.100", "user1", "qwe123", "sqlDB") or die("MySQL 접속 실패 !!");
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
          ?>
          <!DOCTYPE html>
          <html lang="en">
          <head>
            <meta http-equiv="content-type" content="text/html; charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>SingaporeWeb 회원 삭제</title>
            <style>
              body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f9;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
              }
              .form-container {
                background-color: #ffffff;
                padding: 20px 30px;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                width: 100%;
                max-width: 400px;
              }
              .form-container h1 {
                text-align: center;
                color: #d9534f; /* 강조를 위해 붉은색 계열 */
                margin-bottom: 20px;
                font-size: 24px;
              }
              .form-container label {
                display: block;
                font-weight: bold;
                margin-bottom: 5px;
                color: #555555;
              }
              .form-container input[type="text"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #cccccc;
                border-radius: 5px;
                font-size: 14px;
                background-color: #f9f9f9;
                color: #555555;
                cursor: not-allowed;
              }
              .form-container p {
                text-align: center;
                font-size: 16px;
                color: #333333;
                margin-bottom: 20px;
              }
              .form-container input[type="submit"] {
                width: 100%;
                padding: 10px;
                border: none;
                border-radius: 5px;
                background-color: #d9534f;
                color: white;
                font-size: 16px;
                font-weight: bold;
                cursor: pointer;
              }
              .form-container input[type="submit"]:hover {
                background-color: #c9302c;
              }
            </style>
          </head>
          <body>
            <div class="form-container">
              <h1>Singapore 리전 - 회원 삭제</h1>
              <form method="post" action="delete_result.php">
                <label for="userID">아이디</label>
                <input type="text" name="userID" id="userID" value="<?php echo $userID ?>" readonly>                
                <label for="name">이름</label>
                <input type="text" name="name" id="name" value="<?php echo $name ?>" readonly>                
                <p>위 회원을 삭제하겠습니까?</p>
                <input type="submit" value="회원 삭제">
              </form>
            </div>
          </body>
          </html>