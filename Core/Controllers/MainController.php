<?php

namespace Core\Controllers;

use Core\Controllers\Base\Controller;
use Core\Models\FeedbackModel;
use Core\Repository\FeedbackRepository;
use Core\Routing\Request;

class MainController extends Controller
{
    public function index()
    {
        $repository = new FeedbackRepository();
        $models = $repository->getAll();
        $this->render("main", ["models" => $models]);
    }

    public function addFeedback()
    {
        $model = new FeedbackModel();
        if ($this->request->isPost() && $model->validate())
        {
            $model->author = $_POST['name'];;
            $model->text = $_POST['text'];;
            $model->save();
        }
        $this->redirect();
    }
}