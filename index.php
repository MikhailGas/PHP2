<?php
class Product {
    public $id;
    public $name;
    private $description;
    protected $price;


    public function __construct(int $id, string $name, string $description, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function addProduct(int $id, string $name, string $description, float $price){}

    public function delProduct(int $id){}

    public function display(){
        echo "<h1>{$this->name}</h1>
              <p>{$this->price}</p>";
    }
}

class Computers extends Product {
    public $brand;
    public $model;
    public $specification;

    public function __construct(int $id, string $name, string $description, float $price, string $brand, string $model, string $specification)
    {
        parent::__construct($id, $name, $description, $price);
        $this->brand = $brand;
        $this->model = $model;
        $this->$specification = $specification;
    }
    public function addProduct(int $id, string $name, string $description, float $price, string $brand, string $model, string $specification){
        parent::addProduct($id, $name, $description, $price);
    }

    public function display()
    {
        parent::display();
        echo "<p>{$this->model}</p>";
    }
}

$acer = new Computers(1, 'Ноутбук', 'jbjhbhvjhv', 15000, 'Acer', 'Aspire ES 15', 'HDD 500GB');
$acer->display();


/*class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();  //$а1 и $a2  экземпляры от одного класса
$a2 = new A();  //статическая переменная $x принадлежит классу, а не экземпляру, поэтому 
var_dump($a1);  //при вызове foo() независимо какой экземпляр его вызывает будет изменяться $x в классе А.
var_dump($a2);

$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();
*/
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;   //перед выводом на экран увеличиваем на 1
    }
}
class B extends A {
}

//когда класс унаследовал свойства и методы от другого класса они(свойства и методы) разные у класса А и класса В
//следовательно статические переменные $X у каждого класса свои.
$a1 = new A();
$b1 = new B();
$a1->foo();      //вызываем метод foo объекта, полученного от класса А $x = 1
$b1->foo();       //вызываем метод foo объекта, полученного от класса В $x = 1
$a1->foo(); 
$b1->foo();
