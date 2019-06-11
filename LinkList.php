<?php
class Node
{
    public $data;
    public $next;

    public function __construct($item)
    {
        $this->data = $item;
        $this->next = null;
    }
}
class LinkList
{
    public $head = null;

    private static $count = 0;

    public function GetCount()
    {
        return self::$count;
    }

    public function InsertAtFist($item) {
        if ($this->head == null) {
            $this->head = new Node($item);
        } else {
            $temp = new Node($item);

            $temp->next = $this->head;

            $this->head = $temp;
        }

        self::$count++;
    }

    public function InsertAtLast($item) {
        if ($this->head == null) {
            $this->head = new Node($item);
        } else {
            /** @var Node $current */
            $current = $this->head;
            while ($current->next != null)
            {
                $current = $current->next;
            }

            $current->next = new Node($item);
        }

        self::$count++;
    }

    public function Delete($key)
    {
        /** @var Node $current */
        $current = $previous = $this->head;

        while($current->data != $key) {
            $previous = $current;
            $current = $current->next;
        }

        // For the first node
        if ($current == $previous) {
            $this->head = $current->next;
        }

        $previous->next = $current->next;

        self::$count--;
    }

    public function PrintAsList()
    {
        $items = [];
        /** @var Node $current */
        $current = $this->head;
        while($current != null) {
            array_push($items, $current->data);
            $current = $current->next;
        }

        $str = '';
        foreach($items as $item)
        {
            $str .= $item . '->';
        }

        echo $str;

        echo PHP_EOL;
    }
}

$ll = new LinkList();

$ll->InsertAtLast('KP');
$ll->InsertAtLast(45);
$ll->InsertAtFist(11);
$ll->InsertAtLast('FE');
$ll->InsertAtFist('LE');
$ll->InsertAtFist(100);
$ll->InsertAtFist(199);
$ll->InsertAtLast(500);

$ll->PrintAsList();
echo 'Total elements ' . $ll->GetCount()."<br>";
echo PHP_EOL;
$ll->Delete(45);
$ll->PrintAsList();
echo 'Total elements ' . $ll->GetCount()."<br>";
echo PHP_EOL;
$ll->Delete(500);
$ll->PrintAsList();
echo 'Total elements ' . $ll->GetCount()."<br>";
echo PHP_EOL;
$ll->Delete(100);
$ll->PrintAsList();
echo 'Total elements ' . $ll->GetCount()."<br>";
echo PHP_EOL;