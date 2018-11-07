<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $shelf;
    private $basket;
    private $calculus;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->shelf = new Shelf();
        $this->basket = new Basket($this->shelf);
        $this->calculus = new Calculus();
    }

    /**
     * @Given there is a :arg1, which costs £:arg2
     */
    public function thereIsAWhichCostsPs($product, $price)
    {
        $this->shelf->setProductPrice($product, floatval($price));
    }

    /**
     * @When I add the :arg1 to the basket
     */
    public function iAddTheToTheBasket($product)
    {
        $this->basket->addProduct($product);
    }

    /**
     * @Then I should have :arg1 product in the basket
     */
    public function iShouldHaveProductInTheBasket($count)
    {
        PHPUnit\Framework\Assert::assertCount(
            intval($count),
            $this->basket
        );
    }

    /**
     * @Then the overall basket price should be £:arg1
     */
    public function theOverallBasketPriceShouldBePs($price)
    {
        PHPUnit\Framework\Assert::assertSame(
            floatval($price),
            $this->basket->getTotalPrice()
        );
    }

    /**
     * @Then I should have :arg1 products in the basket
     */
    public function iShouldHaveProductsInTheBasket($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given /^I have the number (\d+) and the number (\d+)$/
     * @param $a
     * @param $b
     */
    public function iHaveTheNumberAndTheNumber($a, $b) {
        $this->calculus->setNumbers($a, $b);
    }

    /**
     * @When I add them together
     */
    public function iAddThemTogether()
    {
        $this->calculus->add();
    }

    /**
     * @Then /^I should get (\d+)$/
     */
    public function iShouldGet($sum) {
        if ($this->calculus->sum != $sum) {
            throw new Exception("Actual sum: ".$this->calculus->sum);
        }
        $this->calculus->display();
    }

    /**
     * @Given I have a third number of :num
     */
    public function iHaveAThirdNumberOf($num)
    {
        $this->calculus->setThirdNumber($num);
    }

}
