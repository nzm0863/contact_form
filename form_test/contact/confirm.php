<?php

session_start();
// 二重送信防止用トークンの発行
$token = uniqid('', true);
//トークンをセッション変数にセット
$_SESSION['token'] = $token;

function convert_char( $target ) {
  $target = stripslashes( $target );
  $target = htmlspecialchars( $target, ENT_QUOTES );
  return $target;
}

if (isset($_POST['contact_type']) && is_array($_POST['contact_type'])) {
    $contact_type = implode("、", $_POST["contact_type"]);
}

$name = convert_char( $_POST[ "name" ] );
$huri = convert_char( $_POST[ "huri" ] );
$email = convert_char( $_POST[ "email" ] );
$profession = convert_char( $_POST[ "profession" ] );
$subject = convert_char( $_POST[ "subject" ] );
$zip = convert_char( $_POST[ "zip" ] );
$pref = convert_char( $_POST[ "pref" ] );
$address = convert_char( $_POST[ "address" ] );
$other_address = convert_char( $_POST[ "other_address" ] );
$tel = convert_char( $_POST[ "tel" ] );
$company_menu = convert_char( $_POST[ "company_menu" ] );
$contact_type = convert_char( $contact_type );
$contact_means = convert_char( $_POST[ "contact_means" ] );
$comment = convert_char( $_POST[ "comment" ] );

// 改行
$comment_conv = nl2br( $comment, false );

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<header>
  <div class="wrapper">
      <h1>お問い合わせフォーム</h1>
  </div>
</header>
<div class="wrapper">
    <form action="complete.php" method="post" id="contact_form" class="h-adr">
      <div class="sp100 of_x">
        <table id="contactform_table" class="width81 mb_30">
          <tr>
            <th>お名前</th>
            <td><?php echo $name; ?></td>
          </tr>
          <tr>
            <th>ふりがな</th>
            <td><?php echo $huri; ?></td>
          </tr>
          <tr>
            <th>メールアドレス</th>
            <td><?php echo $email; ?></td>
          </tr>
          <tr>
            <th>ご職業</th>
            <td><?php echo $profession; ?></td>
          </tr>
          <tr>
            <th>件名</th>
            <td><?php echo $subject; ?></td>
          </tr>
          <tr>
            <th>住所</th>
            <td>
              〒<?php echo $zip; ?>
              <br>
              <?php echo $pref; ?>
              <br>
              <?php echo $address; ?>
              <br>
              <?php echo $other_address; ?></td>
          </tr>
          <tr>
            <th>電話番号</th>
            <td><?php echo $tel; ?></td>
          </tr>
          <tr>
            <th>法人様向け</th>
            <td><?php echo $company_menu; ?></td>
          </tr>
          <tr>
            <th>お問い合わせ種別</th>
            <td><?php echo $contact_type; ?></td>
          </tr>
          <tr>
            <th>ご連絡方法</th>
            <td><?php echo $contact_means; ?></td>
          </tr>
          <tr>
            <th>お問い合わせ内容</label></th>
            <td><?php echo $comment_conv; ?></td>
          </tr>
          <tr>
            <th></th>
            <td><input type="button" value="戻る" onclick="history.back()"> <input type="submit" name="Submit" value="送信" id="submit" class="form_btn"></td>
          </tr>
        </table>
      </div>
        <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
        <input type="hidden" name="huri" value="<?php echo $_POST['huri']; ?>">
        <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
        <input type="hidden" name="profession" value="<?php echo $_POST['profession']; ?>">
        <input type="hidden" name="subject" value="<?php echo $_POST['subject']; ?>">
        <input type="hidden" name="zip" value="<?php echo $_POST['zip']; ?>">
        <input type="hidden" name="pref" value="<?php echo $_POST['pref']; ?>">
        <input type="hidden" name="address" value="<?php echo $_POST['address']; ?>">
        <input type="hidden" name="other_address" value="<?php echo $_POST['other_address']; ?>">
        <input type="hidden" name="tel" value="<?php echo $_POST['tel']; ?>">
        <input type="hidden" name="company_menu" value="<?php echo $_POST['company_menu']; ?>">
        <input type="hidden" name="contact_type" value="<?php echo $contact_type; ?>">
        <input type="hidden" name="comment" value="<?php echo $_POST['comment']; ?>">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
    </form>
  </div>

</body>

</html>
