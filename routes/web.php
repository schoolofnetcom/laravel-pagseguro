<?php

use App\PagSeguro\PagSeguro;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/checkout/success', function () {
    return 'Pagamento efetuado com sucesso!';
});

Route::get('/checkout/{id}', function ($id) {
    $data = [];
    $data['email'] = 'erik.figueiredo@gmail.com';
    $data['token'] = 'E7EF160DE74646CE80AB18EDDA257F1B';

    $response = (new PagSeguro)->request(PagSeguro::SESSION_SANDBOX, $data);

    $session = new \SimpleXMLElement($response->getContents());
    $session = $session->id;

    $amount = number_format(521.50, 2, '.', '');

    return view('store.checkout', compact('id', 'session', 'amount'));
});

Route::post('/checkout/{id}', function ($id) {
    $data = request()->all();
    unset($data['_token']);

    $data['email'] = 'erik.figueiredo@gmail.com';
    $data['token'] = 'E7EF160DE74646CE80AB18EDDA257F1B';
    $data['paymentMode'] = 'default';
    $data['paymentMethod'] = 'creditCard';
    $data['receiverEmail'] = 'erik.figueiredo@gmail.com';
    $data['currency'] = 'BRL';

    $data['senderAreaCode'] = substr($data['senderPhone'], 0, 2);
    $data['senderPhone'] = substr($data['senderPhone'], 2, strlen($data['senderPhone']));

    $data['creditCardHolderAreaCode'] = substr($data['creditCardHolderPhone'], 0, 2);
    $data['creditCardHolderPhone'] = substr($data['creditCardHolderPhone'], 2, strlen($data['creditCardHolderPhone']));

    $data['installmentValue'] = number_format($data['installmentValue'], 2, '.', '');
    $data['shippingAddressCountry'] = 'BR';
    $data['billingAddressCountry'] = 'BR';

    try {
        $response = (new PagSeguro)->request(PagSeguro::CHECKOUT_SANDBOX, $data);
    } catch (\Exception $e) {
        dd($e->getMessage());
    }

    //return $data;
    return ['status'=>'success'];
});
