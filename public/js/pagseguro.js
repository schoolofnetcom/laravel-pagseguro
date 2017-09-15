const pagSeguro = {
    creditCards: {},
    getBrand: function (bin) {
        return new Promise(function(resolve, reject) {
            PagSeguroDirectPayment.getBrand({
                cardBin: bin,
                success: function(res) {
                    let brand = pagSeguro.creditCards[res.brand.name.toUpperCase()];
                    let url = brand.images.MEDIUM.path;
                    resolve({
                        result: res,
                        url: 'https://stc.pagseguro.uol.com.br/' + url
                    });
                }
            });
        });
    },
    getPaymentMethods: function (amount) {
        return new Promise(function (resolve, reject) {
            PagSeguroDirectPayment.getPaymentMethods({
                amount: amount,
                success: function (res) {
                    let creditCards = pagSeguro.creditCards = res.paymentMethods.CREDIT_CARD.options;
                    let brandsUrls = [];

                    Object.keys(creditCards).forEach(function(key) {
                        let url = creditCards[key].images.MEDIUM.path;
                        brandsUrls.push('https://stc.pagseguro.uol.com.br/' + url);
                    });

                    resolve(brandsUrls)
                }
            });
        });
    },
    createCardToken: function (params) {
        return new Promise(function (resolve, reject) {
            params.success = function (response) {
                resolve(response.card.token);
            }

            PagSeguroDirectPayment.createCardToken(params);
        });
    },
    getInstallments: function (amount, brand) {
        return new Promise(function (resolve, reject) {
            PagSeguroDirectPayment.getInstallments({
                amount: amount,
                maxInstallmentNoInterest: 0,
                brand: brand,
                success: function (res) {
                    resolve(res.installments[brand]);
                }
            })
        });
    },
    getSenderHash: function() {
        return new Promise(function (resolve, reject) {
            let data = PagSeguroDirectPayment.getSenderHash();
            resolve(data);
        }); 
    }
}