<?php
if (isset($_GET['video_url'])) {
    $videoUrl = $_GET['video_url'];

    // Tải nội dung video
    $videoData = @file_get_contents($videoUrl);
    if ($videoData !== false) {
        $filename = 'Video_TikTok_' . time() . '.mp4';

        // Gửi header tải về file
        header('Content-Description: File Transfer');
        header('Content-Type: video/mp4');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Length: ' . strlen($videoData));
        echo $videoData;
        exit;
    } else {
        echo "Lỗi: Không thể tải video.";
    }
} else {
    echo "Lỗi: Không có URL video.";
}
?>
