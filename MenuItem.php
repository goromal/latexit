<?php

namespace dokuwiki\plugin\latexit;

use dokuwiki\Menu\Item\AbstractItem;

/**
 * Class MenuItem
 *
 * Implements the LateXit export button for DokuWiki's menu system
 *
 * @package dokuwiki\plugin\latexit
 */
class MenuItem extends AbstractItem {

    /** @var string do action for this plugin */
    protected $type = 'export_latexit';

    /** @var string icon file */
    protected $svg = DOKU_INC . 'lib/plugins/latexit/f.svg';

    /**
     * MenuItem constructor.
     */
    public function __construct() {
        parent::__construct();
        global $REV, $DATE_AT;

        if($DATE_AT) {
            $this->params['at'] = $DATE_AT;
        } elseif($REV) {
            $this->params['rev'] = $REV;
        }
    }

    /**
     * Get label from plugin language file
     *
     * @return string
     */
    public function getLabel() {
        $hlp = plugin_load('action', 'latexit');
        return $hlp->getLang('export_latexit_button');
    }
}