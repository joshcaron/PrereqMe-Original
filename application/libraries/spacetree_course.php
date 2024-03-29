<?php
class Spacetree_course
{
    public $id;
    public $name;
    public $data = array();
    public $children = array();

    public function Spacetree_course($course = NULL)
    {
        if($course !== NULL)
        {
            $this->id = rand(0, 10000000);
            $this->name = $course->deptCode . $course->code;
            $this->data = array();
            $this->data['id'] = $course->id;
            $this->data['tip'] = $course->title . ' (' . $course->credits . ')';

            if(isset($course->prereqs))
            {
                $spacetreePrereqs = array();

                //Changes each prereq into a prereq
                foreach($course->prereqs as $prereq)
                {
                    //Changes it (and it's children) into a spacetree course
                    $spacetreePrereqs[] = new Spacetree_course($prereq);
                }

                $this->children = $spacetreePrereqs;
            }
        }
    }

}

/* End of file spacetree_course.php */