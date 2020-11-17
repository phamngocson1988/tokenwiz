<?php
namespace frontend\forms;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use common\models\Product;
use common\models\Order;

class OrderPaymentForm extends Model
{
    public $product_id;
    public $quantity;

    protected $_product;

    public function init()
    {
        $this->quantity = 1;
        $list = $this->fetchProducts();
        $productIds = array_keys($list);
        $this->product_id = reset($productIds);
    }

    public function rules()
    {
        return [
            [['product_id', 'quantity'], 'required'],
            ['product_id', 'validateProduct']
        ];
    }

    public function validateProduct($attribute, $params = [])
    {
        $product = $this->getProduct();
        if (!$product) {
            $this->addError($attribute, 'Please choose a plan');
        }
    }

    public function getProduct()
    {
        if (!$this->_product) {
            $this->_product = Product::findOne($this->product_id);
        }
        return $this->_product;
    }

    public function getUser()
    {
        return Yii::$app->user->getIdentity();
    }


    public function purchase()
    {
        // Create order
        $connection = Yii::$app->db;
        $transaction = $connection->beginTransaction();
        try {
            $product = $this->getProduct();
            $quantity = (int)$this->quantity;
            $total = $this->getTotalPrice();
            $user = $this->getUser();

            $order = new Order();
            $order->product_id = $product->id;
            $order->quantity = $quantity;
            $order->price = $product->price;
            $order->total_price = $total;
            $order->status = Order::STATUS_TEMPORARY;
            $order->user_id = $user->id;
            $id = $order->save();
            $transaction->commit();
            return $id;
        } catch(Exception $e) {
            $transaction->rollback();
            $this->addError('cart', $e->getMessage());
            return false;
        }

    }

    public function getTotalPrice()
    {
        $product = $this->getProduct();
        return $product->getPrice() * (int)$this->quantity;
    }

    public function fetchProducts()
    {
        $products = Product::find()->all();
        $list = ArrayHelper::map($products, 'id', function($obj) {
            return sprintf('
                <span class="pay-title">
                    <em class="pay-icon fas fa-dollar-sign"></em>
                    <span class="pay-cur">%s</span>
                </span>
                <span class="pay-amount">%s</span>
                ', $obj->name, number_format($obj->price));
        });
        return $list;
    }
}