/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
    config.allowContent = false;
    config.font_names = 'Arial;Arial Black;Comic Sans MS;Courier New;Tahoma;Times New Roman;Verdana;新細明體;細明體;標楷體;微軟正黑體';
    config.undoStackSize = 50;
    config.pasteFilter = null;
    config.width = '100%';
    config.height = '80%';
    config.htmlEncodeOutput = false;
    config.entities = false;
    // Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};
