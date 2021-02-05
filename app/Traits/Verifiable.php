<?php

namespace App\Traits;


trait Verifiable
{
    /**
     * 大学１年次必修科目
     *
     * @return array|string
     */
    public function requiredFreshman()
    {
        $compulsorySubjects = [
            'communication_basics', 'career_development', 'physics_one', 'linear_algebra_one', 'analysis_one', 'basic_information_seminar',
            'computer_science', 'computer_literacy', 'c_programming_one', 'c_programming_two', 'electric_circuit_one', 'computer_architecture_one'
        ];

        return array_values(array_diff($compulsorySubjects, $this->data['freshman']));
    }

    /**
     * 大学２年次必修科目
     *
     * @return array|string
     */
    public function requiredSophomore()
    {
        $compulsorySubjects = [
            'stochastic_theory', 'automata_and_formal_languages', 'java_programming_one', 'operating_system',
            'data_structures_and_algorithms', 'logic_circuit', 'information_engineering_experiment_one', 'information_engineering_experiment_two'
        ];

        return array_values(array_diff($compulsorySubjects, $this->data['sophomore']));
    }

    /**
     * 大学３年次必修科目
     *
     * @return array|string
     */
    public function requiredJunior()
    {
        $compulsorySubjects = [
            'special_lecture_on_information_technology', 'information_engineering_experiment_three', 'human_computer_interaction',
            'information_technology_ethics', 'information_engineering_experiment_four', 'information_network'
        ];

        return array_values(array_diff($compulsorySubjects, $this->data['junior']));
    }

    /**
     * 大学４年次必修科目
     *
     * @return array|string
     */
    public function requiredSenior()
    {
        $compulsorySubjects = ['graduation_thesis'];

        return array_values(array_diff($compulsorySubjects, $this->data['senior']));
    }

    /**
     * 教養教育科目 人文社会分野（大学１年 ～ ４年次）
     *
     * @param $data
     * @return array
     */
    public function cultureEducation($data): array
    {
        $subjects = [
            'kyushu', 'cognitive_psychology', 'literature', 'overseas_circumstances', 'japan_circumstances-one', 'communication_basics',
            'economy_and_society', 'ethics', 'life_and_law', 'japan_circumstances-two', 'modern_economics', 'constitution_of_japan',
            'theory_of_popular_society', 'history_of_modern_japanese_thought', 'philosophy', 'industry_and_law'
        ];

        return array_values(array_intersect($subjects, $data));
    }

    /**
     * スキル教育科目 外国語分野（大学１年 ～ ４年次）
     *
     * @param $data
     * @return array
     */
    public function skillEducationForeign($data): array
    {
        $subjects = [
            'advanced_english_a', 'english_a', 'chinese_one', 'korean_one', 'Japanese_one', 'advanced_english_b', 'english_b', 'chinese_two',
            'korean_two', 'Japanese_two', 'advanced_english_c', 'english_c', 'advanced_english_d', 'english_d', 'academic_english_a',
            'conversation_a', 'french_one', 'german_one', 'academic_english_b', 'conversation_b', 'french_two', 'german_two', 'academic_english_c',
            'conversation_c', 'academic_english_d', 'conversation_d'
        ];

        return array_values(array_intersect($subjects, $data));
    }

    /**
     * スキル教育科目 キャリア形成分野（大学１年 ～ ４年次）
     *
     * @param $data
     * @return array
     */
    public function skillEducationCareer($data): array
    {
        $subjects = ['career_development', 'japanese_expression', 'work_experience_one', 'work_experience_two'];

        return array_values(array_intersect($subjects, $data));
    }

    /**
     * 専門基礎科目（大学１年次）
     *
     * @param $data
     * @return array
     */
    public function specializedFoundationFreshman($data): array
    {
        $subjects = [
            'basic_physics', 'basic_electromagnetism', 'linear_algebra_one', 'analysis_one',
            'physics_one', 'linear_algebra_two', 'analysis_two'
        ];

        return array_values(array_intersect($subjects, $data));
    }

    /**
     * 専門教育科目（大学１年次）
     *
     * @param $data
     * @return array
     */
    public function specializedEducationFreshman($data): array
    {
        $subjects = [
            'basic_information_seminar', 'computer_science', 'computer_literacy', 'c_programming_one', 'electric_circuit_one', 'discrete_mathematics',
            'c_programming_two', 'electric_circuit_two', 'computer_architecture_one', 'fundamentals_of_artificial_intelligence', 'multimedia_engineering'
        ];

        return array_values(array_intersect($subjects, $data));
    }

