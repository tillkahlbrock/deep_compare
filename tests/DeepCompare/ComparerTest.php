<?php

class ComparerTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function it_should_return_an_empty_array_if_both_inputs_are_empty()
    {
        $comparer = new \DeepCompare\Comparer();

        $array1 = array();
        $array2 = array();

        $this->assertEquals(array(), $comparer->compare($array1, $array2));
    }

    /**
     * @test
     */
    public function the_result_should_contain_the_value_of_the_first_input_if_the_second_input_is_empty()
    {
        $comparer = new \DeepCompare\Comparer();

        $array1 = array('key' => 'value');
        $array2 = array();

        $expectedResult = array(
            'key' => array(
                'In old but not in new version',
                'value'
            )
        );

        $result = $comparer->compare($array1, $array2);
        $this->assertEquals($expectedResult, $result);
    }
}
