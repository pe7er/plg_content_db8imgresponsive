<?php
/**
 * @package     plg_content_imgresponsive
 * @author      Peter Martin, www.db8.nl
 * @copyright   Copyright (C) 2015 Peter Martin. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 */
defined('_JEXEC') or die;


class PlgContentImgresponsive extends JPlugin
{
    public function onContentPrepare($context, &$row, &$params, $page = 0)
	{
		$parts = explode(".", $context);
		if ($parts[0] != 'com_content')
		{
			return false;
		}

        if (is_object($row))
        {
            return $this->_imgresponsive($row->text, $params);
        }
        return $this->_imgresponsive($row, $params);
	}

    protected function _imgresponsive(&$text, &$params)
    {
        $text = str_replace('<img ', '<img class="img-responsive" ', $text);

        return true;
    }
}
