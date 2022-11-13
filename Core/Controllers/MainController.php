<?php

namespace Core\Controllers;

use Core\Controllers\Base\Controller;
use Core\Database\Connection;

class MainController extends Controller
{
    public function index()
    {
        $connection = (new Connection())->getInstance();
        $sth = $connection->prepare("SELECT * from review");
        $sth->execute();
        $data = $sth->fetchAll();
        $this->render("main", ["data" => $data]);
    }

    public function action()
    {
        $connection = (new Connection())->getInstance();
        $sth = $connection->prepare("INSERT INTO review (author, text) values (:name, :text)");
        $name = $_POST['name'];
        $text = $_POST['text'];
        $sth->execute([
            'name' => $name,
            'text' => $text,
        ]);
        header('Location: http://reviews.loc/');
    }
}