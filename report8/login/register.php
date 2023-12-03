<?php include('functions.php') ?> <!-- functions.php 파일을 포함 -->
<!DOCTYPE html>
<html>
<head>
        <title>Registration system PHP and MySQL</title> <!-- 페이지 제목 설정 -->
        <link rel="stylesheet" href="style.css"> <!-- 스타일시트 파일 연결 -->
</head>
<body>
<div class="header">
        <h2>Register</h2> <!-- 헤더에 등록 제목 출력 -->
</div>
<form method="post" action="register.php"> <!-- 등록 폼 -->

<?php echo display_error(); ?> <!-- 오류 메시지 출력 -->

        <div class="input-group">
                <label>Username</label> <!-- 사용자 이름 라벨 -->
                <input type="text" name="username" value="<?php echo $username; ?>"> <!-- 사용자 이름 입력 필드 -->
        </div>
        <div class="input-group">
                <label>Email</label> <!-- 이메일 라벨 -->
                <input type="email" name="email" value="<?php echo $email; ?>"> <!-- 이메일 입력 필드 -->
        </div>
        <div class="input-group">
                <label>Password</label> <!-- 비밀번호 라벨 -->
                <input type="password" name="password_1"> <!-- 비밀번호 입력 필드 -->
        </div>
        <div class="input-group">
                <label>Confirm password</label> <!-- 비밀번호 확인 라벨 -->
                <input type="password" name="password_2"> <!-- 비밀번호 확인 입력 필드 -->
        </div>
        <div class="input-group">
                <button type="submit" class="btn" name="register_btn">Register</button> <!-- 등록 버튼 -->
        </div>
        <p>
                Already a member? <a href="login.php">Sign in</a> <!-- 이미 회원이라면 로그인 링크 -->
        </p>
</form>
</body>
</html>
