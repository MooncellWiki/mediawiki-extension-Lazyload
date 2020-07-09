<?php
class Lazyload {
    public static function ThumbnailBeforeProduceHTML($thumb, &$attribs, &$linkAttribs) {
        global $wgRequest, $wgTitle;
        if (defined('MW_API') && $wgRequest->getVal('action') === 'parse') return true;
        if (isset($wgTitle) && $wgTitle->getNamespace() === NS_FILE) return true;
        if (isset($attribs['class']) && strpos( $attribs['class'], 'no-lazy' ) !== false) return true;
	    $attribs['data-src'] = $attribs['src'];
        $attribs['src'] = 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=';
        $attribs['class'] = 'lazyload';
	    if (isset($attribs['srcset'])) {
		    $attribs['data-srcset'] = $attribs['srcset'];
		    unset($attribs['srcset']);
		}
        return true;
    }
    public static function BeforePageDisplay($out, $skin) {
        $out->addHeadItems('<script type="application/javascript">function isSupportWebp(){try{return;document.createElement("canvas").toDataURL("image/webp",0.5).indexOf("data:image/webp")===0?1:2}catch(err){return 2}}document.addEventListener("lazybeforeunveil",function(e){if(SUPPORT_WEBP!=1&&SUPPORT_WEBP!=2){SUPPORT_WEBP=isSupportWebp()}if(SUPPORT_WEBP==1){var src=e.target.getAttribute("data-src").split(".");if(["png","jpg","jpeg"].includes(src[src.length-1])){src.pop();src.push("webp");e.target.setAttribute("data-src",src.join("."))}}});</script>');
        $out->addHeadItems('<script src="https://s3.pstatp.com/cdn/expire-1-M/lazysizes/4.1.8/lazysizes.min.js" type="application/javascript"></script>');
        return true;
    }
}
