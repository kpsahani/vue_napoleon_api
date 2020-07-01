/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// config.removeButtons = 'Image,Flash'; // remove plugis 
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	extraPlugins = 'imgupload';

  config.filebrowserImageBrowseUrl = CKEDITOR.basePath + "filemanager/browser/default/browser.html?Type=Image&Connector=" + CKEDITOR.basePath +"filemanager/connectors/php/connector.php";
//Add custom font to ckeditor
config.contentsCss = '/appager/ckeditor/CustomFonts/font.css';
//the next line add the new font to the combobox in CKEditor
config.font_names = 'PlayRegular/PlayRegular;' + config.font_names;

};

