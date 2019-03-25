<?php

abstract class Book {
    abstract public function getTotalPrice();

    public function addBook(Book $book) {
        throw new Exception('Not allowed');
    }

    public function removeBook(Book $book) {
        throw new Exception('Not allowed');
    }
}

class Journal extends Book {
    public function getTotalPrice()
    {
        return 30;
    }
}

class Paper extends Book {
    public function getTotalPrice()
    {
        return 10;
    }
}

class Collection extends Book {
    private $books = [];

    public function getTotalPrice()
    {
        $total = 100;
        foreach ($this->books as $book) {
            $total += $book->getTotalPrice();
        }
        return $total;
    }

    public function addBook(Book $book) {
        if (in_array($book, $this->books, true)) {
            return;
        }
        $this->books[] = $book;
    }

    public function removeBook(Book $book) {
        $this->books = array_udiff($this->books, [$book],
            function( $a, $b) {return ($a === $b) ? 0 : 1; });
    }
}

class Library extends Book {
    private $books = [];

    public function getTotalPrice()
    {
        $total = 500;
        foreach ($this->books as $book) {
            $total += $book->getTotalPrice();
        }
        return $total;
    }

    public function addBook(Book $book) {
        if (in_array($book, $this->books, true)) {
            return;
        }
        $this->books[] = $book;
    }

    public function removeBook(Book $book) {
        $this->books = array_udiff($this->books, [$book],
            function( $a, $b) {return ($a === $b) ? 0 : 1; });
    }
}

$journal = new Journal();
$paper = new Paper();

$library = new Library();
$library->addBook($journal);
$library->addBook($paper);

$collection = new Collection();
$collection->addBook($journal);
$collection->addBook($paper);

$library->addBook($collection);

print $library->getTotalPrice();
