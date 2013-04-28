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
    public function it_should_work_for_flat_arrays_with_one_value()
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

    /**
     * @test
     */
    public function it_should_work_for_flat_arrays_with_two_values()
    {
        $comparer = new \DeepCompare\Comparer();

        $array1 = array(
            'key1' => 'value1',
            'key2' => 'value2'
        );
        $array2 = array();

        $expectedResult = array(
            'key1' => array(
                'In old but not in new version',
                'value1'
            ),
            'key2' => array(
                'In old but not in new version',
                'value2'
            )
        );

        $result = $comparer->compare($array1, $array2);
        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @test
     */
    public function it_should_work_for_nested_arrays()
    {
        $comparer = new \DeepCompare\Comparer();

        $array1 = array(
            'key1' => array(
                'key2' => 'value2'
            )
        );
        $array2 = array();

        $expectedResult = array(
            'key1' => array(
                'In old but not in new version',
                'Array(...)'
            )
        );

        $result = $comparer->compare($array1, $array2);
        $this->assertEquals($expectedResult, $result);
    }


}
