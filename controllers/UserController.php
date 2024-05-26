<?php /** @noinspection PhpUnused */

namespace app\controllers;

use app\models\forms\LoginForm;
use app\models\forms\SignupForm;
use app\models\User;
use app\services\User\UserService;
use Throwable;
use Yii;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\web\Response;

class UserController extends BaseController
{

    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionLogin(): Response|string
    {
        $model = new LoginForm();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            if ($model->validate() && $identity = User::findOne(['login' => $model->login])) {
                Yii::$app->user->login($identity);
                return $this->redirect(['admin/index']);
            }
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout(): Response
    {
        Yii::$app->user->logout();
        return $this->redirect(['user/login']);
    }

    /**
     * @throws Exception
     * @throws Throwable
     * @throws \yii\db\Exception
     */
    public function actionSignup(): Response|string
    {
        $model = new SignupForm();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());

            if ($model->validate() && (new UserService())->create($model)) {
                return $this->redirect(['user/login']);
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
}
