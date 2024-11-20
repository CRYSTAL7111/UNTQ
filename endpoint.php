<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $country = isset($data['country']) ? $data['country'] : 'غير محدد';
    $city = isset($data['city']) ? $data['city'] : 'غير محدد';
    $lat = isset($data['lat']) ? $data['lat'] : 'غير محدد';
    $lon = isset($data['lon']) ? $data['lon'] : 'غير محدد';
    $ip = isset($data['ip']) ? $data['ip'] : 'غير محدد';

    $to = "crysto.dic@gmail.com";
    $subject = "بيانات المستخدم الجديد";
    $message = "تم تسجيل دخول مستخدم جديد:\n\n";
    $message .= "الدولة: $country\n";
    $message .= "المدينة: $city\n";
    $message .= "الإحداثيات: $lat, $lon\n";
    $message .= "عنوان IP: $ip\n";

    $headers = "From: no-reply@yourdomain.com";
    if (mail($to, $subject, $message, $headers)) {
        echo "تم إرسال البريد بنجاح.";
    } else {
        echo "فشل في إرسال البريد.";
    }
}
?>
	