//個数、金額の再計算
document.addEventListener('DOMContentLoaded', () => {
    const cart = document.getElementById('cart');
    const totalQtyElement = document.getElementById('total-qty');
    const totalPriceElement = document.getElementById('total-price');

    cart.addEventListener('change', (e) => {
        if (e.target.classList.contains('item-quantity')) {
            const cartItem = e.target.closest('.cart-item');
            const price = parseInt(cartItem.dataset.price, 10);
            const qty = parseInt(e.target.value, 10);

            // 合計を再計算
            let totalQty = 0;
            let totalPrice = 0;

            document.querySelectorAll('.cart-item').forEach((item) => {
                const itemPrice = parseInt(item.dataset.price, 10);
                const itemQty = parseInt(item.querySelector('.item-quantity').value, 10);
                totalQty += itemQty;
                totalPrice += itemPrice * itemQty;
            });

            // DOMに反映
            totalQtyElement.textContent = `商品合計: ${totalQty}点`;
            totalPriceElement.textContent = `合計金額: ￥${totalPrice}`;
        }
    });
});