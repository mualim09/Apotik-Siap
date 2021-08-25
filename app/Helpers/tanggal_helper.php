<?php
function tgl_indo($tanggal)
{
    $hari = array(
        1 =>    'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
    );

    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split       = explode('-', $tanggal);
    $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

    $num = date('N', strtotime($tanggal));
    return $hari[$num] . ', ' . $tgl_indo;

    return $tgl_indo;
}


function tgl_Waktu_indo($tanggal)
{
    $hari = array(
        1 =>    'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
    );

    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split       = explode('-', date("Y-m-d", strtotime($tanggal)));
    $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
    $jam = date("H:i", strtotime($tanggal));

    $num = date('N', strtotime($tanggal));
    return $hari[$num] . ', ' . $tgl_indo . ' Jam ' . $jam;

    return $tgl_indo;
}

function bulan_indo($tanggal)
{


    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $bulan_indo = $bulan[$tanggal];


    return $bulan_indo;
}
