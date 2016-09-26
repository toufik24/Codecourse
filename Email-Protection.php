<?php
/*
Protecting email addresses from bots

How to obscure an email address to protect it from anyone, or anything scraping your website.

https://www.codecourse.com/library/lessons/protect-email-addresses-from-bots/introduction
*/
echo obscure('hello@codecourse.com');

function obscure($value)
{
    $obscured = null;
    $identifier = md5(uniqid(true));

    $charset = '+-.0123456789@ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz';
    $key = str_shuffle($charset);

    for ($i = 0; $i < strlen($value); $i++) {
        $obscured .= $key[strpos($charset, $value[$i])];
    }

    $output = <<<EOT
        <span id="{$identifier}">[email protected]</span>
        <script>
            (function (k, o) {
                var c = k.split('').sort().join('');
                var r = '';

                for (var i = 0; i < o.length; i = i + 1) {
                    r += c.charAt(k.indexOf(o.charAt(i)));
                }
                
                document.getElementById('{$identifier}').innerText = r;
            })('{$key}', '{$obscured}');
        </script>
EOT;

    return trim(preg_replace('/\s+/', ' ', $output));
}
