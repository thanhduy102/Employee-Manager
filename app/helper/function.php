<?php
function show_error($errors,$name)
{
    if($errors->has($name))
    return '
    <div class="alert alert-danger" role="alert">
        <strong>'.$errors->first($name).'</strong>
    </div>
    ';
   

}