<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>문의하기</title>
</head>
<body>
    <form action="send_email.php" method="POST">
        <label for="name">이름:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">이메일:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="message">문의 내용:</label>
        <textarea id="message" name="message" rows="4" required></textarea><br><br>
        
        <button type="submit">전송</button>
    </form>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    $to = "chef2079@naver.com";
    $subject = "새로운 문의가 도착했습니다";
    $body = "이름: $name\n이메일: $email\n\n문의 내용:\n$message";
    $headers = "From: $email";
    
    if (mail($to, $subject, $body, $headers)) {
        echo "문의가 성공적으로 전송되었습니다.";
    } else {
        echo "문의 전송에 실패했습니다. 다시 시도해주세요.";
    }
}
?>

</body>
</html>
