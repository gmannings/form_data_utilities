<?php

namespace Drupal\form_data_utilities\FormElementTrait;

trait Attributes {

  protected ?array $attributeClass = NULL;
  protected ?string $attributeId = NULL;

  protected ?string $attributeName = NULL;

  public function getAttributeClass(): ?array {
    return $this->attributeClass;
  }

  public function setAttributeClass(?array $attributeClass): self {
    $this->attributeClass = $attributeClass;
    return $this;
  }

  public function getAttributeId(): ?string {
    return $this->attributeId;
  }

  public function setAttributeId(?string $attributeId): self {
    $this->attributeId = $attributeId;
    return $this;
  }

  public function getAttributeName(): ?string {
    return $this->attributeName;
  }

  public function setAttributeName(?string $attributeName): self {
    $this->attributeName = $attributeName;
    return $this;
  }


}