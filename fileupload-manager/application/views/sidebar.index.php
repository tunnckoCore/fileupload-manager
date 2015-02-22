<?php
/**
 * FileUpload Manager
 * @author      Charlike Mike Reagent <https://github.com/tunnckoCore>
 * @license     MIT License <http://opensource.org/licenses/MIT>
 * @link        https://github.com/tunnckoCore/FileUpload-Manager
 * @link        http://www.charlike.pw/fileupload-manager/
 */
//require_once dirname(dirname(__DIR__)) . '/config.php';
//require_once dirname(dirname(__DIR__)) . '/system/allowed.php'; //template bug

/**
 * @link http://www.whistle-bg.tk - old code
 */
$namesArray = glob(MANAGER_DB . '*.usr');

// count how long is array
$countNames = count($namesArray);
?>
<!-- Start: <?php echo __FILE__; ?> -->
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
    <div class="list-group">
        <a href="#" class="list-group-item active">
            <h4 class="list-group-item-heading" style="margin-bottom: 0;">
                <?php
                /**
                 * Check if MANAGER_LAST_X_USERS > members count
                 * set echo 'latest 3 of 3' for example
                 * else 'latest MANAGER_LAST_X_USERS of 1000'
                 */
                if (gt(MANAGER_LAST_X_USERS, $countNames)) {
                    echo 'Latest ' . $countNames . ' of ' . $countNames;
                } else {
                    echo 'Latest ' . MANAGER_LAST_X_USERS . ' of ' . $countNames;
                }
                ?>
            </h4>
        </a>

        <?php
        //sort by time DESC
        array_multisort(
                array_map('filectime', $namesArray), SORT_NUMERIC, SORT_ASC, $namesArray
        );
        krsort($namesArray);
        foreach ($namesArray as $key => $name) {
            //last 15 users
            if ($key >= $countNames - MANAGER_LAST_X_USERS) {
                echo '<a title="' . date("d M Y, H:i:s", filectime($name)) . '" href="#' . basename($name) . '" class="list-group-item">' . setSpace("-", basename(str_replace(".usr", "", $name))) . '<span class="badge">' . timeAgoString(filectime(MANAGER_DB . basename($name))) . '</span></a>';
            }
        }
        ?>
    </div>
</div><!-- End: <?php echo __FILE__; ?> -->
