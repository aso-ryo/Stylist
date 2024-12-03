function toggleFavorite(goodsId) {
    const button = document.getElementById(`favorite-${goodsId}`);

    fetch('G6.php', { // 同じファイルに送信
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ goods_id: goodsId, action: 'toggle'}),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            button.textContent = data.is_favorited ? '★' : '☆';
        } else {
            alert(data.message || 'お気に入りの更新に失敗しました。');
        }
    })
    .catch(error => {
        console.error('エラー:', error);
    });
}