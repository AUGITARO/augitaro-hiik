<?php

namespace app\controllers;

use app\models\Event;
use app\models\forms\SuggestionForm;
use app\models\Suggestion;
use yii\filters\AccessControl;
use yii\web\Controller;
use Yii;
use yii\web\Response;

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
                        'actions' => ['activity', 'events', 'index', 'vacancy', 'event-page'],
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

    public function actionEventPage(): string
    {
        $event = Event::findOne(['id' => Yii::$app->request->get('id') ]);

        return $this->render('event-page', [
            'event' => $event,
        ]);
    }

    public function actionIndex(): Response|string
    {
        $model = new SuggestionForm();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());

            if ($model->validate()) {
                $suggestion = new Suggestion();

                $suggestion->username = $model->username;
                $suggestion->email = $model->email;
                $suggestion->message = $model->message;

                if ($suggestion->save()) {
                    return $this->refresh();
                }
            }
        }

        $events = Event::find()->limit(4)->all();

        return $this->render('index', [
            'events' => $events,
            'model' => $model,
        ]);
    }


    public function actionVacancy(): string
    {
        return $this->render('vacancy');
    }

}
