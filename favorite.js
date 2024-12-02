function toggleFavorite(goodsId) {
    const button = document.getElementById(`favorite-${goodsId}`);

    fetch('favorite_action.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ goods_id: goodsId }),
    })
    .then((response) => response.json())
    .then((data) => {
        if (data.success) {
            button.textContent = data.is_favorited ? '★' : '☆';
        } else {
            alert(data.message || 'お気に入りの更新に失敗しました。');
        }
    })
    .catch((error) => {
        console.error('エラー:', error);
    });
}
