<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use Yii;
use yii\console\Controller;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class InstController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex()
    {

        //$path = __DIR__ . '..\web\files\log\*.txt';
        $path = $_SERVER['DOCUMENT_ROOT'].'web/files/log/*.txt';
        $files = glob($path);

        $files or exit('No files to check123.'.PHP_EOL);

        echo 'Files in folder: '.count($files).PHP_EOL;
        foreach ($files as $index => $name) {
            echo "[{$index}] => {$name}".PHP_EOL;
        }

        echo 'Choose the file: ';
        $choice = intval(fgets(STDIN));

        array_key_exists($choice, $files) or exit('Wrong file selected.'.PHP_EOL);

        $file = $files[$choice];

        echo "Processing file '{$file}'...".PHP_EOL;

        $start_time = microtime(true);
        $code_stats = array();

        $f = fopen($file, 'r');

        while ($url = trim(fgets($f))) {
            $headers = get_headers($url);

            if (is_array($headers)) {
                array_key_exists($headers[0], $code_stats) or $code_stats[$headers[0]] = 0;
                $code_stats[$headers[0]]++;
                echo date('H:i:s')." HTTP code '{$headers[0]}' for url '{$url}'".PHP_EOL;
            }
            else {
                array_key_exists('Unknown', $code_stats) or $code_stats['Unknown'] = 0;
                $code_stats['Unknown']++;
                echo date('H:i:s')." Problem with url '{$url}'".PHP_EOL;
            }
        }

        fclose($f);

        $elapsed_time = round(microtime(true) - $start_time, 3);

        echo "File processed in {$elapsed_time}s".PHP_EOL;
        echo "Code stats are:".PHP_EOL;
        print_r($code_stats);
    }

    // Авторизация;
    public function actionLogin() {
        set_time_limit(0);
        date_default_timezone_set('Asia/Krasnoyarsk');

        /////// CONFIG ///////
        $username = 'rendzhi@mail.ru';
        $password = '1024531rendzhi+';




        try {
            $ig = \Yii::$app->inst->login($username, $password);
            print_r($ig);
        } catch (\Exception $e) {
            echo 'Something went wrong: '.$e->getMessage()."\n";
            exit(0);
        }


        try {
            $feed = $ig->discover->getPopularFeed();

            // The getPopularFeed() has an "items" property, which we need.
            $items = $feed->getItems();

            // Individual item objects have an "id" property.
            $firstItem_mediaId = $items[0]->getId();

            // To get properties with underscores, such as "device_stamp",
            // just specify them as camelcase, ie "getDeviceTimestamp" below.
            $firstItem_device_timestamp = $items[0]->getDeviceTimestamp();

            // You can chain multiple function calls in a row to get to the data.
            $firstItem_image_versions = $items[0]->getImageVersions2()->getCandidates()[0]->getUrl();

            echo 'There are '.count($items)." items.\n";

            echo "First item has media id: {$firstItem_mediaId}.\n";
            echo "First item timestamp is: {$firstItem_device_timestamp}.\n";
            echo "One of the first item image version candidates is: {$firstItem_image_versions}.\n";
        } catch (\Exception $e) {
            echo 'Something went wrong: '.$e->getMessage()."\n";
        }

    }
}
