<?php
interface DataBase
{
    public function select();
    public function update();
    public function delete();

}

class Mysql implements  DataBase
{
    public function select()
    {
        echo 'some data from Mysql';
    }
    public function update()
    {
        echo 'update data Mysql';
    }

    public function delete()
    {
        echo 1;
    }
}
class Postgre implements  DataBase
{
    public function select()
    {
        echo 'some data from Postgre';
    }
    public function delete()
    {
        echo 'update data Postgre';
    }

    public function update()
    {
        echo 'update data Postgre';
    }
}

class Controller
{
    private $adapter;

    public function __construct(DataBase $base)
    {
        $this->adapter = $base;
    }

    function getData()
    {
        $this->adapter->delete();
    }
}

$test = new Controller(new Mysql());
$test->getData();