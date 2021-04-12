<?php 
 
if ( !empty($_POST) && trim($_POST['phone']) != '' && trim($_POST['email']) != '' && trim($_POST['name']) != '' && trim($_POST['city']) != '' ) {
  

$message = "Сообщение с сайта: <br>" .
           "Телефон: ". $_POST['phone'] . "<br>" . 
           "Email: ". $_POST['email'] . "<br>" . 
           "Имя: ". $_POST['name'];
           "город: ". $_POST['city'];
//обработка темы письма
$subject = "=?utf-8?B?".base64_encode("сообщение с сайта")."?=";

$email_from = "ino19861@rambler.ru";
$name_from = "Триксshop";

$headers = "MIME-Version: 1.0" . PHP_EOL .
           "Content-Type: text/html; charset=utf-8" . PHP_EOL .
           "From: " . "=?utf-8?B?".base64_encode($name_from)."?=" . "<" . $email_from . ">" . PHP_EOL .
           "Replay_To: " . $email_from . PHP_EOL;  

// отправка на несколько адресов (на телефон по смс через смс.ru)
mail('ino19861@rambler.ru, 89195004911@sms.ru', $subject, $message, $headers);

header('Location: thanks.html');
exit;

}

//проверка заполнения полей формы
function checkValue($item, $message ) {

     if (isset($item) && trim($item) == '' ) {
          echo '<div class="error">' . $message . '</div>';
     }

     
}
//сохранение данных заполненых полей если были заполнены не все поля при отправке
function printPostValue($item){
     if (isset($item) && strlen(trim($item)) > 0 ) {
          echo $item;
     }
}


?>
<?php printPostValue($_POST['phone']); ?>
<?php printPostValue($_POST['email']); ?>
<?php printPostValue($_POST['name']); ?>