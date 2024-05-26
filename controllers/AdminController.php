<?php /** @noinspection PhpUnused */

namespace app\controllers;

use app\models\forms\EventForm;
use app\services\Event\EventService;
use app\services\Token\TokenService;
use Yii;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\web\UploadedFile;

class AdminController extends BaseController
{
    const TOKEN_COUNT = 10;
    const FLASH_KEY = 'eventCreated';
    const PASSWORD = 'amogus';

    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'create-event'],
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['generate-token'],
                        'roles' => ['?', '@'],
                        'matchCallback' => function () {
                            return Yii::$app->request->get('password') === self::PASSWORD;
                        }
                    ],
                ],
            ],
        ];
    }

    public function actionIndex(): string
    {
        $flashMessage = Yii::$app->session->getFlash(self::FLASH_KEY);

        return $this->render('admin-panel', [
            'flashMessage' => $flashMessage,
        ]);
    }

    public function actionCreateEvent(): Response|string
    {
        $model = new EventForm();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            if ($model->validate() && (new EventService())->create($model)) {
                Yii::$app->session->setFlash(
                    self::FLASH_KEY,
                    "Вы успешно создали мероприятие $model->title"
                );
                return $this->redirect(['admin/index']);
            }
        }

        return $this->render('create-event', [
            'model' => $model,
        ]);
    }

    /**
     * @throws Exception
     */
    public function actionGenerateToken(): string
    {
        $count = Yii::$app->request->get('count', self::TOKEN_COUNT);
        $resultCount = (new TokenService())->createMany($count);
        return "Вы успешно создали $resultCount токенов";
    }
}
