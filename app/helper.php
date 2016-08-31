<?php

function imgSrc(string $name)
{
    return 'http://' . $_SERVER['HTTP_HOST'] . '/static/' . $name;
}