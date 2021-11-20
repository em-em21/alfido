<?php

namespace App\Http\Livewire\User\Info;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;


class UploadVerificationPhoto extends Component
{
	use WithFileUploads;

	public $image, $tool = 0; // 0 => passport, 1 => driver license

	public $success_message = 'Спасибо! Ваш документ отправлен на верификацию.';

	protected $rules = [
		'tool' => 'required',
		'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
	];

	public function messages()
	{
		return [
			'tool.required' => __('Выбор метода верификации обязателен.'),
			'image.required' => __('Изображение является обязательным.'),
			'image.mimes' => __('Поддерживаются только форматы: jpeg, png, jpg, webp.'),
			// 'image' => __('Загружаемый файл должен быть изображением.'),
			'image.max' => __('Размер изображения не должен превышать 2048мб.')
		];
	}

	public function uploadPhoto()
	{
		$this->validate();

		if ($this->image) {
			$file_name = $this->image->getClientOriginalName();

			$this->image->storeAs('/public/verifications/', $file_name);

			auth()->user()->verifications()->create([
				'tool' => $this->tool === 0 ? 'Паспорт' : 'Водительские права',
				'url' => Storage::url('verifications/'.$file_name)
			]);

			$this->dispatchBrowserEvent('flash-message', $this->success_message);

			$this->image = null;
		}
	}

    public function render()
    {
        return view('livewire.user.info.upload-verification-photo');
    }
}
