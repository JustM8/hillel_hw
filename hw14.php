<?php

class Product
{
    private $name = "Sushi";
    private $value;

    public function get()
    {
        return $this->name;
    }

    public function set(string $name, float $value): void
    {
        $this->name = $name;
        $this->value = $value;
    }
}

class productHandler
{
    public function save(Product $product): bool
    {
        return 'sql for save';
    }

    public function update(Product $product, $name, $val): string
    {
        $product->set($name, $val);
        return $product->get();
    }

    public function delete(Product $product): bool
    {
        return 'sql for delete';
    }
}

class productOutput
{
    public function show($product): string
    {
        return $product->get();
    }

    public function print($product): void
    {
        echo $this->show($product);
    }
}

$out = new productOutput();
$out->print(new Product());
echo '<br><hr>';
$handler = new productHandler();
echo $handler->update(new Product(), 'Pizza 1', '333');