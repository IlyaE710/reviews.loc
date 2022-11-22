<?php

namespace Core\Models;

use Core\Database\Connection;
use Core\Models\base\Model;
use Core\Repository\FeedbackRepository;

class FeedbackModel extends Model
{
    public int $id;
    public string $email;
    public string $author;
    public string $text;



/*    public function save()
    {
        $sth = $this->connection->prepare("INSERT INTO review (author, text) values (:name, :text)");
        $sth->execute([
            'name' => $this->author,
            'text' => $this->text,
        ]);
    }

    public static function getAll()
    {
        $connection = (new Connection())->get();
        $sth = $connection->prepare("SELECT * from review");
        $sth->execute();
        return $sth->fetchAll();
    }*/

    public function save()
    {
        $repository = new FeedbackRepository();
        $repository->save($this);
    }

    //TODO Сделать валидацию
    public function validate() : bool
    {
        return true;
    }
}