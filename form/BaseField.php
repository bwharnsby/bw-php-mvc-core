<?php


namespace bwharnsby\phpmvc\form;


use bwharnsby\phpmvc\Model;

abstract class BaseField
{
    public Model $model;
    public string $attribute;

    /**
     * InputField constructor.
     * @param Model $model
     * @param string $attribute
     */
    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }

    abstract public function renderInput(): string;

    public function __toString()
    {
        return sprintf('
            <div class="mb-3">
                <label class="form-label">%s</label>
                %s
                <div class="invalid-feedback">%s</div>
            </div>
        ',
            $this->model->getLabel($this->attribute),
            $this->renderInput(),
            $this->model->getFirstError($this->attribute)
        );
    }
}