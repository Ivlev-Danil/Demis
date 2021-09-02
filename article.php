<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <div class="container">
      <nav class="nav">
        <ul class="nav-list">
          <li class="nav-item"><a href="index.php" class="link">Главная</a></li>
          <li class="nav-item"><a href="form.html" class="link">Обратный звонок</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <main>
    <div class="container">
      <div class="article">
        <?
          require_once 'php/connection.php'; // подключаем скрипт
          $link = mysqli_connect($servername, $username, $password, $dbname)// подключаемся к БД
          or die("Ошибка " . mysqli_error($link));
          $query ="SELECT * FROM news ";
          $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
          while ($row = mysqli_fetch_row($result)):
            if ($_GET['id']==$row[0]) :?>
              <h2 class="article-name"><?echo $row[2]?></h2>
              <p class="article-announce"><?echo $row[3]?></p>
              <p class="article-text"><?echo $row[4]?></p>
            <? endif;
            endwhile;
          ?>
      </div>
      <div class="all-news-block">
        <a href="news.php" class="link all-news">Все новости</a>
      </div>
    </div>
  </main>
  <footer>
    <div class="container"></div>
  </footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="script/script.js"></script>
</body>
</html>
