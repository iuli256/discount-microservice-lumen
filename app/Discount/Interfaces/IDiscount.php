<?php
/**
 * Created by PhpStorm.
 * User: iuli
 * Date: 5/29/2018
 * Time: 10:25 PM
 */
namespace App\Discount\Interfaces;
interface IDiscount{
    public static function getName();
    public static function isDisountApplicable($data);
    public static function applyDiscount($data);
}