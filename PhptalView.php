<?php
/**
 * Methods for displaying presentation data using PHPTAL (http://phptal.org/)
 *
 * Copyright (c) 2012, Oliver Wolschke
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright       Copyright (c) 2012, Oliver Wolschke
 * @version         0.1
 * @license         http://www.opensource.org/licenses/mit-license.php The MIT License
 */

/**
 * Load PHPTal first
 * 
 * Loading vendors usually means you are loading packages that do not follow conventions.
 * For most vendor packages using App::import() is recommended.
 */
App::import('Vendor', 'Phptal', array('file' => 'PHPTAL/classes/PHPTAL.php'));

class PhptalView extends View
{
    /**
     * PHPTALView constructor
     *
     * @param  $controller instance of calling controller
     */
    function __construct(&$controller)
    {
        parent::__construct($controller);

        $this->ext = ".zpt";
        $this->template = new PHPTAL();
        $this->template->setOutputMode(PHPTAL::HTML5);
    }

    /**
     * Renders and returns PHPTAL template for given view with its array of data.
     *
     * @param string $___viewFn Filename of the view
     * @param array $___dataForView Data to include in rendered view
     * @return string Rendered output
     * @access protected
     */
    function _render($___viewFn, $___dataForView = array())
    {
        $this->template->setTemplate($___viewFn);

        if(empty($___dataForView))
        {
            $___dataForView = $this->viewVars;
        }

        foreach($___dataForView as $data => $value)
        {
            $this->template->set($data, $value);
        }

        if($this->helpers != false)
        {
            $helpers = HelperCollection::normalizeObjectArray($this->helpers);
            foreach($helpers as $name => $properties)
            {
                list($plugin, $class) = pluginSplit($properties['class']);
                $replace = strtolower(substr($class, 0, 1));
                if(!array_key_exists($class, $___dataForView))
                {
                    $camelBackedHelper = preg_replace('/\\w/', $replace, $class, 1);
                    $this->template->set($camelBackedHelper, $this->{$class});
                }
            }
        }

        try
        {
            return $this->template->execute();
        }
        catch(Exception $e)
        {
            return Configure::read('debug') > 0 ? "<pre>".$e->__toString()."</pre>" : __('Doh, an error in the template. I will respond immediately.');
        }
    }
}
