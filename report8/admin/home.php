<?php 
include('../functions.php'); // functions.php 파일을 포함

// 관리자가 아니라면 로그인 페이지로 리다이렉트
if (!isAdmin()) {
        $_SESSION['msg'] = "You must log in first"; // 로그인해야 합니다라는 메시지를 세션에 저장
        header('location: ../login.php'); // 로그인 페이지로 리다이렉트
}

// 로그아웃 요청이 있다면 세션을 파괴하고 로그인 페이지로 리다이렉트
if (isset($_GET['logout'])) {
        session_destroy(); // 세션 파괴
        unset($_SESSION['user']); // 사용자 세션 정보 삭제
        header("location: ../login.php"); // 로그인 페이지로 리다이렉트
}
?>
<!DOCTYPE html>
<html>
<head>
        <title>Home</title> <!-- 페이지 제목 설정 -->
        <link rel="stylesheet" type="text/css" href="../style.css"> <!-- 스타일시트 파일 연결 -->
        <style>
        .header {
                background: #003366; <!-- 헤더 배경색 설정 -->
        }
        button[name=register_btn] {
                background: #003366; <!-- 등록 버튼 배경색 설정 -->
        }
        </style>
</head>
<body>
        <div class="header">
                <h2>Admin - Home Page</h2> <!-- 헤더에 관리자 - 홈페이지 제목 출력 -->
        </div>
        <div class="content">
                <!-- 알림 메시지 -->
                <?php if (isset($_SESSION['success'])) : ?>
                        <div class="error success" >
                                <h3>
                                        <?php 
                                                echo $_SESSION['success']; // 성공 메시지 출력 
                                                unset($_SESSION['success']); // 성공 메시지 세션에서 제거
                                        ?>
                                </h3>
                        </div>
                <?php endif ?>

                <!-- 로그인한 사용자 정보 -->
                <div class="profile_info">
                        <img src="../images/admin_profile.png"  > <!-- 관리자 프로필 이미지 출력 -->

                        <div>
                                <?php  if (isset($_SESSION['user'])) : ?>
                                        <strong><?php echo $_SESSION['user']['username']; ?></strong> <!-- 사용자 이름 출력 -->

                                        <small>
                                                <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> <!-- 사용자 유형 출력 (첫 글자를 대문자로 변환) -->
                                                <br>
                                                <a href="home.php?logout='1'" style="color: red;">logout</a> <!-- 로그아웃 링크 -->
                                                &nbsp; <a href="create_user.php"> + add user</a> <!-- 사용자 추가 링크 -->
                                        </small>

                                <?php endif ?>
                        </div>
                </div>
        </div>
</body>
</html>
