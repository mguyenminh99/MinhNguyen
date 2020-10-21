<?php
require_once 'controllers/Controller.php';
require_once 'models/Detail.php';
class HomebackendController extends Controller{
    public function index(){
        $model_detail = new Detail();
        $count_orders = $model_detail->countOrder();
        $day_income = $model_detail->dayIncome(date("Y-m-d"));
        $month_income = $model_detail->monthIncome();
        $this->content = $this->render('views/homes/backend_home.php',[
            'count_orders' => $count_orders,
            'day_income' => $day_income,
            'month_income' => $month_income
        ]);
        require_once 'views/layouts/main.php';
    }
}