<?php

namespace App\Imports;

use App\Models\category;
use App\Models\Question;
use App\Models\vocabulary;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class QuestionsImport implements
    ToModel,
    WithHeadingRow,
    SkipsOnError,
    SkipsOnFailure,
    WithValidation
{
    use Importable, SkipsErrors, SkipsFailures;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Question([
            'category_id' => category::where('name', $row['category'])->first()->id,
            'vocabulary_id' => vocabulary::where('name', $row['vocabulary'])->first()->id,
            'question' => $row['question'],
            'a' => $row['a'],
            'b' => $row['b'],
            'c' => $row['c'],
            'd' => $row['d'],
            'answer' => $row['answer'],
        ]);
    }
    public function rules(): array
    {

        return [
            'vocabulary' => 'required|exists:vocabularies,name',
            'category' => 'required|exists:categories,name',
            'question' => 'required|unique:questions,question'
        ];
    }
}