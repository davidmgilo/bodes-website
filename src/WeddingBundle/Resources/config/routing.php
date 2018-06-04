<?php
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();
$collection->add('show', new Route('/show', array(
    '_controller' => 'WeddingBundle:Type:show',
)));

return $collection;