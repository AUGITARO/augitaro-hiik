<?php /** @noinspection PhpUnused */

namespace app\controllers;

use app\models\Event;
use app\models\forms\SuggestionForm;
use app\services\Suggestion\SuggestionService;
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;

class SiteController extends BaseController
{
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [ '?', '@'],
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
        $event = Event::findOne(Yii::$app->request->get('id'));

        return $this->render('event-page', [
            'event' => $event,
        ]);
    }

    public function actionIndex(): Response|string
    {
        $model = new SuggestionForm();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());

            if ($model->validate() && (new SuggestionService())->create($model)) {
                return $this->refresh();
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
