<?php
$login = $_POST["login"];
$password = $_POST["password"];

class user {
    public $name;
    public $surname;
    public $role;

    function __construct($name,$surname,$role)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->role = $role;
    }
}
class admin extends user {

    public function privet(){
        echo "Здравствуйте, " .$this->name. "  " . $this->surname. ", Вы " .$this->role. ", значит Вы тут Босс!";
    }
}
class manager extends user {

    public function privet() {
        echo "Здравствуйте, " .$this->name. "  " .$this->surname. ", Вы наш ".$this->role." верно? Будем рады работать с вами " .$this->role. ".";
    }
}
class client extends user {

    public function privet(){
        echo "Здравствуйте, " .$this->name. "  " .$this->surname. ", добро пожаловать! (" .$this->role. "). Будете первым юзером :_(";
    }
}

$database = [
    ["login" => "admin", "password" => "parol", "name" => "Влада" , "surname" => "Ларкова", "role" => "админ"],
    ["login" => "manager", "password" => "parol", "name" => "Артём" , "surname" => "Виляев", "role" => "менеджер"],
    ["login" => "client", "password" => "parol", "name" => "Славик" , "surname" => "Нурусов", "role" => "клиент"],
];
if (!empty($login) && !empty($password)) {
    if ($_POST['login'] == $database[0]['login'] && $_POST['password'] == $database[0]['password'] )
    {
        $admin = new admin($database[0]["name"], $database[0]['surname'], $database[0]['role']);
        $admin->privet();
    }
    if ($_POST['login'] == $database[1]['login'] && $_POST['password'] == $database[1]['password'] )
    {
        $manager = new manager($database[1]["name"], $database[1]['surname'], $database[1]['role']);
        $manager->privet();
    }
    if ($_POST['login'] == $database[2]['login'] && $_POST['password'] == $database[2]['password'] )
    {
        $client = new client($database[2]["name"], $database[2]['surname'], $database[2]['role']);
        $client->privet();
    }
    for ($i=0; $i<count($database); $i++)
    {
        if (($_POST['login'] != $database[$i]['login'] && $_POST['password'] == $database[$i]['password']) || ($_POST['login'] == $database[$i]['login'] && $_POST['password'] != $database[$i]['password']))
        {echo "Вас нет в нашей базе данных, возможно неправильный логин или пароль. Попробуй проверить логин или пароль";}
    }
}
else {
    echo "ERROR! Заполните пожалуйста все поля!";
}
?>