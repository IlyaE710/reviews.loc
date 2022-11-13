<?php

namespace Core\Models;

use Core\Database\Connection;

class FeedbackModel
{
    public string $email;
    public string $author;
    public string $text;

    public function save()
    {
        $connection = (new Connection())->getInstance();
        $sth = $connection->prepare("INSERT INTO review (author, text) values (:name, :text)");
        $sth->execute([
            'name' => $this->author,
            'text' => $this->text,
        ]);
    }

    public function validate() : bool
    {
        return true;
    }
}