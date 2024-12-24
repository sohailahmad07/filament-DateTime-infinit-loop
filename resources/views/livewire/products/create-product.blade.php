<div class="flex justify-center items-center h-screen">
    <form wire:submit="create" class="w-1/3">
        {{ $this->form }}

        <button type="submit" class="mt-4">
            Submit
        </button>
    </form>

    <x-filament-actions::modals />
</div>
