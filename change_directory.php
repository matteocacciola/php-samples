<?php

class Path
{

    public $current_path;
    protected $directory_separator = '/';
    protected $root_path = '/';
    protected $parent_directory = '..';
    protected $this_directory = '.';

    public function __construct($path)
    {
        $this->current_path = $path;
    }

    public function cd($new_path)
    {
        $temp_path = explode($this->directory_separator, $this->current_path);
        $arr = explode($this->directory_separator, $new_path);
        if ($arr[0] == '') {
            $temp_path = array();
            $temp_root = $this->root_path;
        } else {
            $temp_root = '';
        }
        
        foreach ($arr as $el) {
            if ($el) {
                if ($el == $this->parent_directory) {
                    array_pop($temp_path);
                } else {
                    if ($el != $this->this_directory) {
                        array_push($temp_path, $el);
                    }
                }
            }
        }
        
        $this->current_path = $temp_root . join($this->directory_separator, $temp_path);
    }
}

$path = new Path('/a/b/c/d');
// $path->cd('../x');
// $path->cd('./x');
// $path->cd('x');
// $path->cd('/a');
// $path->cd('../../e/../f');
$path->cd('/d/e/../a');
echo $path->current_path;
