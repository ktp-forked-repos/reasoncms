<?php

/**
 * @author Steve Smith
 * Description:
 * Clears the files out of /var/reason_admissions_app_exports/application_exports
 * Run from the application export page which is currently at www.luther.edu/apply/export
 *
 */
include_once('reason_header.php');
require_once( '/usr/local/webapps/reason/reason_package/carl_util/db/db.php' );
reason_include_once('function_libraries/user_functions.php');
reason_include_once('minisite_templates/modules/default.php');
reason_include_once('minisite_templates/page_types_local.php');

$GLOBALS['_form_view_class_names'][basename(__FILE__, '.php')] = 'ClearExportTable';


class ClearExportTable extends DefaultMinisiteModule {

    function run() {
        force_secure_if_available();

        $username = check_authentication();
        $group = id_of('application_export_group');
        $gh = new group_helper();
        $gh->set_group_by_id($group);
        $has_access = $gh->has_authorization($username);

        if ($has_access) {
            $ite = new RecursiveDirectoryIterator("/var/reason_admissions_app_exports/application_exports/");

//    $finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension
            foreach (new RecursiveIteratorIterator($ite) as $filename => $cur) {
                if ($cur->isFile()) {
                    $unlinked = unlink($cur);
                } else {
                    continue;
                }
                if ($unlinked) {
                    echo 'Removed: ' . $cur . "\n";
                }
                echo '<br>';
            }
            echo 'Thank you. All files removed.';
        }
    }

}
?>