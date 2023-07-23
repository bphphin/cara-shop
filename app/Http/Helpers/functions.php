<?php
function checkEndDisplayMsg($flat=true,$mgs='',$title='',$route='') {
    if($flat) {
        toastr()->success($mgs, $title);
        return redirect()->route($route);
    }
}
