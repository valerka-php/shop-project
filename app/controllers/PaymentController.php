<?php

namespace App\controllers;

use App\models\Payment;
use Framework\helpers\Mailer;
use Framework\helpers\Session;

class PaymentController extends AppController
{
    private Payment $model;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->model = new Payment();
    }


    public function indexAction()
    {
        $purchasedItemsAndPrice = json_decode($_SESSION['cart'], true);

        if (!isset($_SESSION['userEmail'])) {
            Session::set('message', 'Please sign in');
            header('location:/user/login');
        } else {
            $invoice = $this->model->createInvoice($purchasedItemsAndPrice['cart'], $purchasedItemsAndPrice['price']);
            Mailer::sendInvoice($_SESSION['userEmail'], $invoice);
            Session::set('message', 'We sent invoice to email');
        }

        $this->getView('success');
    }


    public function successAction()
    {
        $params = [
            'title' => 'success',
        ];


        $this->getView('success', $params);
    }
}
