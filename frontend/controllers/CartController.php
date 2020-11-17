<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\forms\OrderPaymentForm;

class CartController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['purchase'],
                'rules' => [
                    [
                        'actions' => ['purchase'],
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
        $checkoutForm = new OrderPaymentForm();
        return $this->render('index', ['checkoutForm' => $checkoutForm]);
    }

    public function actionCalculate() 
    {
        $request = Yii::$app->request;
        if (!$request->isAjax) throw new BadRequestHttpException("Error Processing Request", 1);
        if (!$request->isPost) throw new BadRequestHttpException("Error Processing Request", 1);

        $model = new OrderPaymentForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $amount = $model->getTotalPrice();
            return $this->asJson(['status' => true, 'data' => [
                'amount' => number_format($amount),
            ]]);
        } else {
            $message = $model->getErrorSummary(true);
            $message = reset($message);
            return $this->asJson(['status' => false, 'errors' => $message]);
        }
    }

    public function actionPurchase() 
    {
        $request = Yii::$app->request;
        if (!$request->isAjax) throw new BadRequestHttpException("Error Processing Request", 1);
        if (!$request->isPost) throw new BadRequestHttpException("Error Processing Request", 1);

        $model = new OrderPaymentForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $id = $model->purchase()) {
            return $this->asJson(['status' => true, 'data' => ['id' => $id]]);
        } else {
            $message = $model->getErrorSummary(true);
            $message = reset($message);
            return $this->asJson(['status' => false, 'errors' => $message]);
        }
    }
}
