<?php
/**
 * Lazyload class
 */

class Lazyload {
    public static function ThumbnailBeforeProduceHTML($thumb, &$attribs, &$linkAttribs) {
        global $wgRequest, $wgTitle;
        if (defined('MW_API') && $wgRequest->getVal('action') === 'parse') return true;
        if (isset($wgTitle) && $wgTitle->getNamespace() === NS_FILE) return true;
        if (isset($attribs['class']) && strpos( $attribs['class'], 'no-lazy' ) !== false) return true;
	    $attribs['data-src'] = $attribs['src'];
        $attribs['src'] = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
        $attribs['loading'] = 'lazy';
        $attribs['class'] = 'lazyload';
	    if (isset($attribs['srcset'])) {
		    $attribs['data-srcset'] = $attribs['srcset'];
		    unset($attribs['srcset']);
		}
        return true;
    }
    public static function BeforePageDisplay($out, $skin) {
        $out->addModules( 'ext.lazyload' );
        return true;
    }
}
