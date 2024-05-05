<?php

namespace app\controllers;

use app\models\Event;
use yii\filters\AccessControl;
use yii\web\Controller;

class SiteController extends Controller
{
    public $layout = 'main';

    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['activity', 'events', 'index', 'vacancy'],
                        'roles' => ['?', '@'],
                    ],
                ],
            ],
        ];
    }

    public function actionActivity(): string
    {
        return $this->render('activity');
    }
    public function actionEvents(): string
    {
        return $this->render('events');
    }

    public function actionIndex(): string
    {
        // $this->layout = 'main';
        $events = Event::find()->limit(4)->all();

        return $this->render('index', [
            'events' => $events
        ]);
    }


    public function actionVacancy(): string
    {
        return $this->render('vacancy');
    }

}
