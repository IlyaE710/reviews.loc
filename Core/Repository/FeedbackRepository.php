<?php

namespace Core\Repository;

use Core\Database\Connection;
use Core\Models\base\Model;
use Core\Models\FeedbackModel;
use Core\Repository\Base\Repository;
use PDO;

class FeedbackRepository extends Repository
{
    function save($model)
    {
        $sth = $this->connection->prepare("INSERT INTO feedbacks (author, text, email) values (:name, :text, :email)");
        $sth->execute([
            'name' => $model->author,
            'email' => $model->email,
            'text' => $model->text,
        ]);
    }

    function getAll()
    {
        $sth = $this->connection->prepare("SELECT * from feedbacks");
        $sth->execute();
        $data = $sth->fetchAll();
        $models = [];

        for ($i = 0; $i < count($data); $i++)
        {
            $model = new FeedbackModel();
            $model->id = $data[$i]['id'];
            $model->author = $data[$i]['author'];
            $model->email = $data[$i]['email'];
            $model->text = $data[$i]['text'];
            $models[] = $model;
        }

        return $models;
    }
}