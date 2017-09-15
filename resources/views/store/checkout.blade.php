@extends('layouts.default')

@section('content')
    <h2 class="header">Checkout</h2>

    <ul class="tabs tabs-fixed-width">
        <li class="tab"><a href="#step1">Suas informações</a></li>
        <li class="tab"><a href="#step2">Entrega</a></li>
        <li class="tab"><a href="#step3">Pagamento</a></li>
    </ul>

    <form action="/checkout/{{ $id }}" method="post" id="form">

        {{ csrf_field() }}

        <input type="hidden" name="itemId1" value="0001">
        <input type="hidden" name="itemDescription1" value="Produto PagSeguroI">
        <input type="hidden" name="itemAmount1" value="250.00">
        <input type="hidden" name="itemQuantity1" value="2">

        <div id="step1">
            <input type="hidden" name="senderHash" id="senderHash">

            <p>Preencha suas informações</p>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" id="senderName" name="senderName">
                    <label for="senderName">Nome completo</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="senderCPF" name="senderCPF">
                    <label for="senderCPF">cpf</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" id="senderEmail" name="senderEmail">
                    <label for="senderEmail">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 offset-s3">
                    <input type="text" id="senderPhone" name="senderPhone">
                    <label for="senderPhone">Telefone</label>
                </div>
            </div>
        </div>
        <div id="step2">
            <p>Informe os dados para entrega</p>

            <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="shippingAddressPostalCode" name="shippingAddressPostalCode">
                    <label for="shippingAddressPostalCode">CEP</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" id="shippingAddressStreet" name="shippingAddressStreet">
                    <label for="shippingAddressStreet">Logradouro</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="shippingAddressNumber" name="shippingAddressNumber">
                    <label for="shippingAddressNumber">Número</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" id="shippingAddressComplement" name="shippingAddressComplement">
                    <label for="shippingAddressComplement">Complemento</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="shippingAddressDistrict" name="shippingAddressDistrict">
                    <label for="shippingAddressDistrict">Bairro</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" id="shippingAddressCity" name="shippingAddressCity">
                    <label for="shippingAddressCity">Cidade</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="shippingAddressState" name="shippingAddressState">
                    <label for="shippingAddressState">Estado</label>
                </div>
                <div class="col s6">
                    <input type="hidden" name="shippingCost" value="21.50">
                    <select name="shippingType" id="shippingType" class="browser-default">
                        <option disabled selected>Forma de Entrega</option>
                        <option value="1">Encomenta normal (PAC)</option>
                        <option value="2">SEDEX</option>
                        <option value="3">Tipo de frete não especificado</option>
                    </select>
                    <label for="shippingType">Forma de entrega</label>
                </div>
            </div>

        </div>
        <div id="step3">
            <p>Preencha os dados para pagamento</p>

            <input type="hidden" name="creditCardToken" id="creditCardToken">
            <input type="hidden" name="installmentValue" id="installmentValue">

            <div class="row">
                <div class="input-field col s9">
                    <input type="text" id="cardNumber">
                    <label for="cardNumber">Número do cartão</label>
                    <div id="card_brand"></div>
                </div>
                <div class="input-field col s3">
                    <input type="text" id="cvv">
                    <label for="cvv">Código de segurança</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s4">
                    <input type="text" id="expirationMonth">
                    <label for="expirationMonth">Mês de expiração</label>
                </div>
                <div class="input-field col s4">
                    <input type="text" id="expirationYear">
                    <label for="expirationYear">Ano de expiração</label>
                </div>
                <div class="col s4">
                    <select name="installmentQuantity" id="installmentQuantity" class="browser-default">
                        <option disabled selected>Parcelamento</option>
                    </select>
                </div>
            </div>

            <p>Dados do dono do cartão</p>

            <p>
                <input type="checkbox" id="copy_from_me">
                <label for="copy_from_me">Copiar seus dados</label>
            </p>

            <div id="holder_data">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="creditCardHolderName" name="creditCardHolderName">
                        <label for="creditCardHolderName">Nome completo</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="creditCardHolderCPF" name="creditCardHolderCPF">
                        <label for="creditCardHolderCPF">cpf</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="creditCardHolderPhone" name="creditCardHolderPhone">
                        <label for="creditCardHolderPhone">Telefone</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="creditCardHolderBirthDate" name="creditCardHolderBirthDate">
                    <label for="creditCardHolderBirthDate">Data de nascimento</label>
                </div>
            </div>

            <p>Endereço da fatura</p>

            <p>
                <input type="checkbox" id="copy_from_shipping">
                <label for="copy_from_shipping">Copiar do endereço de entrega</label>
            </p>

            <div id="shipping_data">
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="billingAddressPostalCode" name="billingAddressPostalCode">
                        <label for="billingAddressPostalCode">CEP</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="billingAddressStreet" name="billingAddressStreet">
                        <label for="billingAddressStreet">Logradouro</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="billingAddressNumber" name="billingAddressNumber">
                        <label for="billingAddressNumber">Número</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="billingAddressComplement" name="billingAddressComplement">
                        <label for="billingAddressComplement">Complemento</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="billingAddressDistrict" name="billingAddressDistrict">
                        <label for="billingAddressDistrict">Bairro</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="billingAddressCity" name="billingAddressCity">
                        <label for="billingAddressCity">Cidade</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="billingAddressState" name="billingAddressState">
                        <label for="billingAddressState">Estado</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input type="submit" value="pagar" class="btn">
                </div>
            </div>
        </div>
    </form>

    <div id="payment_methods" class="center-align"></div>
