<?php
if (isset($_POST['submit'])) {
    $to = 'admin@mywebsite.com';
    $subject = $_POST['subject'];
    $message = $_POST['body'];
    $from = $_POST['from'];
    $headers = 'From: ' . $from . "\r\n" .
        'Reply-To: ' . $from . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    //mail($to, $subject, $message, $headers);
    var_dump($to . '<br>');
    var_dump($subject . '<br>');
    var_dump($message . '<br>');
    var_dump($from . '<br>');
    var_dump($headers . '<br>');
}
?>
<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <form action="" method="POST">
        From: <input type="text" name="from"><br>
        Subj: <input type="text" name="subject"><br>
        Mail: <textarea name="body"></textarea><br>
        <input type="submit" name="submit">
    </form>
</body>

</html>