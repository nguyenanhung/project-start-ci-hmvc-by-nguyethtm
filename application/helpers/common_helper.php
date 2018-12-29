<?php
function public_url($url = '')
{
    return base_url('public/' . $url);
}
function show_array($data)
{
    // cũng khôn phết, nếu ko phải copy thì cũng biết cách debug đấy
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}
