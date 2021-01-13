<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
/**
 * WithdrawalController controller
 */
class WithdrawalController extends Controller
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
        $form = new \backend\forms\FetchWithdrawWalletForm();
        $wallets = $form->validate() ? $form->fetchAll() : [];
        return $this->render('index', [
            'wallets' => $wallets,
        ]);
    }

    public function actionConfirm($id)
    {
        $request = Yii::$app->request;
        $model = new \backend\forms\ConfirmWithdrawalForm(['id' => $id]);
        if ($model->confirm()) {
            return $this->redirect(['withdrawal/index']);
        } else {
            $messages = $model->getFirstErrors();

            die(reset($messages));
        }
    }

    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $model = new \backend\forms\DeleteWithdrawalForm(['id' => $id]);
        if ($model->remove()) {
            return $this->redirect(['withdrawal/index']);
        } else {
            $messages = $model->getFirstErrors();

            die(reset($messages));
        }
    }
}
