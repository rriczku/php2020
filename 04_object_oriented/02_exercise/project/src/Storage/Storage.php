<?php
namespace Storage;

use Concept\Distinguishable;
interface Storage
{
    public function store(Distinguishable $dis);
    public function loadAll();
}