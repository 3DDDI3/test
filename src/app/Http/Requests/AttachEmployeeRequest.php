<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @OA\Schema(
 *      title="Attact Worker to order",
 *      description="Привязка сотрудника к заказу",
 *      type="object",
 *      required={"worker"}
 * )
 */
class AttachEmployeeRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="worker",
     *      description="Исполнитель",
     *      example="1"
     * )
     *
     * @var string
     */
    public $worker;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return request()->user() ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'worker' => ['required', Rule::exists('workers', 'id')],
        ];
    }
}
