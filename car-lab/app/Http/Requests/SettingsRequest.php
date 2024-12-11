<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
            'title'             => 'nullable|string|max:255',
            'company_name'      => 'nullable|string|max:255',
            'description'       => 'nullable|string',
            'phone'             => 'nullable|string|max:20',
            'email'             => 'nullable|email|max:255',
            'address'           => 'nullable|string',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string|max:255',
            'meta_keywords'     => 'nullable|string|max:255',
            'about_description' => 'nullable|string',
            'about_image'       => 'nullable|image|mimes:jpg,jpeg,png,gif|max:1024',
            'slider_image'      => 'nullable|image|mimes:jpg,jpeg,png,gif|max:1024',
            'breadcrumb_image'  => 'nullable|image|mimes:jpg,jpeg,png,gif|max:1024',
            'whatsapp'          => 'nullable|string|max:20',
            'twitter'           => 'nullable|string|max:255',
            'facebook'          => 'nullable|string|max:255',
            'instagram'         => 'nullable|string|max:255',
            'google_map'        => 'nullable|string|max:255',
        ];
    }
}