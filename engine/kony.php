<?php
date_default_timezone_set('US/Central');
session_start();
// Create connection
function connect() {
  $servername = 'localhost';
  $username = 'my_username';
  $password = 'my_password';
  $dbname = 'my_dbname';
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if ($conn->connect_errno) {
    include_once 'includes/error.php';
    die();
  }
return $conn;
}

function doError() {
  echo 'There was a fly, a flea, and a flu.<br/>They were in prison, so what could they do?<br/>"Let us fly!" said the flea.<br/>"Let us flee!" said the fly.<br/>So they flew through a flaw in the flue.<br/> - <i>Unknown</i>';
  die();
}

function pullRecentCode() {
  $conn = connect();
  $sql = 'select code from codes where date = (select max(date) from codes)';
  $result = $conn->query($sql);
  if ($result && $row = mysqli_fetch_row($result)) {
    $code = gzuncompress($row[0]);
    mysqli_free_result($result);
    $conn->close();
    return $code;
  }
  return 'kony is wrong';
}

function pullRecentBlobCode() {
  $conn = connect();
  $sql = 'select code from codes where id = (select max(id) from codes)';
  $result = $conn->query($sql);
  if ($result && $row = mysqli_fetch_row($result)) {
    $code = $row[0];
    mysqli_free_result($result);
    $conn->close();
    return $code;
  }
  return 'kony is wrong';
}


function store($code, $field) {
  $conn = connect();
  // Check connection
  if (!$conn->connect_error) {
    $compressed = mysqli_real_escape_string($conn,gzcompress(htmlspecialchars($code)));
    $sql = 'insert into codes ('. $field .', ip, date) VALUES ("' . $compressed . '","' . get_client_ip() . '","' . date("Y-m-d H:i:s", time()) . '")';
    if (!$conn->query($sql)) {
      doError();
    }
    $conn->close();
  }
}

function register($username, $email, $password) {
  $conn = connect();
  if (!$conn->connect_error) {
    $username = mysqli_real_escape_string($conn,$username);
    $email = mysqli_real_escape_string($conn,$email);
    $sql = 'insert into users (username, email, password) VALUES ("' . $username. '","' . $email . '","' . crypt($password) . '")';
    if ($conn->query($sql)) {
      $conn->close();
      $conn = connect();
      $sql = 'select * from users where username = "' . $username . '" & password = "' . crypt($password) . '"';
      $result = $conn->query($sql);
      if ($result && $row = mysqli_fetch_row($result)) {
        $_SESSION['user'] = array('id' => $row[0], 'name' => $row[1], 'fresh' => true);
        mysqli_free_result($result);
        $conn->close();
        return true;
      }
    }
  }
  doError();
}

function getInfo() {
  $conn = connect();
  $sql = 'select * from codes order by date desc';
  $result = mysqli_query($conn,$sql);
  while ($result && $row = mysqli_fetch_row($result)) {
    echo '<tr><td>'. $row[0] . '</td><td style="max-width:800px"><textarea class="codemir">' . gzuncompress($row[1]) . '</textarea></td><td>' . $row[2] . '</td></tr>';
  }
  mysqli_free_result($result);
  $conn->close();
}

function notLast() {
  $conn = connect();
  return (mysqli_real_escape_string($conn,gzcompress(htmlspecialchars($_POST['code']))) != pullRecentBlobCode());
}

function logout() {
  session_unset(); 
  session_destroy();
}

function login($u,$p) {
  $conn = connect();
  $sql = 'select * from users where username = "' . $u . '" limit 1';
  $result = $conn->query($sql);
  if ($result && $row = mysqli_fetch_row($result)) {
    if (crypt($p, $row[3]) == $row[3]) {
      $_SESSION['user'] = array('id' => $row[0], 'name' => $row[1], 'fresh' => true);
      mysqli_free_result($result);
      $conn->close();
      return true;
    }
  }
  return false;
}


?>
