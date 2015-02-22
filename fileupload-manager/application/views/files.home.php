<?php
/**
 * FileUpload Manager
 * @author      Charlike Mike Reagent <https://github.com/tunnckoCore>
 * @license     MIT License <http://opensource.org/licenses/MIT>
 * @link        https://github.com/tunnckoCore/FileUpload-Manager
 * @link        http://www.charlike.pw/fileupload-manager/
 */
/**
 * @link http://www.whistle-bg.tk - old code
 */
$namesArray = glob(MANAGER_USERS . getSession('username') . DS . '*');

// count how long is array
$countNames = count($namesArray);
?>
<!-- Start: <?php echo __FILE__; ?> -->
<article class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo getSession('username_clean'); ?>'s upload <?php echo $countNames - 1; ?> file(s)</h3>
        </div>
        <div class="panel-body" style="padding-bottom: 5px;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Filename</th>
                        <th>Ext.</th>
                        <th>MimeType</th>
                        <th>Size</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //sort by time - last added
                    array_multisort(
                            array_map('filectime', $namesArray), SORT_NUMERIC, SORT_ASC, $namesArray
                    );
                    krsort($namesArray);
                    foreach ($namesArray as $key => $name) {
                        //last 6 files
                        //if ($key >= $countNames - 6) {

                        $fileInfo = pathinfo($name);
                        $fileInfo['path_name'] = $fileInfo['dirname'] . '/' . $fileInfo['basename'];
                        $fileInfo['mime-type'] = mimeType($fileInfo['path_name'])[0];
                        $fileTime = filectime($name);
                        $size = filesize($name);
                        
                        //echo '<pre>' . print_r($fileInfo, true) . '</pre>';
                        //exit;

                        $filePreviewLink = MANAGER_URI . 'application/members/' . getSession('username') . '/' . $fileInfo['basename'];

                        echo '
                                <tr>
                                    <td>' . ($key + 1) . '</td>
                                    <td><a title="' .date("d M Y, H:i:s", $fileTime) .' - '. timeAgoString($fileTime) . '" href="' . $filePreviewLink . '" target="_blank">' . $fileInfo['basename'] . '</a></td>
                                    <td>' . $fileInfo['extension'] . '</td>
                                    <td>' . $fileInfo['mime-type'] . '</td>
                                    <td>
                                        ' . formatSizeUnits($size) . '
                                    </td>
                                    <td>
                                        <a href="' . settingsLink('download', $fileInfo['basename']) . '" class="btn btn-default btn-xs"><i class="icon-download-alt"></i></a> 
                                        <a href="' . settingsLink('delete', $fileInfo['basename']) . '" class="btn btn-danger btn-xs"><i class="icon-remove"></i></a>
                                    </td>
                                </tr>';
                        //}
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</article><!-- End: <?php echo __FILE__; ?> -->
