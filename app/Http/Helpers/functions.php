<?php
function checkEndDisplayMsg($flat=true,$type,$title='',$mgs='',$route='') {
    if($flat) {
        Alert::$type($title, $mgs);
        return redirect()->route($route);
    }
}
