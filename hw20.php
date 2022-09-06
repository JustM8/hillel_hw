<?php


class Regular
{
    public function lastWord(string $str): string
    {
        $pattern = '/\w+$/';
        $replacement = '';
        return preg_replace($pattern, $replacement, $str);
    }

    public function spaceKiller(string $str): string
    {
        $pattern = '/\s/';
        $replacement = '';
        return preg_replace($pattern, $replacement, $str);
    }

    public function notNumbers(string $str)
    {
        $pattern = '/[\d,.]+/';
        preg_match($pattern, $str, $result);
        return $result[0];
    }

    public function inBrackets(string $str)
    {
        $pattern = '/\[(.*?)\]/';
        preg_match($pattern, $str, $result);
        return $result[1];
    }

    public function deleter(string $str)
    {
        $pattern = '/[\s\w\d]+/';
        preg_match_all($pattern, $str, $result);
        return implode('', $result[0]);
    }
}

$reg = new Regular();
print_r($reg->lastWord('The quick brown fox'));

echo '<hr>';

print_r($reg->spaceKiller('The quick brown fox'));

echo '<hr>';

print_r($reg->notNumbers('$123,34.00A'));

echo '<hr>';

print_r($reg->inBrackets('The quick brown [fox]'));

echo '<hr>';

print_r($reg->deleter('abcde$ddfd @abcd )der]'));

echo '<hr>';