<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class ProfileController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $request = Yii::$app->request;

        $changePasswordForm = new \frontend\forms\ChangePasswordForm();
        return $this->render('index', [
            'user' => Yii::$app->user->identity,
            'changePasswordForm' => $changePasswordForm,
        ]);
    }

    public function actionUpdatePassword()
    {
        $request = Yii::$app->request;
        if (!$request->isAjax) throw new BadRequestHttpException("Error Processing Request", 1);
        if (!$request->isPost) throw new BadRequestHttpException("Error Processing Request", 1);

        $model = new \frontend\forms\ChangePasswordForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->change()) {
            return json_encode(['status' => true, 'data' => ['message' => Yii::t('app', 'success')]]);
        } else {
            $message = $model->getErrorSummary(true);
            $message = reset($message);
            return json_encode(['status' => false, 'errors' => $message]);
        }
    }

}
