<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin Video</title>
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
            color: white;
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
        h2{
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width: 100%;
        }
        .thumbnail {
            border-radius: 10px;
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="form">
        <h1>Download Video TikTok</h1>
        <?php
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://tiktok-video-no-watermark2.p.rapidapi.com/",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "url=" . urlencode($url),
                CURLOPT_HTTPHEADER => [
                    "Content-Type: application/x-www-form-urlencoded",
                    "x-rapidapi-host: tiktok-video-no-watermark2.p.rapidapi.com",
                    "x-rapidapi-key: 23440d752fmsh0bce66bf6c5a2c0p1486cfjsn35a15b05da7d"
                ],
            ]);
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            if ($err) {
                echo "cURL Error #: " . $err;
            } else {
                $result = json_decode($response, true);
                
                if (isset($result['data']['play'])) {
                    $videoUrl = $result['data']['play'];
                } elseif (isset($result['video'])) {
                    $videoUrl = $result['video'];
                } else {
                    echo "<p>Không tìm thấy thông tin video.</p>";
                    print_r($result);
                    exit;
                }

                if (isset($result['data']['title'])) {
                    echo "<h2>" . htmlspecialchars($result['data']['title'], ENT_QUOTES) . "</h2>";

                    if (isset($result['data']['cover'])) {
                        echo "<img src='" . htmlspecialchars($result['data']['cover'], ENT_QUOTES) . "' class='thumbnail'>";
                    }
                }
                
                // Hiển thị nút tải video, nhưng không tải ngay lập tức
                echo "<div class='button-container'>
                        <a class='social-button' href='download.php?video_url=" . urlencode($videoUrl) . "'>Download Video</a>
                    </div>";
            }
        } else {
            echo "<p>Vui lòng nhập URL video.</p>";
        }
        ?>
    </div>
</body>
</html>
