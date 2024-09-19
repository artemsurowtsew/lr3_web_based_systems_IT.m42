<?php
header("Content-Type: text/html; charset=utf-8");

class Country {
    public $area;
    public $population;
    public $language;


public function __construct($area, $population, $language) {
        $this->area = $area;
        $this->population = $population;
        $this->language = $language;
    }

public function set($field, $value) {
    if (property_exists($this, $field)) {
        $this->$field = $value;
    } else {
        echo "Field $field does not exist.";
    }
}

// Метод для отримання значення поля
public function get($field) {
    if (property_exists($this, $field)) {
        return $this->$field;
    } else {
        return "Field $field does not exist.";
    }
}

// Метод для виведення значень полів на екран
public function show() {
    echo "<p>Area: " . $this->area . "</p>";
    echo "<p>Population: " . $this->population . "</p>";
    echo "<p>Language: " . $this->language . "</p>";
}

// Метод для пошуку за одним із полів
public function search($field, $value) {
    if (property_exists($this, $field)) {
        if ($this->$field == $value) {
            return true;
        }
    }
    return false;
}

// Деструктор для видалення об'єкта
public function __destruct() {
    echo "Objects are deleted!";
}
}

// Створення об'єкта класу Country
$object = new Country("45 339 км²", "1,349 мільйона", "Естонська");

// Виклик методу для виведення даних
$object->show();

// Зміна значення поля
$object->set('population', '1,5 мільйона');

// Отримання значення поля
echo "<p>Updated Population: " . $object->get('population') . "</p>";

// Пошук значення в полі
$found = $object->search('language', 'Естонська');
echo $found ? "<p>Language found.</p>" : "<p>Language not found.</p>";

// Видалення об'єкта
unset($object);

?>