    /**
     * 専門基礎科目（大学２年次）
     *
     * @param $data
     * @return array
     */
    public function specializedFoundationSophomore($data): array
    {
        $subjects = [
            'physics_two', 'linear_algebra_three', 'analysis_three', 'information_physics',
            'geometrical_information_mathematics', 'differential_equation'
        ];

        return array_values(array_intersect($subjects, $data));
    }

    /**
     * 専門教育科目（大学２年次）
     *
     * @param $data
     * @return array
     */
    public function specializedEducationSophomore($data): array
    {
        $subjects = [
            'stochastic_theory', 'automata_and_formal_languages', 'artificial_intelligence_programming', 'java_programming_one',
            'operating_system', 'electronic_circuit', 'logic_circuit', 'computer_architecture_two', 'information_engineering_experiment_one',
            'database', 'numerical_calculation', 'java_programming_two', 'data_structures_and_algorithms', 'logic_design',
            'information_equipment_engineering', 'information_engineering_experiment_two', 'natural_language_processing',
            'computer_graphics', 'artificial_intelligence_application', 'project_based_exercise_one', 'information_technology_certification_one'
        ];

        return array_values(array_intersect($subjects, $data));
    }

    /**
     * 専門基礎科目（大学３年次）
     *
     * @param $data
     * @return array
     */
    public function specializedFoundationJunior($data): array
    {
        $subjects = [
            'geometry_and_multimedia', 'complex_function_theory', 'algebra_and_cryptography'
        ];

        return array_values(array_intersect($subjects, $data));
    }

    /**
     * 専門教育科目（大学３年次）
     *
     * @param $data
     * @return array
     */
    public function specializedEducationJunior($data): array
    {
        $subjects = [
            'special_lecture_on_information_technology', 'information_theory', 'network_programming', 'software_engineering_one',
            'information_engineering_experiment_three', 'digital_system_design', 'human_computer_interaction', 'pattern_recognition',
            'image_processing', 'information_technology_certification_two', 'information_technology_ethics', 'english_presentation',
            'hci_programming', 'software_engineering_two', 'information_engineering_experiment_four', 'system_lsi', 'information_network',
            'information_security', 'digital_signal_processing', 'audio_information_processing', 'robotics', 'project_based_exercise_two'
        ];

        return array_values(array_intersect($subjects, $data));
    }

    /**
     * 専門基礎科目（大学４年次）
     *
     * @param $data
     * @return array
     */
    public function specializedFoundationSenior($data): array
    {
        $subjects = [
            'applied_geometry', 'algebra_and_encoding'
        ];

        return array_values(array_intersect($subjects, $data));
    }

    /**
     * 専門教育科目（大学４年次）
     *
     * @param $data
     * @return array
     */
    public function specializedEducationSenior($data): array
    {
        $subjects = ['graduation_thesis'];

        return array_values(array_intersect($subjects, $data));
    }

    /**
     * 専門基礎科目と専門教育科目をまとめた関数（大学１年次）
     *
     * @return array
     */
    public function specializedFreshman(): array
    {
        return array_merge($this->specializedFoundationFreshman($this->data['freshman']), $this->specializedEducationFreshman($this->data['freshman']));
    }

    /**
     * 専門基礎科目と専門教育科目をまとめた関数（大学２年次）
     *
     * @return array
     */
    public function specializedSophomore(): array
    {
        return array_merge($this->specializedFoundationSophomore($this->data['sophomore']), $this->specializedEducationSophomore($this->data['sophomore']));
    }

    /**
     * 専門基礎科目と専門教育科目をまとめた関数（大学３年次）
     *
     * @return array
     */
    public function specializedJunior(): array
    {
        return array_merge($this->specializedFoundationJunior($this->data['junior']), $this->specializedEducationJunior($this->data['junior']));
    }

    /**
     * 専門基礎科目と専門教育科目をまとめた関数（大学４年次）
     *
     * @return array
     */
    public function specializedSenior(): array
    {
        return array_merge($this->specializedFoundationSenior($this->data['senior']), $this->specializedEducationSenior($this->data['senior']));
    }
}
