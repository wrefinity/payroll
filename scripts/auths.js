document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("loginForm").addEventListener("submit", function (e) {
        e.preventDefault();
        const url = './routes/auths.php';
        const formData = new FormData(this);
        formData.append('action', 'login');
        
        fetch(url, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert('Login successful!');
                window.location.href = './views/dashboard.php';
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
