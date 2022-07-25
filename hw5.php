<?php

class User
{
    public string $id;
    public int $password;
    public  array $userData;

    public function getUserData():array{
        if(strlen($this->password)>8):
            throw new Exception('password  contains more than 8 characters');
        elseif(!is_numeric($this->id)):
            throw new Exception('id does not contain a number');
        else:
            $this->userData = [
                'id'=>$this->id,
                'email'=>'test@test.com',
            ];
        endif;

        return $this->userData;
    }
}
try {
    $m = new User();
    $m->id = 11;
    $m->password = 11111111;

    print_r($m->getUserData());
}catch (Exception $exception){
    echo "Error message: {$exception->getMessage()}<br>File with error: {$exception->getFile()}<br>Error line: {$exception->getLine()}";
}