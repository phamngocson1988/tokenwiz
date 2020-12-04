<?php
namespace backend\controllers;

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
        $form = new \backend\forms\FetchWalletForm();
        $wallets = $form->fetchAll();
        return $this->render('index', [
            'wallets' => $wallets,
        ]);
    }

    public function actionManualRun()
    {
        $form = new \backend\forms\ManualRunBenefitForm();
        if ($count = $form->run()) {
            die('Manual start successfully: ' . $count);
        } else {
            print_r($form);
            die('There is something wrong');
        }
    }
}
