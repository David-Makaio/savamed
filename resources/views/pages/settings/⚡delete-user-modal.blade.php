<?php

use App\Concerns\PasswordValidationRules;
use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

new class extends Component {
    use PasswordValidationRules;

    public string $password = '';

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => $this->currentPasswordRules(),
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
}; ?>

<x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable class="max-w-lg">
    <form method="POST" wire:submit="deleteUser" class="space-y-6 p-6">
        <div>
            <x-heading size="lg">{{ __('Are you sure you want to delete your account?') }}</x-heading>

            <x-subheading>
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </x-subheading>
        </div>

        <x-input wire:model="password" :label="__('Password')" type="password" viewable />

        <div class="flex justify-end space-x-2 rtl:space-x-reverse">
            <x-modal-close>
                <x-button variant="filled">{{ __('Cancel') }}</x-button>
            </x-modal-close>

            <x-button variant="danger" type="submit" data-test="confirm-delete-user-button">
                {{ __('Delete account') }}
            </x-button>
        </div>
    </form>
</x-modal>
