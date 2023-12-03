<?php 
session_start(); // 세션 시작

// 데이터베이스 연결
$db = mysqli_connect('localhost', 'root', '', 'multi_login'); 

// 변수 선언
$username = "";
$email    = "";
$errors   = array(); 

// register_btn이 클릭되면 register() 함수 호출
if (isset($_POST['register_btn'])) {
        register();
}

// 사용자 등록 함수
function register(){
        // 글로벌 키워드로 변수를 함수에서 사용 가능하게 함
        global $db, $errors, $username, $email;

        // 폼에서 모든 입력 값을 받음. 아래에 정의된 e() 함수를 호출하여 폼 값을 이스케이프함
        $username    =  e($_POST['username']);
        $email       =  e($_POST['email']);
        $password_1  =  e($_POST['password_1']);
        $password_2  =  e($_POST['password_2']);

        // 폼 검증: 폼이 올바르게 작성되었는지 확인
        if (empty($username)) { 
                array_push($errors, "Username is required"); // 사용자 이름이 필요할 때
        }
        if (empty($email)) { 
                array_push($errors, "Email is required"); // 이메일이 필요할 때
        }
        if (empty($password_1)) { 
                array_push($errors, "Password is required"); // 비밀번호가 필요할 때
        }
        if ($password_1 != $password_2) {
                array_push($errors, "The two passwords do not match"); // 두 비밀번호가 일치하지 않을 때 
        }

        // 폼에 오류가 없으면 사용자 등록
        if (count($errors) == 0) {
                $password = md5($password_1); // 데이터베이스에 저장하기 전에 비밀번호를 암호화함

                if (isset($_POST['user_type'])) {
                        $user_type = e($_POST['user_type']);
                        $query = "INSERT INTO users (username, email, user_type, password) 
                                          VALUES('$username', '$email', '$user_type', '$password')"; // 사용자 추가 쿼리
                        mysqli_query($db, $query);
                        $_SESSION['success']  = "New user successfully created!!"; // 새 사용자가 성공적으로 생성
                        header('location: home.php'); // 홈페이지로 리다이렉트
                }else{
                        $query = "INSERT INTO users (username, email, user_type, password) 
                                          VALUES('$username', '$email', 'user', '$password')"; // 사용자 추가 쿼리
                        mysqli_query($db, $query);

                        // 생성된 사용자의 ID 가져오기
                        $logged_in_user_id = mysqli_insert_id($db);

                        $_SESSION['user'] = getUserById($logged_in_user_id); // 로그인한 사용자를 세션에 넣음
                        $_SESSION['success']  = "You are now logged in"; // 로그인 성공
                        header('location: index.php'); // 인덱스 페이지로 리다이렉트                         
                }
        }
}

// ID로부터 사용자 배열 반환 함수
function getUserById($id){
        global $db;
        $query = "SELECT * FROM users WHERE id=" . $id; // 사용자 선택 쿼리
        $result = mysqli_query($db, $query);

        $user = mysqli_fetch_assoc($result);
        return $user; // 사용자 반환
}

// 문자열 이스케이프 함수
function e($val){
        global $db;
        return mysqli_real_escape_string($db, trim($val)); // 문자열을 이스케이프하고 앞뒤 공백을 제거함
}

// 오류 표시 함수
function display_error() {
        global $errors;

        if (count($errors) > 0){
                echo '<div class="error">';
                        foreach ($errors as $error){
                                echo $error .'<br>'; // 오류 메시지 출력
                        }
                echo '</div>';
        }
}       

// 로그인 여부 확인 함수
function isLoggedIn()
{
        if (isset($_SESSION['user'])) { // 세션에 사용자 정보가 있으면
                return true; // 로그인 상태
        }else{
                return false; // 로그아웃 상태
        }
}

// 로그아웃 버튼 클릭시 로그아웃 처리
if (isset($_GET['logout'])) {
    session_destroy(); // 세션 파괴
    unset($_SESSION['user']); // 세션에서 사용자 정보 제거
    header("location: login.php"); // 로그인 페이지로 리다이렉트
}

// register_btn이 클릭되면 login() 함수 호출
if (isset($_POST['login_btn'])) {
    login();
}

// 사용자 로그인 함수
function login(){
    global $db, $username, $errors;

    // 폼 값 받아오기
    $username = e($_POST['username']);
    $password = e($_POST['password']);

    // 폼이 제대로 작성되었는지 확인
    if (empty($username)) {
            array_push($errors, "Username is required"); // 사용자 이름이 필요할 때
    }
    if (empty($password)) {
            array_push($errors, "Password is required"); // 비밀번호가 필요할 때
    }

    // 폼에 오류가 없으면 로그인 시도
    if (count($errors) == 0) {
            $password = md5($password); // 비밀번호 암호화

            $query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1"; // 사용자 선택 쿼리
            $results = mysqli_query($db, $query);

            if (mysqli_num_rows($results) == 1) { // 사용자 발견
                    // 사용자가 관리자인지 일반 사용자인지 확인
                    $logged_in_user = mysqli_fetch_assoc($results);
                    if ($logged_in_user['user_type'] == 'admin') {

                            $_SESSION['user'] = $logged_in_user; // 로그인한 사용자를 세션에 넣음
                            $_SESSION['success']  = "You are now logged in"; // 로그인 성공
                            header('location: admin/home.php'); // 관리자 홈페이지로 리다이렉트              
                    }else{
                            $_SESSION['user'] = $logged_in_user; // 로그인한 사용자를 세션에 넣음
                            $_SESSION['success']  = "You are now logged in"; // 로그인 성공

                            header('location: index.php'); // 인덱스 페이지로 리다이렉트
                    }
            }else {
                    array_push($errors, "Wrong username/password combination"); // 잘못된 사용자 이름/비밀번호 조합
            }
    }
}

// 관리자 여부 확인 함수
function isAdmin()
{
        if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
                return true; // 관리자
        }else{
                return false; // 일반 사용자
        }
}
?>
