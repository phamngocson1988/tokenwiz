<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
/**
 * Wallet controller
 */
class WalletController extends Controller
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
        $form = new \frontend\forms\FetchWalletForm(['user_id' => Yii::$app->user->id]);
        $wallets = $form->validate() ? $form->fetchAll() : [];
        return $this->render('index', [
            'wallets' => $wallets,
        ]);
    }
}
