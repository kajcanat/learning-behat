Feature: Product basket
  In order to buy products
  As a customer
  I need to be able to put interesting products into a basket

  Rules:
  - VAT is 20%
  - Delivery for basket under £10 is £3
  - Delivery for basket over £10 is £2

  Scenario: Buying a single product under £10
    Given there is a "book", which costs £5
    When I add the "book" to the basket
    Then I should have 1 product in the basket
    And the overall basket price should be £9

  Scenario: Buying a single product over £10
    Given there is a "painting", which costs £15
    When I add the "painting" to the basket
    Then I should have 1 product in the basket
    And the overall basket price should be £20

  Scenario: Buying two products over £10
    Given there is a "book", which costs £10
    And there is a "painting", which costs £5
    When I add the "book" to the basket
    And I add the "painting" to the basket
    Then I should have 2 products in the basket
    And the overall basket price should be £20
