<?php

namespace App\Http\Requests;
use App\Models\Tool;
use App\Models\Category;
use App\Models\Condition;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ToolRequest extends FormRequest
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
        return [];
        /*
        $conditionIds = self::getConditionIds();

        return [
            'name' => 'required| string',
            'category' => 'required',
            'tool' => [Rule::in($conditionIds)],
        ];
        */
    }

    public function getName(): string
    {
        return $this->input('tool_name');
    }

    public function getCategoryID(): string
    {
        return explode(',', $this->input('category'))[0];
    }
    public function getCategoryName(): string
    {
        return explode(',', $this->input('category'))[1];
    }

    public function getCondition() : string
    {
        return $this->input('condition');
    }

    public function getToolById(): int
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
