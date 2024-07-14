<?php

namespace Drupal\form_data_utilities\FormElementTrait;

/**
 *
 */
trait Required {

  /**
   * @var bool
   */
  protected bool $required = FALSE;

  /**
   * @return bool
   */
  public function getRequired(): bool {
    return $this->required;
  }

  /**
   * @param bool $required
   */
  public function setRequired(bool $required): self {
    $this->required = $required;
    return $this;
  }

}