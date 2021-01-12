<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
/**
 * Wallet controller
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
        $form = new \frontend\forms\FetchWithdrawWalletForm(['user_id' => Yii::$app->user->id]);
        $wallets = $form->validate() ? $form->fetchAll() : [];
        $createForm = new \frontend\forms\CreateWithdrawalForm();
        return $this->render('index', [
            'wallets' => $wallets,
            'createForm' => $createForm
        ]);
    }

    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new \frontend\forms\CreateWithdrawalForm(['user_id' => Yii::$app->user->id]);
        if ($model->load($request->post()) && $model->create()) {
            return $this->redirect(['withdrawal/index']);
        } else {
            die('Error');
        }
    }
}
