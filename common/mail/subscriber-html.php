<?php
/**
 * @var $channel \common\models\User
 * @var $user \common\models\User
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
            color: #333;
        }
        .container {
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
<div class="container">
    <p>Hello <?= htmlspecialchars($channel->username) ?>,</p>
    <p>We are excited to inform you that <strong><?= \common\helpers\Html::channelLink($user, true) ?></strong> has just subscribed to your channel!</p>
    <p>Thank you for being a part of the MyTube community.</p>
    <p>Best regards,<br>MyTube Team</p>
</div>
<div class="footer">
    <p>If you did not expect this message, please ignore it.</p>
</div>
</body>
</html>
