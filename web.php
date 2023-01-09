<?php
$list = $_POST['list'];
$days = (int)$_POST['days'];
$check = $_POST['check'] ?? null;

$count = $days * 400;

function price($list, $count, $check)
{
    if ($list == "Египет") {
        $percent = $count * (10 / 100);
        $count += $percent;
    } elseif ($list == "Италия") {
        $percent = $count * (12 / 100);
        $count += $percent;
    }
    if (isset($check)) {
        $percent = $count * (5 / 100);
        return $count - $percent;
    } else return $count;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Д/З №3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
<form action="web.php" method="POST" class="ms-5 w-75">
    <div class="mb-3">
        <select class="form-select mt-3 w-75" name="list">
            <option selected>Выберите страну:</option>
            <option value="Турция">Турция</option>
            <option value="Египет">Египет</option>
            <option value="Италия">Италия</option>
        </select>
    </div>
    <div class="mb-3">
        <input type="number" class="form-control w-75" name="days">
    </div>
    <div class="mb-3 form-check">
        Скидка? <input class="form-check-input" type="checkbox" name="check">
    </div>
    <button type="submit" class="btn btn-dark">Посчитать</button>
</form>

<h6 class="ms-5 mt-3"> Страна: <?= $list ?></h6>
<h6 class="ms-5 mt-3"> Количество дней: <?= $days ?></h6>
<h6 class="ms-5 mt-3"> Есть ли скидка? <?= isset($check) ? "Есть" : "Нет" ?></h6>
<h6 class="ms-5 mt-3"> Стоимость отдыха: <?= price($list, $count, $check) ?></h6>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
</body>
</html>