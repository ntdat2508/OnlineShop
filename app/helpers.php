<?php

if (!function_exists('displayColor')) {
    function displayColor($color)
    {
        switch ($color) {
            case 'blue':
                return 'Xanh dương';
            case 'red':
                return 'Đỏ';
            case 'violet':
                return 'Tím';
            case 'yellow':
                return 'Vàng';
            case 'green':
                return 'Xanh lục';
            case 'orange':
                return 'Cam';
            case 'white':
                return 'Trắng';
            case 'black':
                return 'Đen';
            default:
                return 'Màu không xác định';
        }
    }
}
