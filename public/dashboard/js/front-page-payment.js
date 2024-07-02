'use strict';

(function () {
  // Variables
  const billingZipCode = document.querySelector('.billings-zip-code'),
    creditCardMask = document.querySelector('.billing-card-mask'),
    expiryDateMask = document.querySelector('.billing-expiry-date-mask'),
    cvvMask = document.querySelector('.billing-cvv-mask'),
    formCheckInputPayment = document.querySelectorAll('.form-check-input-payment');

  // Pincode
  if (billingZipCode) {
    new Cleave(billingZipCode, {
      delimiter: '',
      numeral: true
    });
  }

  if (creditCardMask) {
    new Cleave(creditCardMask, {
      creditCard: true,
      onCreditCardTypeChanged: function (type) {
        if (type != '' && type != 'unknown') {
          document.querySelector('.card-type').innerHTML =
            '<img src="' + assetsPath + 'img/icons/payments/' + type + '-cc.png" height="28"/>';
        } else {
          document.querySelector('.card-type').innerHTML = '';
        }
      }
    });
  }
  // Expiry Date Mask
  if (expiryDateMask) {
    new Cleave(expiryDateMask, {
      date: true,
      delimiter: '/',
      datePattern: ['m', 'y']
    });
  }

  // CVV
  if (cvvMask) {
    new Cleave(cvvMask, {
      numeral: true,
      numeralPositiveOnly: true
    });
  }

  // Toggle CC Payment Method based on selected option
  if (formCheckInputPayment) {
    formCheckInputPayment.forEach(function (paymentInput) {
      paymentInput.addEventListener('change', function (e) {
        const paymentInputValue = e.target.value;
        if (paymentInputValue === 'credit-card') {
          document.querySelector('#form-credit-card').classList.remove('d-none');
        } else {
          document.querySelector('#form-credit-card').classList.add('d-none');
        }
      });
    });
  }
})();
