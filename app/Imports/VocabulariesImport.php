<?php

namespace App\Imports;

use App\Models\Vocabulary;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class VocabulariesImport implements
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
        return new Vocabulary([
            'name'  => $row['name'],
            'meaning' => $row['meaning'],
            'content'    => $row['content'],
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:vocabularies,name|max:50',
            'meaning' => 'required|unique:vocabularies,meaning|max:50',
        ];
    }
}