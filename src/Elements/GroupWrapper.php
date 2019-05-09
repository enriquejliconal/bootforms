<?php

namespace Galahad\BootForms\Elements;

class GroupWrapper
{
    /** @var FormGroup */
    protected $formGroup;

    /** @var \Galahad\Forms\Elements\Element */
    protected $target;

    /**
     * @param $formGroup
     */
    public function __construct(FormGroup $formGroup)
    {
        $this->formGroup = $formGroup;
        $this->target = $formGroup->control();
    }

    /**
     * @param $text
     * @return $this
     */
    public function helpBlock($text)
    {
        $this->formGroup->helpBlock($text);

        return $this;
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->render();
    }

    /**
     * @return string
     */
    public function render()
    {
        return $this->formGroup->render();
    }

    /**
     * @param $class
     * @return $this
     */
    public function addGroupClass($class)
    {
        $this->formGroup->addClass($class);

        return $this;
    }

    /**
     * @param mixed $id
     * @return $this
     */
    public function setGroupId($id)
    {
        $this->formGroup->id($id);

        return $this;
    }

    /**
     * @param $class
     * @return $this
     */
    public function removeGroupClass($class)
    {
        $this->formGroup->removeClass($class);

        return $this;
    }

    /**
     * @param $attribute
     * @param $value
     * @return $this
     */
    public function groupData($attribute, $value)
    {
        $this->formGroup->data($attribute, $value);

        return $this;
    }

    /**
     * @return $this
     */
    public function hideLabel()
    {
        $this->labelClass('sr-only');

        return $this;
    }

    /**
     * @param $class
     * @return $this
     */
    public function labelClass($class)
    {
        $this->formGroup->label()->addClass($class);

        return $this;
    }

    /**
     * @param bool $conditional
     * @return $this
     */
    public function required($conditional = true)
    {
        if ($conditional) {
            $this->formGroup->label()->addClass('control-label-required');
        }

        call_user_func_array([$this->target, 'required'], [$conditional]);

        return $this;
    }

    /**
     * @return $this
     */
    public function inline()
    {
        $this->formGroup->inline();

        return $this;
    }

    /**
     * @return $this
     */
    public function group()
    {
        $this->target = $this->formGroup;

        return $this;
    }

    /**
     * @return $this
     */
    public function label()
    {
        $this->target = $this->formGroup->label();

        return $this;
    }

    /**
     * @return $this
     */
    public function control()
    {
        $this->target = $this->formGroup->control();

        return $this;
    }

    /**
     * @param $method
     * @param $parameters
     * @return $this
     */
    public function __call($method, $parameters)
    {
        call_user_func_array([$this->target, $method], $parameters);

        return $this;
    }
}
