<?php

namespace Drupal\form_data_utilities\FormBuilder;

use Drupal\form_data_utilities\FormBuilder;

abstract class FormElement implements FormElementInterface {

  public function __construct(
    protected FormBuilder           $formBuilder,
    protected ?FormElementInterface $parent = NULL
  ) {
  }

  public function done(): FormBuilder|FormElementInterface {
    return is_null($this->parent) ? $this->formBuilder : $this->parent;
  }

  public function getRenderArray(): array {
    return [];
  }

}