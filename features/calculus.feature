# features/calculus.feature
Feature: calculus sum
    In order to display the sum of two numbers
    I need provide two numbers
Scenario: Display the sum of two input numbers
  Given I have the number 10 and the number 10
  When I add them together
  Then I should get 20
Scenario: Display the sum of two numbers
  Given I have the number 5 and the number 5
  And I have a third number of 2
  When I add them together
  Then I should get 12