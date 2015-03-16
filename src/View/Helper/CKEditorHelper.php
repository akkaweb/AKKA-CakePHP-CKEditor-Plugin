<?php

namespace AkkaCKEditor\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * CKEditor helper
 */
class CKEditorHelper extends Helper {

    /**
     * Default configuration.
     *
     * @var array
     *    
     */
    protected $_defaultConfig = [
      'version' => '4.4.7',
      'distribution' => 'full'
    ];

    /**
     * Merged configuration
     * 
     * @var type array
     */
    protected $_configs = [];

    /**
     * Local plugins
     * 
     * @var type String
     */
    protected $_plugins = null;

    /**
     * Form textarea field CKEditor will be displayed on
     * 
     * @var type String
     */
    protected $_field = null;

    /**
     * Construct
     * 
     * @param View $view
     * @param type $config
     */
    public function __construct(View $view, $config = []) {
        parent::__construct($view, $config);
        $this->_configs = $this->config();
    }

    /**
     * Loads CKeditor into template
     * 
     * @local_plugins => [
     *      'abbr' => [
     *          'location' => '/js/ckeditor/plugins/abbr/',
     *          'file' => 'abbr.js'
     *      ],      
     * ]
     * 
     * @param String $field
     * @param Array $local_plugins
     */
    public function loadJs(/*$field = 'editor1', $local_plugins = []*/) {
        $cdn_file = "//cdn.ckeditor.com/{$this->_configs['version']}/{$this->_configs['distribution']}/ckeditor.js";
        /*$this->_field = $field;

        if (!empty($local_plugins)) {
            $this->__setLocalPlugins();
        }*/
        
//        return <<<EOT
//            <script src="{$cdn_file}"></script>
//            <script>
//                {$this->_plugins}
//            </script>
//EOT;
        return '<script src="'.$cdn_file.'"></script>';
    }

    public function replace($field = 'editor1') {
        return <<<EOT
            <script>
                CKEDITOR.replace( '{$field}' );
            </script>
EOT;
    }

    private function __setLocalPlugins() {
        $plugins = '';

        foreach ($this->_configs['local_plugin'] as $key => $value) {
            $this->_plugins .= "CKEDITOR.plugins.addExternal( '{$key}', '{$value['location']}', '{$value['file']}' ); \n";
            $plugins .= "{$key},";
        }

        $this->_plugins .= "CKEDITOR.replace( '{$this->_field}', { \n";
        $this->_plugins .= "extraPlugins: '{$plugins}' \n";
        $this->_plugins .= "} ); \n";
    }

}
