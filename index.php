<?php

use App\Controllers\IncomesController;
use App\Controllers\WithdrawalsController;
use App\Enums\IncomeTypeEnum;
use App\Enums\PaymentMethodEnum;
use App\Enums\WithdrawalTypeEnum;

require("vendor/autoload.php");

/*
$incomes_controller = new IncomesController();
$incomes_controller->store([
    "payment_method" => PaymentMethodEnum::BankAccount->value,
    "type" => IncomeTypeEnum::Salary->value,
    "date" => date("Y-m-d H:i:s"),
    "amount" => 100,
    "description" => "Pago de salario por mi arduo y muy buen trabajo",
]);*/

/*
$withdrawal_controller = new WithdrawalsController();
$withdrawal_controller->store([
    "payment_method" => PaymentMethodEnum::CreditCard->value,
    "type" => WithdrawalTypeEnum::Purchase->value,
    "date" => date("Y-m-d H:i:s"),
    "amount" => 500,
    "description" => "Compré jugetitos para mis queridas mascotas aaaaaa."
]); */
/*
$withdrawal_controller = new WithdrawalsController();
$withdrawal_controller -> index();*/

/*
$withdrawal_controller = new WithdrawalsController();
$withdrawal_controller -> show(4);
*/
/*
$incomes_controller = new IncomesController();
$incomes_controller->index();
*/


$incomes_controller = new IncomesController();
$incomes_controller->destroy(11);


/*
$incomes_controller = new IncomesController();
$incomes_controller->update([
    "payment_method" => PaymentMethodEnum::CreditCard->value,
    "type" => WithdrawalTypeEnum::Purchase->value,
    "date" => date("Y-m-d 05:30:44"),
    "amount" => 50,
    "description" => "Pago de salario"
], 8); */
