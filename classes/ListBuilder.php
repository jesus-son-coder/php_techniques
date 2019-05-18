<?php
/**
 * Created by PhpStorm.
 * User: rvck2
 * Date: 21/01/2019
 * Time: 13:55
 */

class ListBuilder extends RecursiveIteratorIterator implements Traversable
{
    protected $array;
    protected $output = '';

    public function __construct(Traversable $array)
    {
        $this->array = new RecursiveIteratorIterator($array);
        parent::__construct($this->array, parent::SELF_FIRST);
    }

/*
    public function __construct(Traversable $iterator, $mode = self::LEAVES_ONLY, $flags = 0)
    {
        parent::__construct($iterator, $mode, $flags);
    }
*/
    /**
     * Called automatically at the beginning of the loop
     * Add opening list tag
     */
    public function beginIteration()
    {
        $this->output .= '<ul>';
    }

    /**
     * Called automatically at the end of the loop
     * Add closing list tag
     */
    public function endIteration()
    {
        $this->output .= '</ul>';
    }

    /**
     * Called automatically at the beginning of a subarray
     * Add an opening list tag
     */
    public function beginChildren()
    {
        $this->output .= '<ul>';
    }

    /**
     * Called automatically at the end of a subarray
     * Close the nested list and current list item :
     */
    public function endChildren()
    {
        $this->output .= '</ul></li>';
    }

    /**
     * Called automatically for each array element :
     */
    public function nextElement()
    {
        // Check whether there's a subarray' :
        if (parent::callHasChildren()) {
            // Display the subarray's key :
            $this->output .= '<li>' . self::key();
        }
        else {
            // Display the current array element :
            $this->output .= '<li>' . self::current() . '</li>' ;
        }
    }

    /**
     * Generate the list and return the outpu as a string :
     */
    public function __toString() {
        // Generate the list :
        $this->run();
        return $this->output;
    }

    /**
     * Run the iterator internally :
     */
    protected function run()
    {
        self::beginIteration();
        while (self::valid()) {
            self::next();
        }
        self::endIteration();
    }
}