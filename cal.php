<!DOCTYPE html>
<html>
<head>
  <title>Calculator</title>
  <style>
    table{
      border: 1px solid black;
      margin: 50px auto;
    }

    input[type="button"], input[type="submit"]{
      width: 100%;
      padding: 20px;
      background-color: blue;
      color: white;
      font-size: 20px;
      border-radius: 5px;
      border: none;
      cursor: pointer;
    }

    input[type="text"]{
      padding: 20px;
      font-size: 20px;
      font-weight: bold;
      text-align: right;
      width: 100%;
      box-sizing: border-box;
    }

    #php-result{
      text-align: center;
      font-size: 24px;
      margin-top: 20px;
    }
  </style>
</head>

<body>

<?php
$result = "";

// Function + control statements
function calculate($num1, $num2, $operator){
  if($operator == "+"){
    return $num1 + $num2;
  }
  elseif($operator == "-"){
    return $num1 - $num2;
  }
  elseif($operator == "*"){
    return $num1 * $num2;
  }
  elseif($operator == "/"){
    if($num2 != 0){
      return $num1 / $num2;
    } else {
      return "Cannot divide by zero";
    }
  }
  else{
    return "Invalid Operator";
  }
}

// Read expression and calculate
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $expression = $_POST["expression"] ?? "";
  $expression = str_replace(" ", "", $expression);

  if(strpos($expression, "+") !== false){
    $operator = "+";
  }
  elseif(strpos($expression, "-") !== false){
    $operator = "-";
  }
  elseif(strpos($expression, "*") !== false){
    $operator = "*";
  }
  elseif(strpos($expression, "/") !== false){
    $operator = "/";
  }
  else{
    $operator = "";
  }

  if($operator != ""){
    $parts = explode($operator, $expression, 2);

    if(count($parts) == 2 && $parts[0] !== "" && $parts[1] !== ""){
      $num1 = (float)$parts[0];
      $num2 = (float)$parts[1];
      $result = calculate($num1, $num2, $operator);
    } else {
      $result = "Invalid Expression";
    }
  } else {
    $result = "Invalid Expression";
  }
}
?>

<form method="post">
  <table>
    <tr>
      <td colspan="4">
        <input type="text" name="expression" id="result"
               value="<?php echo htmlspecialchars($_POST['expression'] ?? ''); ?>">
      </td>
    </tr>

    <tr>
      <td><input type="button" value="1" onclick="dis('1')"></td>
      <td><input type="button" value="2" onclick="dis('2')"></td>
      <td><input type="button" value="3" onclick="dis('3')"></td>
      <td><input type="button" value="/" onclick="dis('/')"></td>
    </tr>

    <tr>
      <td><input type="button" value="4" onclick="dis('4')"></td>
      <td><input type="button" value="5" onclick="dis('5')"></td>
      <td><input type="button" value="6" onclick="dis('6')"></td>
      <td><input type="button" value="*" onclick="dis('*')"></td>
    </tr>

    <tr>
      <td><input type="button" value="7" onclick="dis('7')"></td>
      <td><input type="button" value="8" onclick="dis('8')"></td>
      <td><input type="button" value="9" onclick="dis('9')"></td>
      <td><input type="button" value="-" onclick="dis('-')"></td>
    </tr>

    <tr>
      <td><input type="button" value="0" onclick="dis('0')"></td>
      <td><input type="button" value="." onclick="dis('.')"></td>
      <td><input type="button" value="+" onclick="dis('+')"></td>
      <td><input type="submit" value="="></td>
    </tr>

    <tr>
      <td colspan="4"><input type="button" value="C" onclick="clr()"></td>
    </tr>
  </table>
</form>

<?php if($result != ""): ?>
  <div id="php-result">Result: <?php echo htmlspecialchars((string)$result); ?></div>
<?php endif; ?>

<script>
  function dis(val){
    document.getElementById("result").value += val;
  }

  function clr(){
    document.getElementById("result").value = "";
  }
</script>

</body>
</html>
