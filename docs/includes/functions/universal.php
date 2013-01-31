<?
//быстро возвращает результат SELECT-запроса (1 поле)
function get ($q) {
  $rez = mysql_query($q);
  if (mysql_num_rows($rez))
    return mysql_result($rez,0);
  else
    return null;
}
//быстро возвращает результат SELECT-запроса (1 cтрока)
function getObject ($q) {
  $rez = mysql_query($q);
  if ($obj = mysql_fetch_object($rez))  return $obj;
  else return false;
}

//вывод массива в html
function pr($array) {
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}

//склонение форм числительных. пример: plural(5, 'яблоко', 'яблока', 'яблок')
function plural($n, $form1, $form2, $form5) {
  $n = abs($n) % 100;
  $n1 = $n % 10;
  if ($n > 10 && $n < 20) return $form5;
  if ($n1 > 1 && $n1 < 5) return $form2;
  if ($n1 == 1) return $form1;
  return $form5;
}

//если символ BOM присутствует в начале строки, удаляет его
function removeBOM($str) {
  if(substr($str, 0, 3) == pack('CCC', 0xef, 0xbb, 0xbf))  $str = substr($str, 3);
  return $str;
}

//Переводит дату из формата дд.мм.гггг [чч:мм:сс - проверяется автоматически] в формат гггг-мм-дд [чч:мм:сс - задается опцией]
function rusDateToMySQLDate($date, $addTimeToResult = true) {
  if (preg_match('!^\d{1,2}\.\d{1,2}\.\d{4}( \d{1,2}:\d{1,2}:\d{1,2})?$!',$date, $matches)) {
    if (isset($matches[1])) $time = true;  else $time=false;
    $dateObj = date_create_from_format('d.m.Y H:i:s', $date.($time ? '' : ' 00:00:00'));
    return date_format($dateObj, 'Y-m-d'.($addTimeToResult ? ' H:i:s' : ''));
  } else return $date;
}

//Переводит дату из формата гггг-мм-дд [чч:мм:сс - проверяется автоматически] в формат дд.мм.гггг [чч:мм:сс - задается опцией]
function mySQLDateToRusDate($date, $addTimeToResult = true) {
  if (preg_match('!^\d{4}-\d{1,2}-\d{1,2}( \d{1,2}:\d{1,2}:\d{1,2})?$!',$date, $matches)) {
    if (isset($matches[1])) $time = true;  else $time=false;
    $dateObj = date_create_from_format('Y-m-d H:i:s', $date.($time ? '' : ' 00:00:00'));
    return date_format($dateObj, 'd.m.Y'.($addTimeToResult ? ' H:i:s' : ''));
  } else return $date;
}
?>
