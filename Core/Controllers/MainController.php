<?php

namespace Core\Controllers;

use Core\Controllers\Base\Controller;
use Core\Database\Connection;
use Core\Models\FeedbackModel;
use Core\Routing\Request;

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

    public function addFeedback()
    {
        $model = new FeedbackModel();
        $request = new Request();
        if ($request->isPost() && $model->validate())
        {
            $model->author = $_POST['name'];;
            $model->text = $_POST['text'];;
            $model->save();
        }

        $this->redirect();
    }
}