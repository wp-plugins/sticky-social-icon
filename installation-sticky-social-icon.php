<?php

global $version;
$version = "3.0";

// Installation Function
function stickysocialicon_install()
{
    global $version, $wpdb;

	if (!version_compare($version, '3.0', '>=')) {

        error_log('Please install version greater than 3.0');
        echo 'Please install version greater than 3.0';
    }

    $stickySocialIconTable  = $wpdb->prefix . "sticky_social_icon";
    $createTableSql = "CREATE TABLE IF NOT EXISTS `{$stickySocialIconTable}` (
                      `id` tinyint(2) NOT NULL,
                      `facebook` varchar(500) DEFAULT NULL,
                      `twitter` varchar(500) DEFAULT NULL,
                      `vemo` varchar(500) DEFAULT NULL,
                      `pinterest` varchar(500) DEFAULT NULL,
                      `linkedin` varchar(500) DEFAULT NULL,
											`youtube` varchar(500) DEFAULT NULL,
                      `rss` varchar(500) DEFAULT NULL,
                      `tumblr` varchar(500) DEFAULT NULL,
											`digg` varchar(500) DEFAULT NULL,
											`flickr` varchar(500) DEFAULT NULL,
											`gplus` varchar(500) DEFAULT NULL,
											`instagram` varchar(500) DEFAULT NULL,
											`skype` varchar(500) DEFAULT NULL,
											`stumbleupon` varchar(500) DEFAULT NULL,
					            `color_th` varchar(255) DEFAULT NULL,
                      `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                      PRIMARY KEY (`id`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $insertSql      = "INSERT INTO `{$stickySocialIconTable}` (`id`, `facebook`, `twitter`, `vemo`, `pinterest`, `linkedin`, `rss`, `tumblr`, `color_th`,`update_date`) VALUES ('1', '#', '#', '#', '#', '#', '#', '#','333333', CURRENT_TIMESTAMP);";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    dbDelta($createTableSql);
    dbDelta($insertSql);
}

// Un-installation function
function stickysocialicon_uninstall()
{
    global $wpdb;
    $stickySocialIconTable  = $wpdb->prefix . "sticky_social_icon";

    //Checking and driping the table
    if ($wpdb->get_var("show tables like '$stickySocialIconTable'") == $stickySocialIconTable) {
        $sql = "DROP TABLE {$stickySocialIconTable}";
        $wpdb->query($sql);
    }
}
