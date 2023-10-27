function rotateCard() {
    const cardInner = document.querySelector('.card-inner');
    cardInner.style.transform = cardInner.style.transform === 'rotateY(180deg)' ? 'rotateY(0deg)' : 'rotateY(180deg)';
}


const cardNumber = document.getElementById('card-number');
const cardName = document.getElementById('card-name');
const cardExpiry = document.getElementById('card-expiry');
const cardCCV = document.getElementById('card-ccv');

function updateCardDetails() {



    document.querySelector('.card-number').textContent = cardNumber.value || '**** **** **** ****';
    document.querySelector('.card-holder').textContent = cardName.value || 'John Doe';
    document.querySelector('.card-expiry').textContent = cardExpiry.value || 'MM/YYYY';
    document.querySelector('.ccv').textContent = cardCCV.value || '***';
}

cardNumber.addEventListener('input', updateCardDetails);
cardName.addEventListener('input', updateCardDetails);
cardExpiry.addEventListener('input', updateCardDetails);
cardCCV.addEventListener('input', updateCardDetails);

cardCCV.addEventListener('focus', () => {
    rotateCard();
});

cardCCV.addEventListener('blur', () => {
    rotateCard();
});








