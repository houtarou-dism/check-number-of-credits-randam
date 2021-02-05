<?php

namespace App\Traits;

use Illuminate\Support\Arr;


trait Obtainable
{
    private $counts;
    private $data = [];
    private $notCompulsorySubjects = [];
    private $selectYears = ['freshman', 'sophomore', 'junior', 'senior'];

    /**
     * jsonから選択したデータを取得
     *
     * @param $json
     * @param $select
     * @return array
     */
    public function getData($json, $select): array
    {
        return Arr::get($json, 'data.'.$select) ?? [];
    }

    /**
     * すべての学年のデータオブジェクト取得
     *
     * @return array
     */
    public function getAllData(): array
    {
        return array_merge($this->data['freshman'], $this->data['sophomore'], $this->data['junior'], $this->data['senior']);
    }

    /**
     * dataに入力されたすべての学年データを追加
     *
     * @param $json
     */
    public function getSelectData($json): void
    {
        foreach ($this->selectYears as $selectYear){
            $this->data[$selectYear] =  $this->getData($json, $selectYear);
        }
    }

    /**
     * 修得している単位数の計算
     *
     * @return int
     */
    public function getTotalCredits(): int
    {
        foreach ($this->selectYears as $selectYear){
            $this->counts += count($this->data[$selectYear]);
        }
        return $this->counts * 2;
    }

    /**
     * １科目で６単位ある卒研が含まれているときの処理
     *
     * @return int
     */
    public function getSpecialTotalCredits(): int
    {
        return $this->requiredSenior() === [] ? $this->getTotalCredits() + 4 : $this->getTotalCredits();
    }

    /**
     * 必修科目だが、取得できていない科目を取得
     *
     * @param array $freshman
     * @param array $sophomore
     * @param array $junior
     * @param array $senior
     * @return array
     */
    public function getRequiredAll($freshman = [], $sophomore = [], $junior = [], $senior = []): array
    {
        $years = [
            'freshman' => $freshman, 'sophomore' => $sophomore,
            'junior' => $junior, 'senior' => $senior
        ];

        foreach ($years as $year => $value){
            $this->notCompulsorySubjects[$year] = $this->requiredSubjectsJapanese($year, $value);
        }

        return $this->notCompulsorySubjects;
    }

    /**
     * オブジェクトの単位計算用関数
     *
     * @param $data
     * @return float|int
     */
    public function getCreditsCalculation($data)
    {
        return count($data) * 2;
    }

    /**
     * 専門基礎科目と専門教育科目の合計
     *
     * @return array
     */
    public function getTotalSpecialized(): array
    {
        return array_merge($this->specializedFreshman(), $this->specializedSophomore(), $this->specializedJunior(), $this->specializedSenior());
    }

    /**
     * 必修科目で落とした科目がないか確認
     *
     * @return bool
     */
    public function getTotalRequiredSubjects(): bool
    {
        return $this->notCompulsorySubjects['freshman'] === [] && $this->notCompulsorySubjects['sophomore'] === []
                && $this->notCompulsorySubjects['junior'] === [] && $this->notCompulsorySubjects['senior'] === [];
    }

    /**
     * 進級判定（２年次→３年次）
     *
     * @return string
     */
    public function getJudePromotionSophomore(): string
    {
        return $this->counts * 2 >= 64 ? 'success' : 'failure';
    }


    /**
     * 進級判定（３年次→４年次）
     *
     * @return string
     */
    public function getJudePromotionJunior(): string
    {
        return $this->counts * 2 >= 104
                && $this->getCreditsCalculation($this->getTotalSpecialized()) >= 62
                ? 'success' : 'failure';
    }

    //進級判定（卒業）
    public function getJudePromotionSenior(): string
    {
        $allData = $this->getAllData();

        return  ($this->requiredSenior() === [] ? $this->counts * 2 + 4 : $this->counts * 2) >= 124
                && $this->getCreditsCalculation($this->cultureEducation($allData)) >= 14
                && $this->getCreditsCalculation($this->skillEducationForeign($allData)) >= 8
                && $this->getCreditsCalculation($this->skillEducationCareer($allData)) >= 2
                && $this->getCreditsCalculation($this->getTotalSpecialized()) >= 84
                && $this->getTotalRequiredSubjects() === true
                ? 'success' : 'failure';
    }
}
