<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
/**
 * User controller
 */
class UserController extends Controller
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
        $form = new \backend\forms\FetchUserForm();
        $users = $form->fetchAll();
        return $this->render('index', [
            'users' => $users,
        ]);
    }

    public function actionDelete($id)
    {
        $form = new \backend\forms\DeleteUserForm(['id' => $id]);
        if ($form->delete()) {
            $user = $form->getUser();
            Yii::$app->session->setFlash('success', Yii::t('app', 'You have deleted {user} ({id}) successfully', ['user' => $user->username, 'id' => $user->id]));
        } else {
            Yii::$app->session->setFlash('error', $form->getFirstErrorMessage());
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionInactive($id)
    {
        $form = new \backend\forms\InactiveUserForm(['id' => $id]);
        if ($form->inactive()) {
            $user = $form->getUser();
            Yii::$app->session->setFlash('success', Yii::t('app', 'You have disabled {user} ({id}) successfully', ['user' => $user->username, 'id' => $user->id]));
        } else {
            Yii::$app->session->setFlash('error', $form->getFirstErrorMessage());
        }
        return $this->redirect(Yii::$app->request->referrer);
    }
}
