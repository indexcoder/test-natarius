<!DOCTYPE html>
<html>
<head>
    <title>Привет {{ $notary['name'] }}</title>
</head>
<body>
<h3>Имя: {{ $notary['name'] }}</h3>
<h3>Фамиля: {{ $notary['last_name'] }}</h3>
<h3>E-mail: {{ $notary['email'] }}</h3>
<h3>Дата приема: {{ $notary['receipt_date'] }}</h3>
<h3>Вид документа: {{ $notary['record_type'] }}</h3>
<p>Спасибо</p>
</body>
</html>
