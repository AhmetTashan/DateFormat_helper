<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * @project   Document of Ahmet
 * @author  Ahmet Taşhan
 * @link  https://github.com/ahmettashan
 * @since  Version 1.0.0
 *
 * Zamanımız ilerliyor, çalışmalarımız için sağlıklı ve işlevsel bir yol ve PHP 
 * için küçük bir kod parçacığı ve tarih ve saat ifadeleri sunuyoruz.
 *
 * normal = 18 Ağustos 2016 / varsayilan
 * day = 18 Ağustos, Perşembe
 * all = 18 Ağustos 2016, Perşembe
 * clock = saat:dakika
 * rss = Thu, 18 Aug 2016 00:00:00 +0200
 *
 */

function qdate($date = 'now', $format = 'normal')
{

  $Days = array(
    0 => 'Pazar',
    1 => 'Pazartesi',
    2 => 'Salı',
    3 => 'Çarşamba',
    4 => 'Perşembe',
    5 => 'Cuma',
    6 => 'Cumartesi'
  );
  $Months = array(
    1 => 'Ocak',
    2 => 'Şubat',
    3 => 'Mart',
    4 => 'Nisan',
    5 => 'Mayıs',
    6 => 'Haziran',
    7 => 'Temmuz',
    8 => 'Ağustos',
    9 => 'Eylül',
    10 => 'Ekim',
    11 => 'Kasım',
    12 => 'Aralık'
  );


  if ( $date == 'now' OR $date == '' )
  {
    $date = date('Y-m-d H:i:s');
  }

  $Day        = (int)substr($date,8,2);
  $Month      = (int)substr($date,5,2);
  $Year       = substr($date,0,4);
  $Hour       = substr($date,11,2);
  $Minute     = substr($date,14,2);
  $DayOfWeek  = date('w', mktime(0,0,0,$Month,$Day,$Year));

 $qdate['normal'] = $Day.' '.$Months[$Month].' '.$Year;
 $qdate['day'] = $Day.' '.$Months[$Month].', '.$Days[$DayOfWeek];
 $qdate['all'] = $Day.' '.$Months[$Month].' '.$Year.', '.$Days[$DayOfWeek];
 $qdate['clock'] = $Hour.':'.$Minute;
 $qdate['rss'] = date_format(date_create($date),'r');


  if($date == '0000-00-00') return false;
      return $qdate[$format];

}
