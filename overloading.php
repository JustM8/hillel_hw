<?php

class MyUserException extends Exception
{

    public function customFunction():string {
        return "My Custom Exception with message -  {$this->message} and code - {$this->code}\n";
    }
}


class User
{
    public string $name;
    private int $age;

    private function setName(string $name):void
    {
        $this->name = $name;
    }

    private function setAge(int $age):void
    {
        $this->age = $age;
    }

    public function getAll():string
    {
        return "Name - {$this->name}, Age - {$this->age}";
    }

    public function  __call(string $name, $value):void
    {
        if(method_exists(self::class,$name)){
            $this->$name($value[0]);
        }else{
            throw new MyUserException(self::class.' does not have method with name - '.$name,1);
        }
    }

}



try{
    $user = new User();

    $user->setName('Sasuke');
    $user->setAge(33);

//    $user->setEmail();
    print_r($user->getAll());

}catch (MyUserException $e){
    echo "{$e->customFunction()}";
}