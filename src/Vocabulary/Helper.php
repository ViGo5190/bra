<?php

namespace Vigo5190\Vocabulary;


class Helper
{
    /**
     * Clear word
     *
     * @param string $word
     * @return string
     */
    public static function clearWord(string $word): string
    {
        return strtolower(trim($word));
    }

}