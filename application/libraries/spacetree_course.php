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
            $this->id = $course->id;
            $this->name = $course->deptCode . $course->code;
            $this->data = array();
            $this->data['tip'] = $course->title;

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