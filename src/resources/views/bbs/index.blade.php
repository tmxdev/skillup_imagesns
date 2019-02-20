<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>掲示板</title>
</head>
<body>
  <h1>掲示板</h1>
  <!-- エラーメッセージエリア -->
  @if ($errors->any())
    <h2>エラーメッセージ</h2>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif

  <!-- 直前投稿エリア -->
  @isset($name, $comment, $color)
    <h2>直前の投稿</h2>
    <?php
      $name = htmlspecialchars($name);
      echo '名前:<strong>'.$name.'</strong>';
      if ($mail != '') {
        $mail = htmlspecialchars($mail);
        echo '['.$mail.']';
      }
      echo ' '.date('Y/m/d H:i:s');
      $com_colors = ["black", "red", "blue", "green"];
      $comment = htmlspecialchars($comment);
      echo "<p style=\"color:".$com_colors[$color].";\">".nl2br($comment)."</p>";
    ?>
    <br><hr>
  @endisset
  <!-- フォームエリア -->
  <h2>フォーム</h2>
  <form action="/bbs" method="POST">
    <p>
    <input name="name" value="名無しさん">
    <input name="mail" placeholder="xxx@mail.com">
    </p>
    <textarea name="comment" rows="4" cols="70"></textarea>
    <p>
    Text color: <select name="color">
    <option value=0 style="color:black;">Black</option>
    <option value=1 style="color:red;">Red</option>
    <option value=2 style="color:blue;">Blue</option>
    <option value=3 style="color:green;">Green</option>
    </select>
    </p>
    <p>
    {{ csrf_field() }}
    <button class="btn btn-success">送信</button>
    </p>
  </form>
</body>
</html>
