<?php

namespace Drupal\form_data_utilities\FormElementTrait;

/**
 *
 */
trait Maxlength {

  /**
   * @var int|null
   */
  protected ?int $maxlength = NULL;

  /**
   * @return int|null
   */
  public function getMaxlength(): ?int {
    return $this->maxlength;
  }

  /**
   * @param int|null $maxlength
   */
  public function setMaxlength(?int $maxlength): self {
    $this->maxlength = $maxlength;
    return $this;
  }

}