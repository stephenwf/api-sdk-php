<?php

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->exclude('vendor-extra')
;

return Symfony\CS\Config\Config::create()
    ->level(Symfony\CS\FixerInterface::SYMFONY_LEVEL)
    ->fixers(['-empty_return', 'ordered_use'])
    ->finder($finder)
;
