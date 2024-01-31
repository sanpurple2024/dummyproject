/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	config.filebrowserBrowseUrl = 'assets/ckeditor12/kcfinder/browse.php?opener=ckeditor12&type=files';
   config.filebrowserImageBrowseUrl = 'assets/ckeditor12/kcfinder/browse.php?opener=ckeditor12&type=images';
   config.filebrowserFlashBrowseUrl = 'assets/ckeditor12/kcfinder/browse.php?opener=ckeditor12&type=flash';
   config.filebrowserUploadUrl = 'assets/ckeditor12/kcfinder/upload.php?opener=ckeditor12&type=files';
   config.filebrowserImageUploadUrl = 'assets/ckeditor12/kcfinder/upload.php?opener=ckeditor12&type=images';
   config.filebrowserFlashUploadUrl = 'assets/ckeditor12/kcfinder/upload.php?opener=ckeditor12&type=flash';
   config.removePlugins = 'liststyle,tabletools,scayt,menubutton,contextmenu';
   config.disableNativeSpellChecker = false;

};
