<?php
//[1]
//is_string
function is_string_a($var)
{
    return (string) $var === $var;
}
//[2]
//isset
function isset_a(&$var)
{
    $x = $var ?? true;
    if ($x === true) {
        return false;
    } else {
        return true;
    }
}
//[3]
//rand with max and min value require
//rand 
function rand_a(int $min, int $max)
{
    $r = $max / 59;
    return intval_a($r * date('s'));
}
//[4]
//array_diff
function array_diff_a(array $array, array ...$arrays)
{
    $result = array();
    $tck = false;
    for ($i = 0; $i < count_a($array); $i++) {
        foreach ($arrays as $item) {
            if (is_array_a($item)) {
                foreach ($item as $it) {
                    if ($array[$i] == $it) {
                        $tck = true;
                        break;
                    }
                }
            } else {
                if ($array[$i] == $item) {
                    $tck = true;
                    break;
                }
            }
        }
        if ($tck) {
            $tck = false;
        } else {
            $result[$i] = $array[$i];
        }
    }
    return $result;
}
//[5]
//array_slice
function array_slice_a(array $array, int $offset, int $length = null)
{
    $length = $length ?? count_a($array);
    $result = array();
    for ($i = $offset; $i < $length; $i++) {
        $result[] = $array[$i];
    }
    return $result;
}
//[6]
// strlen
function strlen_a($x)
{
    $lens = 0;
    $i = 0;
    while (isset($x[$i])) {
        $lens++;
        $i++;
    }
    return $lens;
}
//[7]
// ltrim
function ltrim_a($str)
{
    $ch = false;
    $result = '';
    for ($i = 0; $i < strlen_a($str); $i++) {
        if ($ch) {
            $result .= $str[$i];
        } else {
            if ($str[$i] != " ") {
                $ch = true;
                $result .= $str[$i];
            }
        }
    }
    return $result;
}
//[8]
// rtrim
function rtrim_a($str)
{
    $ch = false;
    $result = '';
    for ($i = strlen_a($str) - 1; $i >= 0; $i--) {
        if ($ch) {
            $result .= $str[$i];
        } else {
            if ($str[$i] != " ") {
                $ch = true;
                $result .= $str[$i];
            }
        }
    }
    return strrev_a($result);
}
//[9]
// strrev
function strrev_a($str)
{
    $result = "";
    for ($i = strlen_a($str) - 1; $i >= 0; $i--) {
        $result .= $str[$i];
    }
    return $result;
}
//[10]
//trim
function trim_a($str)
{
    $str = ltrim_a($str);
    $str = rtrim_a($str);
    return $str;
}
//[11]
//str_word_count
function str_word_count_a($str)
{
    $result = trim_a($str);
    $c = 1;
    $tch = false;
    for ($i = 0; $i < strlen_a($result); $i++) {
        if ($result[$i] == " ") {
            if ($tch) {
                $tch = false;
                $c++;
            } else {
                $tch = true;
            }
        }
    }
    return $c;
}
//[12]
//strtoupper
function strtoupper_a(string $string)
{
    $result = '';
    $n = strlen_a($string);
    for ($i = 0; $i < $n; $i++) {
        if (ord($string[$i]) <= 90) {
            $result .= $string[$i];
        } else {
            $result .= chr(ord($string[$i]) - 32);
        }
    }
    return $result;
}
//[13]
//strtolower
function strtolower_a(string $string)
{
    $result = '';
    $n = strlen_a($string);
    for ($i = 0; $i < $n; $i++) {
        if (ord($string[$i]) >= 97) {
            $result .= $string[$i];
        } else {
            $result .= chr(ord($string[$i]) + 32);
        }
    }
    return $result;
}
//[14]
//strval
function strval_a($value)
{
    return (string)$value;
}
//[15]
//str_repeat
function str_repeat_a(string $string, int $times)
{
    $result = '';
    for ($i = 0; $i < $times; $i++) {
        $result .= $string;
    }
    return $result;
}
//[16]
//is_int
function is_int_a($var)
{
    return (int)$var === $var;
}
//[17]
//is_integer
function is_integer_a($var)
{
    return (int)$var === $var;
}
//[18]
//is_long
function is_long_a($var)
{
    return (int)$var === $var;
}
//[19]
//is_float
function is_float_a($var)
{
    return (float)$var === $var;
}
//[20]
//is_double
function is_double_a($var)
{
    return (float)$var === $var;
}
//[21]
//is_numeric
function is_numeric_a($var)
{
    return (int)$var == $var || (float)$var == $var;
}
//[22]
//is_infinite
function is_infinite_a(float $val)
{
    return $val > PHP_FLOAT_MAX;
}
//[23]
//is_finite
function is_finite_a(float $val)
{
    return $val <= PHP_FLOAT_MAX;
}
//[24]
//ceil
function ceil_a(int|float $num)
{
    if (is_float($num)) {
        return ((int)$num) + 1;
    }
    return $num;
}
//[25]
//floor
function floor_a(int|float $num)
{
    return (int)$num;
}
//[26]
//intdiv
function intdiv_a(int $num1, int $num2)
{
    return (int)($num1 / $num2);
}
//[27]
//intval
function intval_a($value, $base = 10)
{
    return (int)$value;
}
//[28]
//floatval
function floatval_a($value)
{
    return (float)$value;
}
//[29]
//pi
function pi_a()
{
    return 3.1415926535898;
}
//[30]
//max
function max_a($value, ...$values)
{
    $lst = array();
    if (is_array_a($value)) {
        $lst = $value;
    } else {
        $lst = $values;
        $lst[] = $value;
    }
    $max_v = $lst[0];
    for ($i = 0; $i < count_a($lst); $i++) {
        if ($lst[$i] > $max_v) {
            $max_v = $lst[$i];
        }
    }
    return $max_v;
}
//[31]
//min 
function min_a($value, ...$values)
{
    $lst = array();
    if (is_array_a($value)) {
        $lst = $value;
    } else {
        $lst = $values;
        $lst[] = $value;
    }
    $min_v = $lst[0];
    for ($i = 0; $i < count_a($lst); $i++) {
        if ($lst[$i] < $min_v) {
            $min_v = $lst[$i];
        }
    }
    return $min_v;
}
//[32]
//abs
function abs_a($number)
{
    if ($number < 0) {
        return -1 * $number;
    }
    return $number;
}
//[33]
//pow
function pow_a($number, $exponent)
{
    return $number ** $exponent;
}
//[34]
//count
function count_a($array_or_countable)
{
    return strlen_a($array_or_countable);
}
//[35]
//join
function join_a(array|string $separator = "", ?array $array)
{
    $result = '';
    for ($i = 0; $i < count_a($array); $i++) {
        $result .= $array[$i];
        if ($i < count_a($array) - 1) {
            $result .= $separator;
        }
    }
    return $result;
}
//[36]
//implode
function implode_a(array|string $separator = "", ?array $array)
{
    return join_a($separator, $array);
}
//[37]
// str_split
function str_split_a(string $string, int $length = 1)
{
    $result = array();
    $ind = 0;
    while (isset($string[$ind])) {
        $value = '';
        for ($i = 0; $i < $length; $i++, $ind++) {
            if ($ind < strlen_a($string)) {

                $value .= $string[$ind];
            }
        }
        $result[] = $value;
    }
    return $result;
}
//[38]
// explode
function explode_a(string $separator, string $string, int $limit = PHP_INT_MAX)
{
    $n = strlen_a($string);
    $result = array();
    $c = 1;
    $valueX = '';
    $j = 0;
    for (; $j < $n; $j++) {
        if ($string[$j] === $separator or $j == $n - 1) {
            if ($c <= $limit) {
                if ($j == $n - 1) {
                    $result[] = trim_a($valueX . $string[$j]);
                } else {
                    $result[] = trim_a($valueX);
                }
                $valueX = '';
            }
        } else {
            $valueX .= $string[$j];
        }
    }
    $valueY = null;
    for (; $j < $n; $j++) {
        $valueY .= $string[$j];
    }
    if (isset($valueY)) {
        $result[] = trim_a($valueY);
    }
    return $result;
}
//[39]
//str_replace
function str_replace_a($search, $replace, $subject)
{
    $n = strlen_a($search);
    $j = 0;
    $loc = 0;
    $result = '';
    $tck = false;
    for ($i = 0; $i < strlen_a($subject); $i++) {

        if ($search[$j] == $subject[$i]) {
            if ($j == $n - 1) {
                $loc = $i - $j;
                $tck = true;
            }
            $j++;
        } else {
            $j = 0;
        }
        $j = $j % $n;
    }
    if ($tck) {
        for ($i = 0; $i < $loc; $i++) {
            $result .= $subject[$i];
        }
        for ($i = 0; $i < strlen_a($replace); $i++) {
            $result .= $replace[$i];
        }
        for ($i = $loc + $n; $i < strlen_a($subject); $i++) {
            $result .= $subject[$i];
        }
        return $result;
    }
    return $subject;
}
//[40]
//str_contains
function str_contains_a(string $haystack, string $needle)
{
    $n = strlen_a($needle);
    $j = 0;
    for ($i = 0; $i < strlen_a($haystack); $i++) {

        if ($needle[$j] == $haystack[$i]) {
            if ($j == $n - 1) {
                return true;
            }
            $j++;
        } else {
            $j = 0;
        }
        $j = $j % $n;
    }
    return false;
}
//[41]
//in_array
function in_array_a($needle, array $haystack, bool $strict = false)
{
    for ($i = 0; $i < count_a($haystack); $i++) {
        if ($strict) {
            return $needle === $haystack[$i];
        } else {
            return $needle == $haystack[$i];
        }
    }
}
//[42]
//array_sum
function array_sum_a(array $array)
{
    $result = 0;
    for ($i = 0; $i < count_a($array); $i++) {
        $result += $array[$i];
    }
    return $result;
}
//[43]
//array_search
function array_search_a($needle, array $haystack, bool $strict = false)
{
    foreach ($haystack as $key => $value) {
        if ($strict) {
            if ($needle === $value) {
                return $key;
            }
        } else {
            if ($needle == $value) {
                return $key;
            }
        }
        return false;
    }
}
//[44]
//rsort
function rsort_a(array &$array)
{
    $result = array();
    $newArray = $array;
    $lens = count_a($array);
    for ($i = 0; $i < $lens; $i++) {
        $item = max_a($newArray);
        $lensJ = count_a($newArray);
        $c = 1;
        $newArray_container = array();
        for ($j = 0; $j < $lensJ; $j++) {
            if ($c == 1 && $newArray[$j] == $item) {
                $c++;
            } else {
                $newArray_container[] = $newArray[$j];
            }
        }
        $result[] = $item;
        $newArray = $newArray_container;
    }
    $array = $result;
    return true;
}
//[45]
//sort
function sort_a(array &$array)
{
    $result = array();
    $newArray = $array;
    $lens = count_a($array);
    for ($i = 0; $i < $lens; $i++) {
        $item = min_a($newArray);
        $lensJ = count_a($newArray);
        $c = 1;
        $newArray_container = array();
        for ($j = 0; $j < $lensJ; $j++) {
            if ($c == 1 && $newArray[$j] == $item) {
                $c++;
            } else {
                $newArray_container[] = $newArray[$j];
            }
        }
        $result[] = $item;
        $newArray = $newArray_container;
    }
    $array = $result;
    return true;
}
//[46]
//array_push
function array_push_a(array &$array, ...$values)
{
    for ($i = 0; $i < count_a($values); $i++) {
        $array[] = $values[$i];
    }
}
//[47]
//array_pop
function array_pop_a(array &$array)
{
    $deletedValue = $array[count_a($array) - 1];
    $result = array();
    for ($i = 0; $i < count_a($array) - 1; $i++) {
        $result[] = $array[$i];
    }
    $array = $result;
    return $deletedValue;
}
//[48]
//array_shift
function array_shift_a(array &$array)
{
    $result = array();
    $removedValue = $array[0];
    for ($i = 1; $i < count_a($array); $i++) {
        $result[] = $array[$i];
    }
    $array = $result;
    return $removedValue;
}
//[49]
//array_unshift
function array_unshift_a(array &$array, ...$values)
{
    $result = array();
    for ($i = 0; $i < count_a($values); $i++) {
        $result[] = $values[$i];
    }
    for ($j = 0; $j < count_a($array); $j++) {
        $result[] = $array[$j];
    }
    $array = $result;
    return count_a($array);
}
//[50]
//range
function range_a(string|int|float $start, string|int|float $end, int|float $step = 1)
{
    $result = array();
    $x = ord($start);
    $y = ord($end);
    for ($i = $x; $i <= $y; $i += $step) {
        $result[] = chr($i);
    }
    return $result;
}
//[51]
//array_fill
function array_fill_a(int $start_index, int $count, mixed $value)
{
    $rst = array();
    for ($i = 0; $i < $count; $i++, $start_index++) {
        $rst[$start_index] = $value;
    }
    return $rst;
}
//[52]
//is_array
function is_array_a($var)
{
    return (array)$var === $var;
}
//[53]
//array_keys
function array_keys_a(array $array)
{
    $result = array();
    foreach ($array as $k => $ele) {
        $result[] = $k;
    }
    return $result;
}
//[54]
//array_values
function array_values_a(array $array)
{
    $result = array();
    foreach ($array as $k => $v) {
        $result[] = $v;
    }
    return $result;
}
//[55]
//substr_replace
function substr_replace_a($string, $replace, $offset, $length = null)
{
    $result = '';
    $n = strlen_a($string);
    $length = $length ?? $n;
    for ($i = 0; $i < $offset; $i++) {
        $result .= $string[$i];
    }
    for ($i = 0; $i < strlen_a($replace); $i++) {
        $result .= $replace[$i];
    }
    for ($i = $offset + $length; $i < $n; $i++) {
        $result .= $string[$i];
    }
    return $result;
}
//[56]
//substr_count
function substr_count_a(string $haystack, string $needle, int $offset = 0, $length = null)
{
    $n = strlen_a($haystack);
    $length = $length ?? $n;
    $c = 0;
    for ($i = $offset; $i < $length; $i++) {
        $tck = true;
        for ($j = 0; $j < strlen_a($needle); $j++) {
            if ($haystack[($i + $j) % $length] != $needle[$j]) {
                $tck = false;
            }
        }
        if ($tck) {
            $c++;
        }
    }
    return $c;
}
//[57]
//substr
function substr_a(string $string, int $offset, $length = null)
{
    $result = '';
    $n = strlen_a($string);
    $length = $length ?? $n;
    if ($length != $n) {
        $length = $offset + $length;
    }

    for ($i = $offset; $i < $length; $i++) {
        $result .= $string[$i];
    }
    return $result;
}
//[58]
//str_ends_with_a
function str_ends_with_a(string $haystack, string $needle)
{
    $n1 = strlen_a($haystack);
    $n2 = strlen_a($needle);
    for ($i = 0; $i < $n1; $i++) {
        $tck = true;
        for ($j = 0; $j < $n2; $j++) {
            if ($haystack[($i + $j) % $n1] != $needle[$j]) {
                $tck = false;
            }
        }
        if ($tck && ($i + $n2 == $n1)) {
            return true;
        }
    }
    return false;
}
//[59]
//str_starts_with_a
function str_starts_with_a(string $haystack, string $needle)
{
    $n1 = strlen_a($haystack);
    $n2 = strlen_a($needle);
    for ($i = 0; $i < $n1; $i++) {
        $tck = true;
        for ($j = 0; $j < $n2; $j++) {
            if ($haystack[($i + $j) % $n1] != $needle[$j]) {
                $tck = false;
            }
        }
        if ($tck && ($i == 0)) {
            return true;
        }
    }
    return false;
}
//[60]
//array_replace
function array_replace_a(array $array1, array $array2)
{
    $n1 = count_a($array1);
    $n2 = count_a($array2);
    $result = array();
    for ($i = 0; $i < $n2; $i++) {
        $result[] = $array2[$i];
    }
    for ($i = $n2; $i < $n1; $i++) {
        $result[] = $array1[$i];
    }
    return $result;
}
//[61]
//array_splice
function array_splice_a(array &$array, int $offset, $length = null)
{
    $result = array();
    $n = count_a($array);
    $varet = array();
    $length = $length ?? $n;
    for ($i = 0; $i < $offset; $i++) {
        $result[] = $array[$i];
    }
    if (($offset + $length) < $n) {
        for ($i = $offset + $length; $i < $n; $i++) {
            $result[] = $array[$i];
        }
        for ($i = $offset; $i < $offset + $length; $i++) {
            $varet[] = $array[$i];
        }
    } else {
        for ($i = $offset; $i < $n; $i++) {
            $varet[] = $array[$i];
        }
    }
    $array = $result;
    return $varet;
}
//[62]
//array_intersect
function array_intersect_a(array $array1, array $array2)
{
    $result = array();
    for ($i = 0; $i < count_a($array1); $i++) {
        for ($j = 0; $j < count_a($array2); $j++) {
            if ($array1[$i] == $array2[$j]) {
                $result[] = $array1[$i];
                break;
            }
        }
    }
    return $result;
}
//[63]
//array_reverse
function array_reverse_a(array $array, bool $preserve_keys = false)
{
    $result = array();
    if ($preserve_keys) {
        for ($i = count_a($array) - 1; $i >= 0; $i--) {
            $result[$i] = $array[$i];
        }
    } else {
        for ($i = count_a($array) - 1; $i >= 0; $i--) {
            $result[] = $array[$i];
        }
    }
    return $result;
}
//[64]
//array_key_exists
function array_key_exists_a($key, array $array)
{
    foreach ($array as $k => $v) {
        if ($key == $k) {
            return true;
        }
    }
    return false;
}
//[65]
//array_key_last
function array_key_last_a(array $array)
{
    $n = count_a($array);
    if ($n) {
        $i = 0;
        foreach ($array as $k => $v) {
            if ($i == $n - 1) {
                return $k;
            }
            $i++;
        }
    }
    return false;
}
//[66]
//array_key_first
function array_key_first_a(array $array)
{
    $n = count_a($array);
    if ($n) {
        foreach ($array as $k => $v) {
            return $k;
        }
    }
    return false;
}
//[67]
//array_chunk
function array_chunk_a(array $array, int $length)
{
    $result = array();
    $subarr = array();
    for ($i = 0; $i < count_a($array); $i++) {
        $subarr[] = $array[$i];
        if ($length == count_a($subarr)) {
            $result[] = $subarr;
            $subarr = array();
        }
    }
    if (count_a($subarr) > 0) {
        $result[] = $subarr;
    }
    return $result;
}
//[68]
//array_merge
function array_merge_a(array ...$arrays)
{
    $n = count_a($arrays);
    $result = array();
    for ($i = 0; $i < $n; $i++) {
        foreach ($arrays[$i] as $k => $v) {
            $result[$k] = $v;
        }
    }
    return $result;
}
//[69]
//strcmp if two strings equal then will return 0 else 1
function strcmp_a(string $str1, string $str2)
{
    if ($str1 == $str2) {
        return 0;
    }
    return 1;
}
// echo strcmp('hello', 'hello');
// echo '<br>';
// echo strcmp_a('hello', 'hello');
//[70]
//strstr return string starts from needle first letter
function strstr_a(string $haystack, string $needle, bool $before_needle = false)
{
    $n1 = strlen_a($haystack);
    $n2 = strlen_a($needle);
    $index = 0;
    $tc = true;
    $result = '';
    for ($i = 0; $i < $n1; $i++) {
        $tc = true;
        for ($j = 0; $j < $n2; $j++) {
            if ($haystack[$i + $j] != $needle[$j]) {
                $tc = false;
                break;
            }
        }
        if ($tc) {
            $index = $i;
            break;
        }
    }
    if ($tc) {
        if ($before_needle) {
            for ($i = 0; $i < $index; $i++) {
                $result .= $haystack[$i];
            }
        } else {
            for ($i = $index; $i < $n1; $i++) {
                $result .= $haystack[$i];
            }
        }
        return $result;
    }
    return false;
}
// echo strstr('ahmed', 'ed');
// echo '<br>';
// echo strstr_a('ahmed', 'ed');
//[71]
//stristr
function stristr_a(string $haystack, string $needle, bool $before_needle = false)
{
    $haystack_i = strtoupper_a($haystack);
    $needle_i = strtoupper_a($needle);
    $n1 = strlen_a($haystack);
    $n2 = strlen_a($needle);
    $index = 0;
    $tc = true;
    $result = '';
    for ($i = 0; $i < $n1; $i++) {
        $tc = true;
        for ($j = 0; $j < $n2; $j++) {
            if ($haystack_i[$i + $j] != $needle_i[$j]) {
                $tc = false;
                break;
            }
        }
        if ($tc) {
            $index = $i;
            break;
        }
    }
    if ($tc) {
        if ($before_needle) {
            for ($i = 0; $i < $index; $i++) {
                $result .= $haystack[$i];
            }
        } else {
            for ($i = $index; $i < $n1; $i++) {
                $result .= $haystack[$i];
            }
        }
        return $result;
    }
    return false;
}
// echo stristr('ahem', 'E');
// echo '<br>';
// echo stristr_a('ahem', 'E');
//[72]
//strtr
function strtr_a(string $str, string $from, string $to)
{
    $result = '';
    for ($i = 0; $i < strlen_a($str); $i++) {
        $t = true;
        for ($j = 0; $j < strlen_a($from); $j++) {
            if ($from[$j] == $str[$i]) {
                if (isset($to[$j])) {
                    $t = false;
                    $result .= $to[$j];
                    break;
                }
            }
        }
        if ($t) {
            $result .= $str[$i];
        }
    }
    return $result;
}
// echo strtr('ahemd', 'de', 'a');
// echo '<br>';
// echo strtr_a('ahemd', 'de', 'a');
//[73]
//stripos
function stripos_a(string $haystack, string $needle, int $offset = 0)
{
    $haystack = strtolower_a($haystack);
    $needle = strtolower_a($needle);
    $c = 0;
    $lens = strlen_a($needle);
    $j = 0;
    for ($i = 0; $i < strlen_a($haystack); $i++) {

        if ($haystack[$i] == $needle[$j++]) {
            if ($j == $lens) {
                if ($c == $offset) {
                    return $i - ($j - 1);
                }
                $c++;
            }
        } else {
            $j = 0;
        }
    }
    return false;
}
// echo stripos_a('ahmed','a');
//[74]
// strpos
function strpos_a(string $haystack, string $needle, int $offset = 0)
{
    $c = 0;
    $lens = strlen_a($needle);
    $j = 0;
    for ($i = 0; $i < strlen_a($haystack); $i++) {

        if ($haystack[$i] == $needle[$j++]) {
            if ($j == $lens) {
                if ($c == $offset) {
                    return $i - ($j - 1);
                }
                $c++;
            }
        } else {
            $j = 0;
        }
    }
    return false;
}
// echo strpos_a('ahmed', 'm');
//[75]
//strrpos
function strrpos_a(string $haystack, string $needle, int $offset = 0)
{
    $c = 0;
    $needle = strrev_a($needle);
    $lens = strlen_a($needle);
    $j = 0;
    // if ($offset == 0) {
    //     $offset = 1;
    // }
    for ($i = strlen_a($haystack) - 1; $i >= 0; $i--) {
        if ($haystack[$i] == $needle[$j++]) {
            if ($j == $lens) {
                if ($c == $offset) {
                    return $i;
                }
                $j = 0;
                $c++;
            }
        } else {
            $j = 0;
        }
    }
    return false;
}
// echo strrpos_a('ahmed','m');
// echo strrpos('ahmed','m');
//[76]
//strripos
function strripos_a(string $haystack, string $needle, int $offset = 0)
{
    // $haystack = strrev_a($haystack);
    $needle = strrev_a($needle);
    return stripos_a($haystack, $needle, $offset);
}
// echo strripos('ahmed','m');
// echo strripos_a('ahmed','m');
//[77]
//return current time
function current_time_a($format = false)
{
    if ($format) {
        return date('H:i:s a');
    }
    return date('h:i:s a');
}
// echo current_time_a(true);
//[78]
//month_of_date
function month_of_date($date, $separator = '/')
{
    $arr = explode_a($separator, $date);
    return $arr[1];
}
// echo month_of_date('2023-2-3',"-");
//[79]
//year_of_date
function year_of_date($date, $separator = '/')
{
    $arr = explode_a($separator, $date);
    return $arr[0];
}
// echo year_of_date('2023-2-3',"-");
//[80]
//day_of_date
function day_of_date($date, $separator = '/')
{
    $arr = explode_a($separator, $date);
    return $arr[2];
}
// echo day_of_date('2023-2-3',"-");
//[81]
//hour_of_time
function hour_of_time($time, $separator = ':')
{
    $arr = explode_a($separator, $time);
    return $arr[0];
}
// echo hour_of_time('10:50:20');
//[82]
//minute_of_time
function minute_of_time($time, $separator = ':')
{
    $arr = explode_a($separator, $time);
    return $arr[1];
}
// echo minute_of_time('10:50:20');
//[83]
//second_of_time
function second_of_time($time, $separator = ':')
{
    $arr = explode_a($separator, $time);
    return $arr[2];
}
// echo second_of_time('10:50:20');
//[84]
//array_last_value
function array_last_value_a(array $array)
{
    $n = count_a($array) - 1;
    return $array[$n];
}
// echo array_last_value_a(array(1,2,3));
//[85]
//array_rand
function array_rand_a(array $array)
{
    $sec = date('s');
    $n = count_a($array);
    return $array[$sec % $n];
}
//[86]
//empty
function empty_a($var)
{
    if (count_a($var) == 0) {
        return true;
    }
    return false;
}
// $arr=array();
// echo empty($arr);
// echo empty_a($arr);
//[87]
//is_null
function is_null_a($var)
{
    if ($var == null) {
        return true;
    }
    return false;
}
// $x=null;
// echo is_null($x);
// echo is_null_a($x);
//[88]
//bit_to_byte
function bit_to_byte($var){
    return $var/8;
}
// echo bit_to_byte(1024);
//[89]
//byte_to_kilo
function byte_to_kilo($var){
    return $var/1023;
}
// echo byte_to_kilo(1024);
//[90]
//kilo_to_miga
function kilo_to_miga($var){
    return $var/1023;
}
// echo kilo_to_miga(1024);
//[91]
//miga_to_giga
function miga_to_giga($var){
    return $var/1023;
}
// echo miga_to_giga(1024);
//[92]
//giga_to_tera
function giga_to_tera($var){
    return $var/1023;
}
// echo giga_to_tera(1024);
//[93]
//tera_to_peta
function tera_to_peta($var){
    return $var/1023;
}
// echo tera_to_peta(1024);
//[94]
//peta_to_tera
function peta_to_tera($var){
    return $var*1023;
}
// echo peta_to_tera(1024);
//[95]
//tera_to_giga
function tera_to_giga($var){
    return $var*1023;
}
// echo tera_to_giga(1024);
//[96]
//giga_to_miga
function giga_to_miga($var){
    return $var*1023;
}
// echo giga_to_miga(1024);
//[97]
//miga_to_kilo
function miga_to_kilo($var){
    return $var*1023;
}
// echo miga_to_kilo(1024);
//[98]
//kilo_to_byte
function kilo_to_byte($var){
    return $var*1023;
}
// echo kilo_to_byte(1024);
//[99]
//byte_to_bit
function byte_to_bit($var){
    return $var*8;
}
// echo byte_to_bit(1024);
//[100]
//byte_to_miga
function byte_to_miga($var){
    return $var*(1024**2);
}
// echo byte_to_bit(1024);
//end array function












// $lst = array(
//     array("X", "O", "X"),
//     array("X", "O", "O"),
//     array("X"," ","X")
// );
// echo "<pre> <h1>";
// for ($i = 0; $i < count($lst); $i++) {
//     for ($j = 0; $j < count($lst[$i]); $j++) {
//         echo " " . $lst[$i][$j] . " ";
//     }
//     echo "<br>";
// }
// echo "</h1> </pre>";
// $arr = array(array('name' => "ahmed", 'age' => "22", 'level' => "Forth"), array('name' => "ali", 'age' => "15", 'level' => "Third"))
