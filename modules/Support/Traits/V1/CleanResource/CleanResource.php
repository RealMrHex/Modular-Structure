<?php

namespace Modules\Support\Traits\V1\CleanResource;

use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use ReflectionClass;
use function Filament\Support\get_model_label;
use function Filament\Support\locale_has_pluralization;

trait CleanResource
{
    /**
     * Find the schema automatically
     *
     * @return string
     */
    public static function getSchema(): string
    {
        $_schemaName = str(class_basename(get_called_class()))->replaceLast('Resource', '')->append('Schema')->toString();
        $_schema = get_called_class() . '\\Schema\\' . $_schemaName;
        return class_exists($_schema) ? $_schema : static::$schema;
    }

    #region Form & Table

    /**
     * Get the resource form
     *
     * @param Form $form
     *
     * @return Form
     */
    public static function form(Form $form): Form
    {
        static::getSchema();
        return $form->schema((static::getSchema())::wrappedForm());
    }

    /**
     * Get the resource table
     *
     * @param Table $table
     *
     * @return Table
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns((static::getSchema())::table())
            ->filters((static::getSchema())::tableFilters())
            ->actions((static::getSchema())::tableActions())
            ->bulkActions((static::getSchema())::tableBulkActions())
        ;
    }
    #endregion

    #region Relations
    /**
     * Get the resource relations
     *
     * @return array
     */
    public static function getRelations(): array
    {
        return (static::getSchema())::relations();
    }
    #endregion

    #region Pages
    /**
     * Get the resource pages
     *
     * @return array
     */
    public static function getPages(): array
    {
        $base = get_called_class();

        $resource = (new ReflectionClass(static::class))->getShortName();
        $singular = str($resource)->replaceLast('Resource', '')->toString();
        $plural   = str($singular)->plural()->toString();

        $_list   = "$base\\Pages\\List$plural";
        $_create = "$base\\Pages\\Create$singular";
        $_edit   = "$base\\Pages\\Edit$singular";

        return [
            'index'  => $_list::route('/'),
            'create' => $_create::route('/create'),
            'edit'   => $_edit::route('/{record}/edit'),
        ];
    }
    #endregion

    #region Translation
    /**
     * Get pure model label
     *
     * @return string
     */
    public static function modelLabel(): string
    {
        return static::$modelLabel ?? static::getLabel() ?? get_model_label(static::getModel());
    }

    /**
     * Get translated model label
     *
     * @return string
     */
    public static function getModelLabel(): string
    {
        return __(Str::of(static::modelLabel())->ucfirst()->toString());
    }

    /**
     * Get translated plural model label
     *
     * @return string
     */
    public static function getPluralModelLabel(): string
    {
        if (filled($label = static::$pluralModelLabel ?? static::getPluralLabel()))
            return __($label);

        if (locale_has_pluralization())
            return __(Str::of(static::modelLabel())->plural()->ucfirst()->toString());

        return static::getModelLabel();
    }
    #endregion
}
