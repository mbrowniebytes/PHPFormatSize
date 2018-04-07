<?php
namespace Format;

use Exception;

class FormatSize
{
    /**
     * format bytes to units
     *
     * @param int $bytes
     * @param int $decimals     
     * @return string
     * @throws Exception
     */
    public function formatBytes($bytes, $decimals=2)
    {
        // do not allow negative decimals
        if ($decimals < 0) {
            throw new Exception('Negative decimals are invalid: '.$decimals);
        }

        // allow negative values
        // for differences, future projections, etc
        if ($bytes < 0) {
            $sign = -1;
            $bytes = abs($bytes);
        } else {
            $sign = 1;
        }
        
        // match bytes to unit and divisor
        if ($bytes >= 1099511627776) {
            $divisor = 1099511627776;
            $unit = 'TB';            
        } else if ($bytes >= 1073741824) {
            $divisor = 1073741824;
            $unit = 'GB';              
        } else if ($bytes >= 1048576) {
            $divisor = 1048576;
            $unit = 'MB';              
        } else if ($bytes >= 1024) {
            $divisor = 1024;
            $unit = 'KB';              
        } else if ($bytes >= 1) {
            $divisor = 1;
            $unit = 'B';                          
        } else {
            $divisor = 1;
            $unit = 'B';              
            $bytes = 0;
        }
        
        $formatted = number_format($sign * $bytes / $divisor, $decimals) . ' ' . $unit;

        return $formatted;
    }
}


