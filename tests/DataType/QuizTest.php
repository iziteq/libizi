<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\QuizTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\DataType\Quiz;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\Quiz
 */
class QuizTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
{
  "question": "Dolor illo iure beatae inventore fuga voluptatem quam error.",
  "comment": "Bla bla bla",
  "answers": [
    {
      "content": "Qq",
      "correct": false
    },
    {
      "content": "Wow",
      "correct": false
    },
    {
      "content": "Eeey",
      "correct": true
    }
] }
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\Quiz
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = Quiz::createFromJson($this->json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        Quiz::createFromJson($this->json, MultipleFormInterface::FORM_FULL);
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

        Quiz::createFromJson($json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getQuestion
     */
    public function testGetQuestion()
    {
        $this->assertSame('Dolor illo iure beatae inventore fuga voluptatem quam error.',
          $this->sut->getQuestion());
    }

    /**
     * @covers ::getAnswers
     */
    public function testGetAnswers()
    {
        $this->assertInternalType('array', $this->sut->getAnswers());
        foreach ($this->sut->getAnswers() as $answer) {
            $this->assertInstanceOf('\Triquanta\IziTravel\DataType\QuizAnswerInterface',
              $answer);
        }
    }

    /**
     * @covers ::getComment
     */
    public function testGetComment()
    {
        $this->assertSame('Bla bla bla', $this->sut->getComment());
    }

}
