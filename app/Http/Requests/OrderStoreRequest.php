<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:255'],
            'technology' => ['required', 'in:resin,fdm'],
            'painting' => ['required', 'in:none,simple,advanced'],
            'assembly' => ['sometimes', 'boolean'],
            'scale' => ['nullable', 'string', 'max:50'],
            'comment' => ['nullable', 'string', 'max:2000'],
            'file' => ['nullable', 'file', 'mimes:stl,obj,3mf,step,stp,zip', 'max:25600'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'имя',
            'contact' => 'контакты',
            'technology' => 'технология печати',
            'painting' => 'опция покраса',
            'assembly' => 'сборка',
            'scale' => 'масштаб',
            'comment' => 'комментарий',
            'file' => 'файл модели',
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'required' => 'Поле «:attribute» обязательно для заполнения.',
            'string' => 'Поле «:attribute» должно быть строкой.',
            'max' => 'Поле «:attribute» слишком длинное (допустимо не более :max символов).',
            'in' => 'Выбрано недопустимое значение для поля «:attribute».',
            'boolean' => 'Поле «:attribute» должно быть логическим.',
            'file.mimes' => 'Файл должен иметь формат :values.',
            'file.max' => 'Файл не должен превышать 25 МБ.',
        ];
    }
}
