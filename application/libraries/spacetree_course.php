<?php
class Spacetree_course
{
    public $id;
    public $name;
    public $data = array();
    public $children = array();

    public function __construct($course)
    {
        $this->id = $course->id;
        $this->name = $course->title . '(' . $course->deptCode . $course.code . ')';
        $this->data = array();

        $spacetreePrereqs = array();

        //Chagnes each prereq into a prereq
        foreach($course->prereqs as $prereq)
        {
            //Changes it (and it's children) into a spacetree course
            $spacetreePrereqs[] = new Spacetree_course($prereq);
        }

        $this->children = $spacetreePrereqs;
    }

}

/* End of file spacetree_course.php */