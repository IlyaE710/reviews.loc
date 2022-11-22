<?php

namespace Core\Repository;

use Core\Database\Connection;
use Core\Models\FeedbackModel;
use PDO;

class FeedbackRepository
{
    protected PDO $connection;

    public function __construct()
    {
        $connection = new Connection();
        $this->connection = $connection->get();
    }

    public function save($model)
    {
        $sth = $this->connection->prepare("INSERT INTO review (author, text) values (:name, :text)");
        $sth->execute([
            'name' => $model->author,
            //'email' => $model->email,
            'text' => $model->text,
        ]);
    }

    public function getAll()
    {
        $sth = $this->connection->prepare("SELECT * from review");
        $sth->execute();
        $data = $sth->fetchAll();
        $models = [];

        for ($i = 0; $i < count($data); $i++)
        {
            $model = new FeedbackModel();
            $model->id = $data[$i]['id'];
            $model->author = $data[$i]['author'];
            //$model->email = $data[$i]['email'];
            $model->text = $data[$i]['text'];
            $models[] = $model;
        }

        return $models;
    }
}