@endsection

@section('script')

<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script src="/js/pagseguro.js"></script>
<script>
    const paymentData = {
        brand: '',
        amount: {{ $amount }},
    }

    PagSeguroDirectPayment.setSessionId('{!! $session !!}');

    pagSeguro.getPaymentMethods(paymentData.amount)
        .then(function (urls) {
            let html = '';

            urls.forEach(function (url) {
                html += '<img src="' + url + '" class="credit_card">'
            });

            $('#payment_methods').html(html);
        });
    
    $('#senderName').on('change', function () {
        pagSeguro.getSenderHash().then(function(data) {
            $('#senderHash').val(data);
        })
    });

    $('#shippingAddressPostalCode').on('keyup', function () {
        let cep = $(this).val();

        if (cep.length == 8) {
            $.get('https://viacep.com.br/ws/' + cep + '/json/')
                .then(function (res) {
                    $('#shippingAddressDistrict').val(res.bairro);
                    $('#shippingAddressCity').val(res.localidade);
                    $('#shippingAddressStreet').val(res.logradouro);
                    $('#shippingAddressState').val(res.uf);
                    Materialize.updateTextFields();
                })
        }
    });

    $('#cardNumber').on('keyup', function() {
        if ($(this).val().length >= 6) {
            let bin = $(this).val();
            pagSeguro.getBrand(bin)
                .then(function (res) {
                    paymentData.brand = res.result.brand.name;
                    $('#card_brand').html('<img src="' + res.url + '" class="credit_card">')
                    return pagSeguro.getInstallments(paymentData.amount, paymentData.brand);
                })
                .then(function(res) {
                    let html = '';
                    res.forEach(function (item) {
                        html += '<option value="' + item.quantity + '">' + item.quantity + 'x R$' + item.installmentAmount + ' - total R$' + item.totalAmount + '</option>'
                    });
                    $('#installmentQuantity').html(html);
                    $('#installmentValue').val(res[0].installmentAmount);
                    $('#installmentQuantity').on('change', function () {
                        let value = res[$('#installmentQuantity').val() - 1].installmentAmount;
                        $('#installmentValue').val(value);
                    });
                })
        }
    });

    $('#form').on('submit', function (e) {
        e.preventDefault();
        let params = {
            cardNumber: $('#cardNumber').val(),
            cvv: $('#cvv').val(),
            cardNumber: $('#cardNumber').val(),
            expirationMonth: $('#expirationMonth').val(),
            expirationYear: $('#expirationYear').val(),
            brand: paymentData.brand
        }
        pagSeguro.createCardToken(params).then(function (token) {
            $('#creditCardToken').val(token);

            let url = $('#form').attr('action');
            let data = $('#form').serialize();
            $.post(url, data).then(function () {
                window.location = '/checkout/success';
            });
        });
    });

    let toggle = function(element, verification, callbackShow, callbackHide) {
        if (!verification.is(':checked')) {
            $(element).show();
            callbackShow()
        } else {
            $(element).hide();
            callbackHide();
        }
    }

    let holderShow = function () {
        $('#creditCardHolderName').val('');
        $('#creditCardHolderCPF').val('');
        $('#creditCardHolderPhone').val('');
    }
    let holderHide = function () {
        $('#creditCardHolderName').val($('#senderName').val());
        $('#creditCardHolderCPF').val($('#senderCPF').val());
        $('#creditCardHolderPhone').val($('#senderPhone').val());
    }

    let shippingShow = function () {
        $('#billingAddresPostalCode').val('');
        $('#billingAddressStreet').val('');
        $('#billingAddressNumber').val('');
        $('#billingAddressComplement').val('');
        $('#billingAddressDistrict').val('');
        $('#billingAddressCity').val('');
        $('#billingAddressState').val('');
    }
    let shippingHide = function () {
        $('#billingAddressPostalCode').val($('#shippingAddressPostalCode').val());
        $('#billingAddressStreet').val($('#shippingAddressStreet').val());
        $('#billingAddressNumber').val($('#shippingAddressNumber').val());
        $('#billingAddressComplement').val($('#shippingAddressComplement').val());
        $('#billingAddressDistrict').val($('#shippingAddressDistrict').val());
        $('#billingAddressCity').val($('#shippingAddressCity').val());
        $('#billingAddressState').val($('#shippingAddressState').val());
    }

    toggle('#holder_data', $(this), holderShow, holderHide)
    toggle('#shipping_data', $(this), shippingShow, shippingHide)

    $('#copy_from_me').on('change', function() {
        toggle('#holder_data', $(this), holderShow, holderHide)
    });

    $('#copy_from_shipping').on('change', function() {
        toggle('#shipping_data', $(this), shippingShow, shippingHide)
    });
</script>
@endsection