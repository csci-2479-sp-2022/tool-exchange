<?php

namespace App\Http\Requests;

use App\Models\Tool;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $toolIds = self::getToolIds();

        return [
            'name' => 'required|string',
            'condition' => 'required|string',
            'category' => 'required|string',
            'tool' => [ Rule::in($toolIds) ]
        ];
    }

    public function getName(): string
    {
        return $this->input('name');
    }

    public function getCondition(): string
    {
        return $this->input('condition');
    }

    public function getCategory(): string
    {
        return $this->input('category');
    }

    public function getSystemId(): int
    {
        return $this->input('tool');
    }

    public function getCompletedBoolean(): bool
    {
        $completed = $this->input('completed');

        return isset($completed);
    }

    private static function getToolIds(): array
    {
        $idRows = Tool::select('id')->get()->toArray();

        return array_map(fn($row) => $row['id'], $idRows);
    }
}
