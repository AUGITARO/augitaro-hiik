<?php /** @noinspection PhpUnused */

namespace app\controllers;

use app\models\Event;
use app\models\forms\SuggestionForm;
use app\models\Vacancy\Vacancy;
use app\services\Event\EventService;
use app\services\Suggestion\SuggestionService;
use app\services\Vacancy\VacancyService;
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;

class SiteController extends BaseController
{
    const DEF_COUNT = 4;
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
        $count = intval(Yii::$app->request->get('count', self::DEF_COUNT));
        $events = (new EventService)->findEvents($count);
        $newCount = $count + self::DEF_COUNT;

        return $this->render('events', [
            'events' => $events,
            'newCount' => $newCount,
        ]);
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
        $count = intval(Yii::$app->request->get('count', self::DEF_COUNT));
        $vacancies = (new VacancyService)->findVacancies($count);
        $newCount = $count + self::DEF_COUNT;

        return $this->render('vacancy', [
            'vacancies' => $vacancies,
            'newCount' => $newCount,
        ]);
    }

    public function actionVacancyPage(): string
    {
        $vacancy = Vacancy::findOne(Yii::$app->request->get('id'));

        return $this->render('vacancy-page', [
            'vacancy' => $vacancy,
        ]);
    }
}
