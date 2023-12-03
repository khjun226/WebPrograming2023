<?php include('../functions.php') ?> <!-- functions.php 파일을 포함 -->
<!DOCTYPE html>
<html>
<head>
        <title>Registration system PHP and MySQL - Create user</title> <!-- 페이지 제목 설정 -->
        <link rel="stylesheet" type="text/css" href="../style.css"> <!-- 스타일시트 파일 연결 -->
        <style>
                .header {
                        background: #003366;  
                }         
               
                button[name=register_btn] {
                        background: #003366;  
                }       
        </style>     <!-- 헤더 배경색과 등록 버튼 배경색 설정 -->
</head>
<body>
        <div class="header">
                <h2>Admin - create user</h2> <!-- 헤더에 관리자 - 사용자 생성 제목 출력 -->
        </div>
        
        <form method="post" action="create_user.php"> <!-- 사용자 생성 폼 -->

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
                        <label>User type</label> <!-- 사용자 유형 라벨 -->
                        <select name="user_type" id="user_type" > <!-- 사용자 유형 선택 필드 -->
                                <option value=""></option>
                                <option value="admin">Admin</option> <!-- 관리자 옵션 -->
                                <option value="user">User</option> <!-- 사용자 옵션 -->
                        </select>
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
                        <button type="submit" class="btn" name="register_btn"> + Create user</button> <!-- 사용자 생성 버튼 -->
                </div>
        </form>
</body>
</html>
