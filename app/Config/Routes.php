<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', [\App\Controllers\AuthController::class, 'login']);
$routes->post('auth', [\App\Controllers\AuthController::class, 'auth']);
$routes->get('logout', [\App\Controllers\AuthController::class, 'logout']);
$routes->get('dashboard', [\App\Controllers\HomeController::class, 'dashboard'], ['filter' => 'auth']);

$routes->group('product', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', [\App\Controllers\ProductController::class, 'index']);
    $routes->get('create_fee_fixed', [\App\Controllers\ProductController::class, 'create_fee_fixed']);
    $routes->post('store_fee_fixed', [\App\Controllers\ProductController::class, 'store_fee_fixed']);
    $routes->get('create_fee_transfer', [\App\Controllers\ProductController::class, 'create_fee_transfer']);
    $routes->post('store_fee_transfer', [\App\Controllers\ProductController::class, 'store_fee_transfer']);
    $routes->get('create_fee_package', [\App\Controllers\ProductController::class, 'create_fee_package']);
    $routes->post('store_fee_package', [\App\Controllers\ProductController::class, 'store_fee_package']);
});

$routes->group('sales', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', [\App\Controllers\SalesController::class, 'index']);
    $routes->post('search/ajax_result', [\App\Controllers\SalesController::class, 'ajax_result']);
    $routes->get('create/(:num)', [\App\Controllers\SalesController::class, 'create']);
    $routes->post('store_fee_fixed', [\App\Controllers\SalesController::class, 'store_fee_fixed']);
    $routes->post('store_fee_transfer', [\App\Controllers\SalesController::class, 'store_fee_transfer']);
    $routes->post('store_fee_package', [\App\Controllers\SalesController::class, 'store_fee_package']);
    $routes->get('edit/(:num)', [\App\Controllers\SalesController::class, 'edit']);
    $routes->post('update_fee_transfer/(:num)', [\App\Controllers\SalesController::class, 'update_fee_transfer']);
    $routes->post('update_fee_package/(:num)', [\App\Controllers\SalesController::class, 'update_fee_package']);
    $routes->post('update_fee_fixed/(:num)', [\App\Controllers\SalesController::class, 'update_fee_fixed']);
});

$routes->group('purchase', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', [\App\Controllers\PurchaseController::class, 'index']);
    $routes->get('create/(:num)', [\App\Controllers\PurchaseController::class, 'create']);
    $routes->post('search/ajax_result', [\App\Controllers\PurchaseController::class, 'ajax_result']);
    $routes->post('store', [\App\Controllers\PurchaseController::class, 'store']);
});

$routes->group('expense', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', [\App\Controllers\ExpenseController::class, 'index']);
    $routes->get('create', [\App\Controllers\ExpenseController::class, 'create']);
    $routes->post('store', [\App\Controllers\ExpenseController::class, 'store']);
    $routes->get('edit/(:num)', [\App\Controllers\ExpenseController::class, 'edit']);
    $routes->post('update/(:num)', [\App\Controllers\ExpenseController::class, 'update']);
});

$routes->group('income', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', [\App\Controllers\IncomeController::class, 'index']);
    $routes->get('create', [\App\Controllers\IncomeController::class, 'create']);
    $routes->post('store', [\App\Controllers\IncomeController::class, 'store']);
    $routes->get('edit/(:num)', [\App\Controllers\IncomeController::class, 'edit']);
    $routes->post('update/(:num)', [\App\Controllers\IncomeController::class, 'update']);
});

$routes->group('cash', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', [\App\Controllers\CashController::class, 'index']);
    $routes->get('create', [\App\Controllers\CashController::class, 'create']);
    $routes->post('store_cash_open', [\App\Controllers\CashController::class, 'store_cash_open']);
    $routes->post('store_cash_close', [\App\Controllers\CashController::class, 'store_cash_close']);
    $routes->get('melati', [\App\Controllers\CashController::class, 'melati']);
    $routes->get('srengseng', [\App\Controllers\CashController::class, 'srengseng']);
    $routes->post('update_cash_open/(:num)', [\App\Controllers\CashController::class, 'update_cash_open']);
    $routes->post('update_cash_close/(:num)', [\App\Controllers\CashController::class, 'update_cash_close']);
});

$routes->group('balance', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', [\App\Controllers\BalanceController::class, 'index']);
    $routes->post('update_balance/(:num)', [\App\Controllers\BalanceController::class, 'update_balance']);
    $routes->post('get_data_by_id', [\App\Controllers\BalanceController::class, 'get_data_by_id']);
    $routes->get('melati', [\App\Controllers\BalanceController::class, 'melati']);
    $routes->get('srengseng', [\App\Controllers\BalanceController::class, 'srengseng']);
});

$routes->group('adjustment', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', [\App\Controllers\AdjustmentController::class, 'index']);
    $routes->get('create/(:num)', [\App\Controllers\AdjustmentController::class, 'create']);
    $routes->post('store', [\App\Controllers\AdjustmentController::class, 'store']);
});