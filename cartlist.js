document.addEventListener('DOMContentLoaded', () => {
    // カート内の商品のリストを監視
    const cartItems = document.querySelectorAll('.cart-item');
    const totalQtyElement = document.getElementById('total-qty');
    const totalPriceElement = document.getElementById('total-price');

    // セレクトボックスの変更を監視
    cartItems.forEach((cartItem) => {
        const quantitySelect = cartItem.querySelector('.item-quantity');
        quantitySelect.addEventListener('change', () => {
            // 個別商品の価格と選択された個数を取得
            const price = parseInt(cartItem.dataset.price, 10);
            const qty = parseInt(quantitySelect.value, 10);
            const goodsId = cartItem.dataset.goodsId; // 商品IDの取得

            // AJAXでデータベースを更新
            updateCartQuantity(goodsId, qty);

            // 合計金額と合計個数を再計算
            let totalQty = 0;
            let totalPrice = 0;

            document.querySelectorAll('.cart-item').forEach((item) => {
                const itemPrice = parseInt(item.dataset.price, 10);
                const itemQty = parseInt(item.querySelector('.item-quantity').value, 10);
                totalQty += itemQty;
                totalPrice += itemPrice * itemQty;
            });

            // DOMに新しい値を反映
            totalQtyElement.textContent = `商品合計: ${totalQty}点`;
            totalPriceElement.textContent = `合計金額: ￥${totalPrice}`;
        });
    });

    // AJAXで数量を更新する関数
    function updateCartQuantity(goodsId, qty) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_cart.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // 必要な場合はレスポンスを処理
                console.log('Cart updated successfully');
            }
        };
        // 商品IDと数量をPOSTで送信
        xhr.send('goods_id=' + goodsId + '&qty=' + qty);
    }
});

