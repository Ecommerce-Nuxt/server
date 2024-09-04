<?php
if (! function_exists('moneyFormat')) {
    /**
     * @param mixed $str
     *
     * @return [type]
     */
    function moneyFormat($str)
    {
        return 'Rp. ' . number_format($str, '0', '', '.');
    }
}
