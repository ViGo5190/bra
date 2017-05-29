<?php

namespace Vigo5190\Vocabulary;


interface LoaderInterface
{
    /**
     * Load Words
     */
    public function loadWords();

    /**
     * Set source for loading
     *
     * @param $source
     * @return LoaderInterface
     */
    public function setSource($source): LoaderInterface;
}