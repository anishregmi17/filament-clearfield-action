<?php

namespace Anish\ClearFieldAction\Actions;

use Closure;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\EditRecord;

class ClearFieldAction extends Action
{
    protected ?Closure $beforeReset = null;

    protected ?Closure $afterReset = null;

    protected bool $showNotification = true;

    protected ?string $notificationTitle = null;

    protected ?string $notificationBody = null;

    public static function getDefaultName(): ?string
    {
        return 'clearFields';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $config = config('clearfield-action');

        $this->icon($config['icon'] ?? 'heroicon-o-arrow-path')
            ->modalIcon($config['modal_icon'] ?? 'heroicon-o-arrow-path')
            ->color($config['color'] ?? 'gray')
            ->label($config['label'] ?? null)
            ->tooltip($config['tooltip'] ?? 'Clear all form fields');

        if ($config['requires_confirmation'] ?? false) {
            $this->requiresConfirmation()
                ->modalHeading($config['confirmation_title'] ?? 'Clear Form Fields?')
                ->modalDescription($config['confirmation_description'] ?? 'Are you sure you want to clear all form fields? This action cannot be undone.');
        }

        $this->action($this->clearFields(...));
    }

    /**
     * Set whether the action requires confirmation before clearing fields.
     */
    public function requiresConfirmation(bool | Closure $condition = true): static
    {
        return parent::requiresConfirmation($condition);
    }

    /**
     * Set the confirmation dialog title (alias for modalHeading).
     */
    public function confirmationTitle(string | Closure | null $title): static
    {
        return $this->modalHeading($title);
    }

    /**
     * Set the confirmation dialog description (alias for modalDescription).
     */
    public function confirmationDescription(string | Closure | null $description): static
    {
        return $this->modalDescription($description);
    }

    /**
     * Set a callback to execute before clearing fields.
     */
    public function beforeReset(Closure $callback): static
    {
        $this->beforeReset = $callback;

        return $this;
    }

    /**
     * Set a callback to execute after clearing fields.
     */
    public function afterReset(Closure $callback): static
    {
        $this->afterReset = $callback;

        return $this;
    }

    /**
     * Set whether to show a notification after clearing fields.
     */
    public function showNotification(bool | Closure $show = true): static
    {
        $this->showNotification = $this->evaluate($show);

        return $this;
    }

    /**
     * Set the notification title.
     */
    public function notificationTitle(string | Closure | null $title): static
    {
        $this->notificationTitle = $this->evaluate($title);

        return $this;
    }

    /**
     * Set the notification body.
     */
    public function notificationBody(string | Closure | null $body): static
    {
        $this->notificationBody = $this->evaluate($body);

        return $this;
    }

    /**
     * Clear the form fields.
     */
    protected function clearFields(CreateRecord | EditRecord $livewire): void
    {
        if ($this->beforeReset !== null) {
            $this->evaluate($this->beforeReset, [
                'livewire' => $livewire,
            ]);
        }

        $livewire->form->fill();

        if ($this->afterReset !== null) {
            $this->evaluate($this->afterReset, [
                'livewire' => $livewire,
            ]);
        }

        if ($this->showNotification) {
            $title = $this->notificationTitle ?? config('clearfield-action.notification_title', 'Form Cleared');
            $body = $this->notificationBody ?? config('clearfield-action.notification_body', 'All form fields have been cleared successfully.');

            Notification::make()
                ->title($title)
                ->body($body)
                ->success()
                ->send();
        }
    }
}
