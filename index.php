<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download</title>
    <style>
        body {
            margin: 0; 
            padding: 0;
            background-image: url("bg2.jpg");
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
            height: 100vh; 
            width: 100vw; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
        }
        .form {
            width: 90%;
            max-width: 400px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            padding: 20px;
            text-align: center;
        }
        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 10px 0 20px;
        }
        .button-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .social-button, button {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            background: linear-gradient(45deg, #8e2de2, #4a00e0);
            transition: all 0.3s ease;
        }
        .social-button:hover, button:hover {
            background: linear-gradient(45deg, #4a00e0, #8e2de2);
            transform: scale(1.05);
        }
        button {
            width: 100%;
            font-size: 18px;
            font-weight: bold;
            padding: 14px;
        }
    </style>
</head>
<body>
    <div class="form">
        <form id="downloadForm" action="Information_Video.php" method="get" >
            <input type="text" name="url" id="url" placeholder="Anh điền link video vào đây hoặc ấn vào Dán link...">
            <button type="button" onclick="pasteLink()">Dán link</button>
        </form>
        <h2>Anh tải video từ nền tảng nào thì chọn vào nền tảng đấy.</h2>
        <div class="button-container">
            <button class="social-button">Facebook</button>
            <button class="social-button">Video YouTube</button>
            <button class="social-button">Mp3 YouTube</button>
            <button onclick="download_Video_Tiktok()" class="social-button">TikTok</button>
        </div>
    </div>
    
    <script>
        function pasteLink() {
            navigator.clipboard.readText().then(text => {
                document.getElementById('url').value = text;
            }).catch(err => {
                console.error('Lỗi khi dán link:', err);
            });
        }
        function download_Video_Tiktok() {
            var url = document.getElementById('url').value;
            if(url==""){
                alert("Vui lòng nhập link video");
            }else{
                document.getElementById('downloadForm').submit();
            }
        }
    </script>
</body>
</html>
