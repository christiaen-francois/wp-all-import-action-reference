<?php
/**
 * =========================================
 * Filter: wp_all_import_attachments_uploads_dir
 * =========================================
 *
 * Can be used to set a custom path in which attachments (uploaded by the "Download & Import Attachments" field) are uploaded. Only applies to attachments uploaded via WP All Import.
 *
 * @since 4.4.9
 *
 * @param $uploads            array - Contains information related to the WordPress uploads path & URL
 * @param $articleData        array - Contains a list of data related to the post/user/taxonomy being imported
 * @param $current_xml_node   array - Contains a list of nodes within the current import record
 * @param $import_id          int   - Contains the ID of the import
 *
 * @return string
 */

add_filter('wp_all_import_attachments_uploads_dir', 'wpai_wp_all_import_attachments_uploads_dir', 10, 4);
function wpai_wp_all_import_attachments_uploads_dir($uploads, $articleData, $current_xml_node, $import_id){

	return $uploads;

}

/**
 * Upload attachments to /woocommerce_uploads folder
 *
 */

function wpai_attachments_uploaded_to_woocommerce_uploads($uploads, $articleData, $current_xml_node, $import_id) {

	$uploads['path'] = $uploads['basedir'] . '/woocommerce_uploads';
	$uploads['url'] = $uploads['baseurl'] . '/woocommerce_uploads';
	
	if (!file_exists($uploads['path'])) {
		mkdir($uploads['path'], 0755, true);
	}

	return $uploads;
}
add_filter('wp_all_import_attachments_uploads_dir', 'wpai_attachments_uploaded_to_woocommerce_uploads', 10, 4);
