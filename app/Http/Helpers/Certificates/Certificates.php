<?php
//app/Helpers/Certificate/Certificate.php
namespace App\Http\Helpers\Certificates;
 
class Certificates {

    /**
     * Get measure from cm to points
     * 
     * @param int $number
     * 
     * @return number
     */
    public static function get_measure_cm_points($number) {
        $points = $number * 28.3464566929;
        return round($points, 2);
    }

    /**
     * Get measure from px to points
     * 
     * @param int $number
     * 
     * @return number
     */
    public static function get_measure_px_points($px) {
        $points = $px * 0.75;
        return $points;
    }

    /**
     * Get rgb color from hex color to color (array)
     * 
     * @param int $number
     * 
     * @return array
     */
    public static function get_rgb_color($hex) {
        $hex = substr($hex,1);
        $c = [null, null, null, null, "alpha" => 1.0, "hex" => null];
        $c[0] = hexdec(mb_substr($hex, 0, 2)) / 0xff;
        $c[1] = hexdec(mb_substr($hex, 2, 2)) / 0xff;
        $c[2] = hexdec(mb_substr($hex, 4, 2)) / 0xff;
        $c["r"] = $c[0];
        $c["g"] = $c[1];
        $c["b"] = $c[2];
        $c["alpha"] = 1.0;
        $c["hex"] = sprintf("#%s%02X", $hex, round(1.0 * 255));
        return $c;
    }
}