//カートに入れるときのメッセージ表示
document.addEventListener('DOMContentLoaded', function () {
    const messageBox = document.getElementById("message-box");
    if (messageBox) {
        setTimeout(() => {
            messageBox.style.display = 'none'; // 数秒後に非表示
        }, 3000); // 3000ミリ秒（3秒）
    }
});


