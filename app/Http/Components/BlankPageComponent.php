<?php

namespace App\Http\Components;

use Illuminate\Contracts\View\View;

/**
 * Class BlankPage
 *
 * @package App\Http\Components
 */
final class BlankPageComponent extends BaseComponent
{
    public $foo;

    private const PAGE_TITLE = 'Página de Exemplo';

    /**
     * Runs once, immediately after the component is instantiated, but before render() is called.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->setPageTitle(Self::PAGE_TITLE)->pushBreadcrumbs(self::PAGE_TITLE);

        parent::mount();
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.blank-page');
    }

    /**
     * Runs before a property called $foo is hydrated.
     *
     * @param $value
     */
    public function hydrateFoo($value)
    {
        //
    }

    /**
     * Runs before a property called $foo is dehydrated.
     *
     * @param $value
     */
    public function dehydrateFoo($value)
    {
        //
    }

    /**
     * Runs on every request, after the component is hydrated, but before an action is performed, or render() is called.
     */
    public function hydrate()
    {
        //
    }

    /**
     * Runs on every request, before the component is dehydrated, but after render() is called.
     */
    public function dehydrate()
    {
        //
    }

    /**
     *    Runs before any update to the Livewire component's data (Using wire:model, not directly inside PHP).
     *
     * @param $name
     * @param $value
     */
    public function updating($name, $value)
    {
        //
    }

    /**
     * Runs after any update to the Livewire component's data (Using wire:model, not directly inside PHP).
     *
     * @param $name
     * @param $value
     */
    public function updated($name, $value)
    {
        //
    }

    /**
     * Runs before a property called $foo is updated.
     *
     * @param $value
     */
    public function updatingFoo($value)
    {
        //
    }

    /**
     *    Runs after a property called $foo is updated.
     *
     * @param $value
     */
    public function updatedFoo($value)
    {
        //
    }

    /**
     * Runs before updating a nested property bar on the $foo property.
     *
     * @param $value
     */
    public function updatingFooBar($value)
    {
        //
    }

    /**
     * Runs after updating a nested property bar on the $foo property.
     *
     * @param $value
     */
    public function updatedFooBar($value)
    {
        //
    }
}
