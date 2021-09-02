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
      <div class="news">
        <?
          require_once 'php/connection.php'; // подключаем скрипт
          $link = mysqli_connect($servername, $username, $password, $dbname)// подключаемся к БД
          or die("Ошибка " . mysqli_error($link));
        ?>

        <h2 class="news-name">Последние новости</h2>
        <div class="news-bar">
          <?
            $query ="SELECT * FROM news ORDER by date DESC";
            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_row($result)) :?>
                <div class="news-block">
                  <a href="article.php?id=<?echo $row[0];?>" class="news-block-link">
                    <div class="news-block-time"><?echo $row[1];?></div>
                    <p class="news-block-article"><?echo $row[2];?></p>
                    <p class="news-block-announce"><? echo $row[3];?></p>
                  </a>
                </div>
              <? endwhile;
            }
            else {
              echo "0 results";
            }
          ?>
        </div>
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
