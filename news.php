<?php
date_default_timezone_set('UTC');

class NewsList
{
    private static $newsCount = 0;
    private $newsArray = [];

    public function addNews($news)
    {
        if (empty($news) || !($news instanceof News)) {
            return false;
        }

        $news->id = ++self::$newsCount;

        return $this->newsArray[] = $news;
    }

    public function getAllNews()
    {
        return $this->newsArray;
    }

    public function getNewsCount()
    {
        return count($this->newsArray);
    }
}

class News
{
    private static $commentsCount = 0;
    private $title;
    private $text;
    private $comments = [];

    public function __construct($title, $text)
    {
        $this->title = $title;
        $this->text = $text;
    }

    public function getContent()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'text' => $this->text,
        ];
    }

    public function addComment($comment)
    {
        if (empty($comment) || !($comment instanceof Comment)) {
            return false;
        }

        $comment->id = ++self::$commentsCount;

        return $this->comments[] = $comment;
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function getCommentsCount()
    {
        return count($this->comments);
    }
}

class Comment
{
    private $author;
    private $text;
    private $timestamp;

    public function __construct($author, $text)
    {
        $this->author = $author;
        $this->text = $text;
        $this->timestamp = date('d-m-y H:i:s');
    }

    public function getContent()
    {
        return [
            'id' => $this->id,
            'author' => $this->author,
            'text' => $this->text,
            'timestamp' => $this->timestamp,
        ];
    }
}


$newsList = new NewsList();

$hedgehogsNews = new News(
    'Ёжики чистят лес',
    'Замечено, что в разлиных областях РФ только
    ёжики следят за чистотой леса! Молодцы, ёжики!'
);

$hedgehogsNews->addComment(new Comment(
    'Валера',
    'Ура! Ёжики молодцы!'
));
$hedgehogsNews->addComment(new Comment(
    'Маша',
    'Давайте принесём яблок ёжикам???'
));
$hedgehogsNews->addComment(new Comment(
    'Коля',
    'Ага, а потом они больно колятся иголками...'
));


$babyNews = new News(
    'Малыши в садике не сами не спят и воспитательнице не дают!',
    'В большинстве детских садивок страны малыши не дают спать воспитателям.
    Невероятно, но факт! Детки проявляют бдительность лучше, чем взрослые,
    ведь нельзя на работе спать.'
);

$babyNews->addComment(new Comment(
    'Маргарита Сергеевна',
    'Это форменное безобразие! Когда ж нам спать!???'
));
$babyNews->addComment(new Comment(
    'Серёженька',
    'А патом ани пют ром!'
));


$flowerNews = new News(
    'Аленький Цветочек не такой уж Аленький',
    'Вчера вечером было замечано, что Цветочек по кличке "Аленький"
    был замечен в стриптиз-клубе "Клубничка". Из достоверных источников
    стало известно. что после Дня Рождения Серёженьки, он направился в
    "Клубничку". Там он стал "Синим" цветочком, где разбил пепельницу 
    и наплевал на пол.'
);

$flowerNews->addComment(new Comment(
    'Снежана',
    'Разбил пепельницу не он! Это был Винни the Пух!'
));


$hotNews = new News(
    'Скрипт работает!',
    'Горячая новость! Скрипт, написанный мной только что, прекрасно рабоатет!'
);

$newsList->addNews($hedgehogsNews);
$newsList->addNews($babyNews);
$newsList->addNews($flowerNews);
$newsList->addNews($hotNews);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новости</title>
</head>
<body>

<?php foreach ($newsList->getAllNews() as $news): ?>
    <?php $newsContent = $news->getContent(); ?>

    <h2>
        <?php echo $newsContent['title']; ?>
    </h2>

    <p>
        <?php echo $newsContent['text']; ?>
    </p>

    <?php $newsCommentsCount = $news->getCommentsCount(); ?>

    <?php if($newsCommentsCount): ?>
        <p>
            Всего комментариев: 
            <?php echo $newsCommentsCount; ?>
        </p>
        <ul>
            <?php $comments = $news->getComments(); ?>
            
            <?php foreach ($comments as $comment): ?>
                <li>
                    <?php $commentContent = $comment->getContent(); ?>

                    <h5>
                        Автор: <?php echo $commentContent['author']; ?>
                    <h5>

                    <h6>
                        Время: <?php echo $commentContent['timestamp']; ?>
                    <h6>

                    <p>
                        <?php echo $commentContent['text']; ?>
                    </p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif;?>
    
<?php endforeach; ?>
</body>
</html>