<?php
function format_rupiah($angka)
{
    $format = number_format($angka, 0, ',', '.');
    $rupiah = 'Rp.' . $format;
    return $rupiah;
}
