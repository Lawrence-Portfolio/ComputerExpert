<?php namespace Bizmark\Expert\Classes\Event\ThemeData;

use Cms\Models\ThemeData;

/**
 * Class ThemeDataModelHandler
 * @package Bizmark\Expert
 * @author Yuri Todosienko, yuri@biz-mark.ru, Biz-Mark
 */
class ThemeDataModelHandler
{
    /** @var ThemeData */
    protected $obElement;

    /**
     * Add listeners
     * @param \Illuminate\Events\Dispatcher $obEvent
     */
    public function subscribe($obEvent)
    {
        $sModelClass = $this->getModelClass();
        $sModelClass::extend(function ($obElement) {
            $this->obElement = $obElement;
            $this->addJsonableFields();
        });
    }

    protected function addJsonableFields()
    {
        $arFields = [
            'index',
            'contacts',
        ];

        $this->obElement->addJsonable($arFields);
    }

    /**
     * Get model class name
     * @return string
     */
    protected function getModelClass(): string
    {
        return ThemeData::class;
    }
}
