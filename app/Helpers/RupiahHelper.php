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

    function formatTanggal($value, $format = "date")
    {
        if (empty($value)) {
            return false;
        }

        // $date = Carbon::parse($value)->locale('id')->diffForHumans();

        if ($format == "date") {

           $date = Carbon::parse($value)->format('d F Y');
        
        } elseif ($format == "datetime") {

           $date = Carbon::parse($value)->format('d F Y H:i:s');
        
        } else {
            return false;
        }


		return $date;
    }
}
