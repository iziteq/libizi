<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\QuizAnswerTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\DataType\QuizAnswer;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\QuizAnswer
 */
class QuizAnswerTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
{
  "content" : "Qq",
  "correct" : false
}
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\QuizAnswer
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = QuizAnswer::createFromJson($this->json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        QuizAnswer::createFromJson($this->json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     *
     * @expectedException \Triquanta\IziTravel\DataType\InvalidJsonFactoryException
     */
    public function testCreateFromJsonWithInvalidJson()
    {
        $json = 'foo';

        QuizAnswer::createFromJson($json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getAnswer
     */
    public function testGetAnswer()
    {
        $this->assertSame('Qq', $this->sut->getAnswer());
    }

    /**
     * @covers ::isCorrect
     */
    public function testIsCorrect()
    {
        $this->assertFalse($this->sut->isCorrect());
    }

}
