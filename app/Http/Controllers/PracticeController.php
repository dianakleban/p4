<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class PracticeController extends Controller
{
  //Used for testing only:
  public function practice()
  {
            /*create:
            $book = new Book();

            $book->title = 'Dinas book1';
            $book->author = 'Diana Kleban';
            $book->published = 1997;
            $book->cover = 'http://prodimage.images-bn.com/pimages/9780590353427_p0_v1_s484x700.jpg';
            $book->purchase_link = 'http://www.barnesandnoble.com/w/harry-potter-and-the-sorcerers-stone-j-k-rowling/1100036321?ean=9780590353427';

            $book->save();

            dump($book->toArray());
            */

            /*update
            $books = Book::where('author', '=', 'Bell Hooks')->get();

            //$book = Book::where('author', 'LIKE', '%Diana%')->first();

            if ($books->isEmpty()) {
                dump("Books not found, can't update.");
            } else {

                foreach($books as $book)
                {
                  $book->author = 'bell hooks';
                  $book->save();
                  dump($book->toArray());
                }
                //$book->title = 'The Really Great Gatsby';
                //$book->published = '1972';

                # Save the changes

                dump('Update complete; check the database to confirm the update worked.');
            }*/

            /*read:
            //$book = new Book();
            //$books = $book->where('title', 'LIKE', '%Dina%')->get();
            //$books = Book::where('author', '=', 'J.K. Rowling')->get();
            //$books = Book::orderBy('created_at', 'desc')->limit(2)->get();
            //$books = Book::where('published', '>','1950')->get();
            //$books = Book::orderBy('title')->get();
            //$books = Book::orderBy('published', 'desc')->get();

            if ($books->isEmpty()) {
                dump('No matches found');
            } else {
                foreach ($books as $book) {
                    dump($book->toArray());
                }
            }*/

            /*delete:
            $books = Book::all();

            //$book = Book::where('author', 'LIKE', '%Scott%')->first();

            if ($books->isEmpty()) {
                dump('Books not found.');
            } else {
                foreach($books as $book) {
                    $book->delete();
                    dump($book->toArray());
                }

                dump('Deletion complete; check the database to see if it worked...');
            }*/


  }


}
