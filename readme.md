# Drupal: Form Data Utilities

This module is a developer assistance module for developers creating custom PHP forms with code.

The Drupal render array syntax for forms and Forms API is a powerful and flexible tool, however can be difficult to
learn and maintain long forms due to the verbosity of the syntax.

This module aims to simplify the building of Drupal forms into a more Object-Oriented approach that benefits from
IDE autocompletion and type hinting for form elements.

For complex series of forms there is often reuse of fields or logic. This can be encapsulated in custom Drupal elements
but this is often a layer of unnecessary complexity. Instead, elements can be created as distinct form blocks
and added to a builder as an when necessary, reducing complexity.

## Creating a complete form

### Basic usage

Currently, there is no service provider for the builder, this will be developed soon. As of now, a new `FormBuilder`
is required:

```php
$this->formBuilder = new \Drupal\form_data_utilities\FormBuilder();
```

A new builder is required for each form as it manages the whole state in an object tree.

Once the builder has been created, elements can be added to the form:

```php
// Add a button under the key 'form_key_for_my_button' with the value of 'My Button': 
$this->formBuilder
     ->addButton('form_key_for_my_button')
     ->setValue('My Button')
```

This produces an object representation of the elements, in a Drupal render array this would be the equivalent of:

```php
$form['form_key_for_my_button'] = [
  '#type' => 'button',
  '#value' => 'My Button',
];
```

To export the form from the builder, ready for use in Drupal, do the following:

```php
$form = $this->formBuilder->getRenderArray();
```

The render array can then be modified as any associative array in PHP. For example, this would add an attribute class
and return the form array:

```php
$form = $this->formBuilder->getRenderArray();
$form['form_key_for_my_button']['#attributes']['class'][] = 'My Class';
return $form;
```

### Advanced usage

Generally we are adding a series of fields to a Drupal form, so to reduce boilerplate the builder provides a fluent
interface and node navigation when creating a form tree.

Fluent interface approach allows you to add multiple fields in one statement:

```php
$this->formBuilder
  ->addButton('button')
  ->setValue('My Button')
  ->done()
  ->addTextfield('textfield')
  ->setTitle('My text field')
  ->setSize(60);
```
Note the use of the `done()` method, this completes the fluent interface for an element, and returns the main builder
that allows another form element to be added.

Node navigation allows elements like containers, that have child elements, to continue with the fluent interface
approach and add elements to the hierarchy:

```php
$this->formBuilder
  ->addButton('button')
  ->setValue('My Button')
  ->done()
  ->addContainer('container')
  ->children()
  ->addTextfield('textfield')
  ->setTitle('My text field')
  ->setSize(60)
  ->toParent()
  ->addButton('button_2')
  ->setValue('My button 2')
  ->done();
```

The `children()` method of the container element allows the addition of child elements, so the container becomes the
wrapper. To leave the container child list and add siblings to the container, the method `toParent()` is called.

The render array for this form is:

```php
[
    'button' => [
      '#value' => 'My Button',
      '#type' => 'button',
    ],
    'container' => [
      '#type' => 'container',
      'textfield' => [
        '#type' => 'textfield',
        '#title' => 'My text field',
        '#size' => 60,
        '#required' => FALSE,
      ]
    ],
    'button_2' => [
      '#type' => 'button',
      '#value' => 'My button 2',
    ]
]
```

### Adding attributes and properties

Each element has a fluent interface for adding attributes:

```php
$button = $this->formBuilder
  ->addButton('a_button')
  ->setValue('My button');

// Some more logic

// Now add additional attributes:
$button
  ->setAttributeClass(['button-class'])
  ->setAttributeId('html-id-for-button')
  ->setAttributeName('html-custom-name');
```

Each element has a reference in the builder, so referencing in a local variable and making later amendments is
straightforward.

All supported attributes and properties are available as IDE autocomplete properties, meaning less overhead to remember
values, and types are enforced to ensure best practice values for these render arrays.

### Arguments for attributes and properties

Arguments, named or not, can be supplied for each element providing a reduction in boilerplate code to make the same element.

```php
$button = $this->formBuilder
  ->addButton('a_button')
  ->fromArguments(
    'My button',
    attributeClass: ['test-class'],
    attributeId: 'test-id'
  );
```

This is often a more succinct approach for building form elements.

## Available fields

These are the current fields that can be used with this form builder:

* Button
* Container
* Textfield

This list will continue to grow to cover the full Drupal Form API.

## Future goals

The roadmap for this module is:

1. Cover all elements in the Form API.
2. Allow for the hydration of the builder from a pre-existing render array.
3. Add alternate output formats for the builder:
   * Making it easier to switch between code bases, e.g. from Drupal to Laravel, or from Drupal to React
   * Integration with Drupal webform, so previously coded forms can be quickly migrated.