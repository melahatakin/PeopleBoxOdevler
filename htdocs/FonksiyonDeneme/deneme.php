<?php
$str = 'Melahat Akın';
$pattern = '/Akın/i';
echo preg_replace($pattern, 'Abcd', $str);
//yazılan kelimeyi değiştirmek için kullandığımız bir fonksiyon
?>
<?php
$str = 'Visit Microsoft!';
$pattern = '/microsoft/i';
echo preg_replace($pattern, 'W3Schools', $str);
?>
