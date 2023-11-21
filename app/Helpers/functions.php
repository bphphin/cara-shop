<?php
function checkEndDisplayMsg($flat=true,$type,$title='',$mgs='',$route='') {
    if($flat) {
        Alert::$type($title, $mgs);
        return redirect()->route($route);
    }
    Alert::error('Failed', 'Có lỗi xảy ra');
    return redirect()->back();

}
