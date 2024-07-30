<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|unique:projects,title|string|min:5|max:100',
            'description' => 'nullable|string|min:10',
            'market_category' => 'nullable|string|min:5|max:150',
            'link' => 'nullable|string|min:10|max:255',
            'image' => 'nullable|image|max:2048|', //* dimensions:max_width:200|dimensions:ratio:3/2',
            'video' => 'nullable|string|min:10|max:255',
            'start_project' => 'nullable|date',
            'end_project' => 'nullable|date',
            'material_created' => 'nullable|string|min:5|max:2500',
            'technologies_used' => 'nullable|string|min:5|max:2500',
            'collaborations' => 'nullable|string|min:5|max:2500',
            'project_grade' => 'nullable|numeric|min:1|max:10',
            //? valido la types:
            'type_id' => 'nullable|exists:types,id',
            //? valido la technologies:
            'technologies' => 'nullable|array',
            'technologies.*' => 'exists:technologies,id',
        ];
    }

    public function messages()
    {
        return [
            'title.unique' => 'Titolo già esistente',
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Inserisci almeno 5 caratteri',
            'title.max' => 'Inserisci massimo 10 caratteri',
            'description.min' => 'Inserisci almeno 10 caratteri',
            'market_category.min' => 'Inserisci almeno 5 caratteri',
            'market_category.max' => 'Inserisci massimo 150 craratteri',
            'link.min' => 'Inserisci almeno 10 caratteri',
            'link.max' => 'Inserisci massimo 255 craratteri',
            'image.min' => 'Inserisci almeno 10 caratteri',
            'image.max' => 'Inserisci un file di massimo :max KB',
            'video.min' => 'Inserisci almeno 10 caratteri',
            'video.max' => 'Inserisci massimo 255 craratteri',
            'start_project.date' => 'Inserisci una data valida',
            'end_project.date' => 'Inserisci una data valida',
            'material_created.min' => 'Inserisci almeno 5 caratteri',
            'material_created.max' => 'Inserisci massimo 2500 craratteri',
            'technologies_used.min' => 'Inserisci almeno 5 caratteri',
            'technologies_used.max' => 'Inserisci massimo 2500 craratteri',
            'collaborations.min' => 'Inserisci almeno 5 caratteri',
            'collaborations.max' => 'Inserisci massimo 2500 craratteri',
            'project_grade.numeric' => 'Inserisci un numero valido da 1 a 10',
            'project_grade.min' => 'Inserisci un numero da 1 a 10',
            'project_grade.max' => 'Inserisci un numero da 1 a 10',
            //? valido la types:
            'type_id.exists' => 'Questa tabella non esiste',
            //? valido la technologies:
            'technology_id.exist' => 'Questa tabella non esiste',
        ];
    }
}

