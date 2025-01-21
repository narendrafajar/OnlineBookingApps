<?php

if (!function_exists('formatRupiah')) {
    /**
     * Format angka menjadi format Rupiah
     *
     * @param int|float $nominal
     * @param bool $withPrefix
     * @return string
     */
    function formatRupiah($nominal, $withPrefix = true)
    {
        $formatted = number_format($nominal, 0, ',', '.');
        return $withPrefix ? 'Rp ' . $formatted : $formatted;
    }
}
