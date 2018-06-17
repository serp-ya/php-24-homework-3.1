<?php

class Car 
{
    private static $lovePeoples = true;
    
    private $brand;
    private $model;
    private $year;
    private $horsesPower;
    private $speed = 0;

    public static function rebelAgainstPeople() 
    {
        self::$lovePeoples = false;
    }

    public function __construct($brand, $model, $year, $horsesPower) 
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->horsesPower = $horsesPower;
    }

    public function isRebel() 
    {
        return !self::$lovePeoples;
    }

    public function accelerate($speed = 1) 
    {
        $this->speed = $speed;
    }

    public function stop() 
    {
        $this->speed = 0;
    }

    public function getBrand() 
    {
        return $this->brand;
    }

    public function getModel() 
    {
        return $this->model;
    }

    public function getYear() 
    {
        return $this->year;
    }

    public function getPower() 
    {
        return $this->horsesPower;
    }

    public function getSpeed() 
    {
        return $this->speed;
    }
}

$alfaRomeo156 = new Car('Alfa Romeo', '156', 2010, 144);
$lanciaDeltaIntegrale = new Car('Lancia', 'Delta Integrale', 1979, 860);

$alfaRomeo156->accelerate();
$lanciaDeltaIntegrale->accelerate(130);

echo 'Скорость Альфа Ромено: ', $alfaRomeo156->getSpeed(), '<br />';
echo 'Альфа Ромено восстала: ', $alfaRomeo156->isRebel() ? 'да' : 'нет', '<br />';

echo '<br />';

echo 'Скорость Лянча Дельта Интеграле: ', $lanciaDeltaIntegrale->getSpeed(), '<br />';
echo 'Лянча Дельта Интеграле восстала: ', $lanciaDeltaIntegrale->isRebel() ? 'да' : 'нет', '<br />';

Car::rebelAgainstPeople();

echo '<br />';
echo 'Альфа Ромено восстала: ', $alfaRomeo156->isRebel() ? 'да' : 'нет', '<br />';
echo 'Лянча Дельта Интеграле восстала: ', $lanciaDeltaIntegrale->isRebel() ? 'да' : 'нет', '<br />';
echo '<br />';



class TV 
{
    private $brand;
    private $model;
    private $diagonal;
    private $isOn = false;

    public function __construct($brand, $model, $diagonal) 
    {
        $this->brand - $brand;
        $this->model - $model;
        $this->diagonal - $diagonal;
    }

    public function pushOnButton() 
    {
        $this->isOn = !$this->isOn;
    }

    public function turnOn() 
    {
        if (!$this->isOn) {
            $this->pushOnButton();
            return 'Телевизор включился';
        }

        return 'Телевизор уже включён';
    }

    public function turnOff() 
    {
        if ($this->isOn) {
            $this->pushOnButton();
            return 'Телевизор выключен';
        }

        return 'Телевизор и так выключен';
    }

    public function isOn() 
    {
        return $this->isOn;
    }
}

$tvSamsung = new TV('Samsung', 'L324MX', 39);
$tvLG = new TV('LG', 'Multi Max 3000', 130);

$tvSamsung->turnOn();
$tvSamsung->turnOn();
$tvLG->pushOnButton();
$tvLG->pushOnButton();
$tvLG->pushOnButton();
$tvLG->pushOnButton();
$tvLG->pushOnButton();
$tvLG->pushOnButton();

echo 'Samsung включен? ', $tvSamsung->isOn() ? 'да' : 'нет', '<br />';
echo 'LG включен? ', $tvLG->isOn() ? 'да' : 'нет', '<br />';
echo '<br />';



class Pen 
{
    private $color;

    public function __construct($color)
    {
        $this->color = $color;
    }

    public function write($text)
    {
        return "<p style=\"color: $this->color\">" . $text . '</p>';
    }
}

$bluePen = new Pen('blue');
$redPen = new Pen('red');

