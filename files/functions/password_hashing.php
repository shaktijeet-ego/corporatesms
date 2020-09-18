<?php
class password_hashing
{
    private static $formula = '$2a';
    private static $value = '$10';
    public static function unique_salt()
    {
        return substr(sha1(mt_rand()), 0, 22);
    }
    // Hashing password generate 
    public static function hash($user_password)
    {
        return password_hash($user_password, PASSWORD_DEFAULT);
    }
    // Compare a password upon hashing
    public static function compare_password($hash, $user_password)
    {
        return (password_verify($user_password, $hash));
    }
}
?>