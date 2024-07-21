<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index() {
//        $str = 'dgkdgcldcvd';
//        dd($str);

//        $post = Post::find(1);
//        $posts = Post::all();

        $post = Post::where('is_published', 1)->get();

//        dump($post[1]->title);
//        dd('end3');
        $posts = Post::all();
        return view('posts', compact('posts'));
    }

    public function create() {
        $postsArr = [
            [
            'title' => 'title of post from phpstorm',
            'content' => 'some interesing content',
            'image' => 'imagebal.jpg',
            'likes' => '20',
            'is_published' => '1',
            ],
            [
            'title' => 'another title of post from phpstorm',
            'content' => 'another some interesing content',
            'image' => 'another imagebal.jpg',
            'likes' => '50',
            'is_published' => '1',
            ],
        ];

        foreach ($postsArr as $item) {
//            Post::create($item);
            Post::create(
                [
                    'title' => $item['title'],
                    'content' => $item['content'],
                    'image' => $item['image'],
                    'likes' => $item['likes'],
                    'is_published' => $item['is_published'],
                ]
            );

        }
    }

    public function update() {
        $post = Post::find(6);
        $post->update(
            [
                'title' => '2title of post from phpstorm',
                'content' => '2some interesing content',
                'image' => '2imagebal.jpg',
                'likes' => '20',
                'is_published' => '1',
            ]
        );
    }

    public function delete() {
        $post = Post::find(2);
        $post->delete();

        dd('deleted');
    }

    public function restore() {                 // восстановление после "мягкого удаления"
        $post = Post::withTrashed(2);      // поиск используя данные корзины
        $post->restore();

        dd('restore');
    }

    public function firstOrCreate() {                   // если находит -> ничего не делает, не находит -> создаёт новое

        $post = Post::firstOrCreate([                   // перед записью в базу проверяет уникальность
            'title' => 'some title phpshtorm5'          // указаного ключа и
            ], [
                'title' => 'some title phpshtorm5',     // если ключ есть, то возвращает эту запись
                'content' => 'some content5',           // если такого ключа нет, то делает запись и возвращает новую запись
                'image' => 'some imagebal.jpg',
                'likes' => '5000',
                'is_published' => '1',
            ]

        );
        dump($post);
        dd('finished');
    }

    public function updateOrCreate() {                  // если находит -> заменяет имеющееся, не находит -> создаёт новое

        $post = Post::updateOrCreate([                      // перед записью в базу проверяет уникальность
            'title' => 'some title phpshtorm'               // указаного ключа и
        ], [
                'title' => 'update some title phpshtorm5',     // если ключ есть, то заменяет эту запись
                'content' => 'update some content5',           // если такого ключа нет, то делает запись и возвращает новую запись
                'image' => 'update some imagebal.jpg',
                'likes' => '5000',
                'is_published' => '1',
            ]

        );
        dump($post);
        dd('updateOrCreate');
    }
}
