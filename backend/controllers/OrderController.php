<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
/**
 * Order controller
 */
class OrderController extends Controller
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
        $form = new \backend\forms\FetchOrderForm();
        $orders = $form->fetchAll();
        return $this->render('index', [
            'orders' => $orders,
        ]);
    }

    public function actionConfirm($id)
    {
        $form = new \backend\forms\ConfirmOrderForm(['id' => $id]);
        if ($form->confirm()) {
            $order = $form->getOrder();
            Yii::$app->session->setFlash('success', Yii::t('app', 'You have confirmed Order (#{id}) successfully', ['id' => $order->id]));
        } else {
            Yii::$app->session->setFlash('error', $form->getFirstErrorMessage());
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionStart($id)
    {
        $form = new \backend\forms\StartOrderForm(['id' => $id]);
        if ($form->start()) {
            $order = $form->getOrder();
            Yii::$app->session->setFlash('success', Yii::t('app', 'You have started Order (#{id}) successfully', ['id' => $order->id]));
        } else {
            Yii::$app->session->setFlash('error', $form->getFirstErrorMessage());
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionStop($id)
    {
        $form = new \backend\forms\StopOrderForm(['id' => $id]);
        if ($form->start()) {
            $order = $form->getOrder();
            Yii::$app->session->setFlash('success', Yii::t('app', 'You have stopped Order (#{id}) successfully', ['id' => $order->id]));
        } else {
            Yii::$app->session->setFlash('error', $form->getFirstErrorMessage());
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionManualStart()
    {
        $form = new \backend\forms\ManualStartOrderForm();
        if ($form->start()) {
            die('Manual start successfully');
        } else {
            print_r($form);
            die('There is something wrong');
        }
    }
}
