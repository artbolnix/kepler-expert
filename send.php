<?php

//В переменную $token нужно вставить токен, который нам прислал @botFather
$token = "6982803194:AAHGZ-3XbhQmmLvN1IPiAGIbG0yXNjJInqY";

//Сюда вставляем chat_id
$chat_id = "-4077758505";

//Определяем переменные для передачи данных из нашей формы
if ($_POST['act'] == 'order') {
    $name = ($_POST['name']);
    $type = ($_POST['type']);
    $model = ($_POST['model']);
    $phone_text = ($_POST['phone']);
    $phone = '%2B' . $phone_text;
    // $phone = '<a href="'.$phone_text.'">'.$phone_text.'</a>';

//Собираем в массив то, что будет передаваться боту
    $arr = array(
        'Имя:' => $name,
        'Тип спецтехники:' => $type,
        'Модель спецтехники:' => $model,
        'Телефон:' => $phone,
    );
    
    // $txt = "Новая заявка на обратный звонок:\nИмя: $name\nТип спецтехники: $type\nМодель спецтехники: $model\nНомер телефона: $phone";

//Настраиваем внешний вид сообщения в телеграме
    $txt = '';
    foreach($arr as $key => $value) {
        $txt .= "<b>".$key."</b> ".$value."%0A";
    };

//Передаем данные боту
    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

//Выводим сообщение об успешной отправке
    if ($sendToTelegram) {
        echo '<script> alert("Спасибо, ' . $name . ', ваша заявка успешно отправлена!");
        location.href="http://kepler-expert.ru/"</script>';
    }

//А здесь сообщение об ошибке при отправке
    else {
        echo '<script> alert("Что то пошло не так, попробуйте еще раз!");
        location.href="http://kepler-expert.ru/"</script>';
    }
}

?>