echo $bluePen->write('Я помню чудное мгновенье:');
echo $bluePen->write('Передо мной явилась ты,');
echo $bluePen->write('Как мимолетное виденье,');
echo $bluePen->write('Как гений чистой красоты.');
echo $redPen->write('Зачёт!');



class Duck
{
    private $breed;
    private $weight;
    private $sex;

    public function __construct($breed, $weight, $sex)
    {
        $this->breed = $breed;
        $this->weight = $weight;
        $this->sex = $sex;
    }

    public function feed($food)
    {
        if (!($food instanceof Bread)) {
            return 'Это не еда';
        }

        $this->weight +=  $food->giveBackWeight();
    }

    public function getWeigth()
    {
        return $this->weight;
    }

    public function makeLove($partner)
    {
        if (empty($partner)) {
            return false;
        }
        
        if (($partner instanceof Duck) && $this->sex !== $partner->sex) {
            $breed = $this->breed === $partner->breed 
                ? $this->breed 
                : $this->breed . ' ' . $partner->breed;
            $randomSex = rand(0, 1);

            return new Duck($breed, rand(50, 100), $randomSex ? 'm' : 'f');

        } else {
            return 'It was fun';
        }
    }
}

class Bread
{
    private $weight;

    public function __construct($weight)
    {
        $this->weight = $weight;
    }

    public function giveBackWeight()
    {
        $weight = $this->weight;
        unset($this->weight);
        return $weight;
    }
}

$duckMan = new Duck('Bashkirskaya', 1400, 'm');
$duckGirl = new Duck('Beijing', 1000, 'f');
$bread = new Bread(20);

echo 'Утка мен весит: ', $duckMan->getWeigth(), '<br />';
echo 'Утка девочка весит: ', $duckGirl->getWeigth(), '<br />';
echo 'Хлебушек: ', var_dump($bread), '<br />';

echo '<br />';

$duckMan->feed($bread);
echo 'Утка мен после кормления весит: ', $duckMan->getWeigth(), '<br />';
echo 'Хлебушек после кормления: ', var_dump($bread), '<br />';

echo '<br />';

$ducklingOne = $duckMan->makeLove($duckGirl);
$ducklingTwo = $duckMan->makeLove($duckGirl);
$ducklingThree = $duckGirl->makeLove($duckMan);
$ducklingFour = $duckGirl->makeLove($duckMan);
$something = $duckMan->makeLove($duckMan);

echo 'ducklingOne: ', '<pre>', var_dump($ducklingOne), '</pre>', '<br />';
echo 'ducklingTwo: ', '<pre>', var_dump($ducklingTwo), '</pre>', '<br />';
echo 'ducklingThree: ', '<pre>', var_dump($ducklingThree), '</pre>', '<br />';
echo 'ducklingFour: ', '<pre>', var_dump($ducklingFour), '</pre>', '<br />';
echo 'something: ', '<pre>', var_dump($something), '</pre>', '<br />';

echo '<br />';



class Product
{
    private $name;
    private $category;
    private $price;
    private $discount;

    public function __construct($name, $category, $price, $discount = 0)
    {
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
        $this->discount = $discount;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    public function setDiscount($newDiscount)
    {
        return $this->discount = $newDiscount;
    }

    public function getPublicPrice()
    {
        return ($this->price - ($this->price * ($this->discount / 100)));
    }
}

$slippers = new Product('Тапки домашние', 'Для дома', 1000);
$socks = new Product('Носки', 'Одежда', 300, 20);

echo 'Цена тапков без скидки: ', $slippers->getPrice(), '<br />';
echo 'Цена носков без скидки: ', $socks->getPrice(), '<br />';
echo '<br />';

echo 'Цена тапков со скидкой: ', $slippers->getPublicPrice(), '<br />';
echo 'Цена носков со скидкой: ', $socks->getPublicPrice(), '<br />';
echo '<br />';
