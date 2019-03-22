<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Email_Confirmation</title>
</head>
<body>
  <h1>Thanks for signing up with weibo app</h1>

  <p>
    Click this link below to activate your account：
    <a href="{{ route('confirm_email', $user->activation_token) }}">
      {{ route('confirm_email', $user->activation_token) }}
    </a>
  </p>

  <p>
    If you're not apply for this, please disregard this email.
  </p>
</body>
</html>
