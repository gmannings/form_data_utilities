<?php

namespace Drupal\form_data_utilities\FormElementTrait;

/**
 *
 */
trait DefaultValue {

  /**
   * @var string|null
   */
  protected ?string $defaultValue = NULL;

  /**
   * @return string|null
   */
  public function getDefaultValue(): ?string {
    return $this->defaultValue;
  }

  /**
   * @param string|null $defaultValue
   */
  public function setDefaultValue(?string $defaultValue): self {
    $this->defaultValue = $defaultValue;
    return $this;
  }

}