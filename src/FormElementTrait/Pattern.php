<?php

namespace Drupal\form_data_utilities\FormElementTrait;

/**
 * Pattern property trait.
 *
 * @note
 *   #pattern: A string for the native HTML5 pattern attribute.
 */
trait Pattern {

  /**
   * @var string|null
   */
  protected ?string $pattern = null;

  /**
   * @return string|null
   */
  public function getPattern(): ?string {
    return $this->pattern;
  }

  /**
   * @param string|null $pattern
   *
   * @return void
   */
  public function setPattern(?string $pattern): void {
    $this->pattern = $pattern;
  }

}