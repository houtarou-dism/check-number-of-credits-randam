<?php

namespace App\Traits;


trait Convertible
{

    /**
     * 必修科目の日本語化
     *
     * @param $selectYear
     * @param $langs
     * @return mixed
     */
    public function requiredSubjectsJapanese($selectYear, $langs)
    {
        foreach ($langs as &$lang){
            $lang = config('japanese_constant.'.$selectYear.'.'.$lang);
        }
        unset($lang);

        return $langs;
    }
}
