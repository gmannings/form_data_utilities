<?php

namespace Drupal\form_data_utilities\FormElementTrait;

use Drupal\form_data_utilities\FormBuilder;
use Drupal\form_data_utilities\FormElementInterface;

trait Children {

  /**
   * @var \Drupal\form_data_utilities\FormBuilder|null
   */
  protected ?FormBuilder $children = NULL;

  public function children(): FormBuilder {
    if (is_null($this->children)) {
      $this->children = new FormBuilder();
      $this->children->setParent($this);
    }
    return $this->children;
  }

}