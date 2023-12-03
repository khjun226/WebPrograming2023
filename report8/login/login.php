<?php include('functions.php') ?> <!-- functions.php 파일을 포함 -->
<!DOCTYPE html>
<html>
<head>
        <title>Registration system PHP and MySQL</title> <!-- 페이지 제목 설정 -->
        <link rel="stylesheet" type="text/css" href="style.css"> <!-- 스타일시트 파일 연결 -->
</head>
<body>
        <div class="header">
                <h2>Login</h2> <!-- 헤더에 로그인 제목 출력 -->
        </div>
        <form method="post" action="login.php"> <!-- 로그인 폼 -->

                <?php echo display_error(); ?> <!-- 오류 메시지 출력 -->

                <div class="input-group">
                        <label>Username</label> <!-- 사용자 이름 라벨 -->
                        <input type="text" name="username" > <!-- 사용자 이름 입력 필드 -->
                </div>
                <div class="input-group">
                        <label>Password</label> <!-- 비밀번호 라벨 -->
                        <input type="password" name="password"> <!-- 비밀번호 입력 필드 -->
                </div>
                <div class="input-group">
                        <button type="submit" class="btn" name="login_btn">Login</button> <!-- 로그인 버튼 -->
                </div>
                <p>
                        Not yet a member? <a href="register.php">Sign up</a> <!-- 아직 회원이 아니라면 회원가입 링크 -->
                </p>
        </form>
</body>
</html>
