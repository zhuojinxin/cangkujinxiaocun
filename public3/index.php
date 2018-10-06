<?php
/**
 * This is a test file.
 * 
 * @author    Ning Luo <luoning@luoning.me>
 * @copyright This code is copyright to me.
 * @license   MIT
 * @package   lndj/Lcrawl
 */

require 'vendor/autoload.php';

use Lndj\Lcrawl;

//stu_id
$stu_id = '201727010430';
//your password 
$password = 'aa87271358';

$user = ['stu_id' => $stu_id, 'stu_pwd' => $password];

$client = new Lcrawl('http://202.116.160.170/', $user, false);

$client->login();

$all = $client->setUa('Lcrawl Spider V2.0.2')->getGrade();
echo $all;
//setTimeOut()
//setReferer
//set...
dd($all);

//dd($client->login());
//$client->getSchedule();
// $client->getCet();


//Set the login post param

/*
[
    'viewstate' => '__VIEWSTATE',
    'stu_id' => 'TextBox1',
    'passwod' => 'TextBox2',
    'role' => 'RadioButtonList1',
    'button' => 'Button1'
]
*/

/**
 * Just a debug function
 * @param Obeject/Array/string $arr                                                             
 * @param String $hint debug hint
 * @return void
 */
function dd($arr,$hint = '')
{
    if (is_object($arr) || is_array($arr)) {
        echo "<pre>";
        print_r($arr);
        echo PHP_EOL . $hint;
        echo "</pre>";
    } else {
        var_dump($arr);
        echo PHP_EOL . $hint;
    }
}