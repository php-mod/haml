<?php

namespace MtHaml\Node;

use MtHaml\Helpers\Position;
use MtHaml\NodeVisitor\NodeVisitorInterface;

class TagAttributeList extends TagAttribute
{
    public function __construct(Position $position, NodeAbstract $value = null)
    {
        parent::__construct($position, null, $value);
    }

    public function accept(NodeVisitorInterface $visitor)
    {
        if (false !== $visitor->enterTagAttribute($this)) {
            if (false !== $visitor->enterTagAttributeList($this)) {
                $this->getValue()->accept($visitor);
            }
            $visitor->leaveTagAttributeList($this);
        }
        $visitor->leaveTagAttribute($this);
    }
}
