<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $products = [
            [
                'product_id' => 'product-' . Str::random(5),
                'name' => 'Python Crash Course by Eric Matthes',
                'description' => 'A hands-on introduction to Python, suitable for beginners aiming to build practical projects.',
                'price' => 29.99,
                'stock' => 100,
                'image' => 'images/python.jpg',
            ],
            [
                'product_id' => 'product-' . Str::random(5),
                'name' => 'The C Programming Language',
                'description' => 'Authored by the creator of C++, this book serves as a definitive guide to the language, covering its features and standard library.',
                'price' => 59.99,
                'stock' => 50,
                'image' => 'images/c.jpg',
            ],
            [
                'product_id' => 'product-' . Str::random(5),
                'name' => 'The C++ Programming Language by Bjarne Stroustrup',
                'description' => 'Authored by the creator of C++, this book serves as a definitive guide to the language, covering its features and standard library.',
                'price' => 149.99,
                'stock' => 30,
                'image' => 'images/cpp.jpg',
            ],
            [
                'product_id' => 'product-' . Str::random(5),
                'name' => 'The Go Programming Language',
                'description' => 'An authoritative resource on Go, providing insights into its syntax and best practices.',
                'price' => 19.99,
                'stock' => 200,
                'image' => 'images/go.jpg',
            ],
            [
                'product_id' => 'product-' . Str::random(5),
                'name' => 'Cracking the Coding Interview',
                'description' => 'Prepares readers for technical interviews with a collection of programming questions and solutions.',
                'price' => 89.99,
                'stock' => 75,
                'image' => 'images/interview.webp',
            ],
            [
                'product_id' => 'product-' . Str::random(5),
                'name' => 'Head First Java',
                'description' => 'An interactive introduction to Java, utilizing a visually rich format to enhance learning.',
                'price' => 89.99,
                'stock' => 75,
                'image' => 'images/java.webp',
            ],
            [
                'product_id' => 'product-' . Str::random(5),
                'name' => 'Eloquent JavaScript',
                'description' => 'This book offers a comprehensive introduction to JavaScript, emphasizing writing elegant and effective code.',
                'price' => 89.99,
                'stock' => 75,
                'image' => 'images/javascript.png',
            ],
            [
                'product_id' => 'product-' . Str::random(5),
                'name' => 'Python Programming',
                'description' => 'Designed for absolute beginners, this book provides the basic tools to start programming with Python.',
                'price' => 89.99,
                'stock' => 75,
                'image' => 'images/python-1.jpg',
            ],
            [
                'product_id' => 'product-' . Str::random(5),
                'name' => 'Python Crash Course',
                'description' => 'A hands-on introduction to Python, suitable for beginners aiming to build practical projects.',
                'price' => 89.99,
                'stock' => 75,
                'image' => 'images/python-2.webp',
            ],
            [
                'product_id' => 'product-' . Str::random(5),
                'name' => 'Mastering Ruby',
                'description' => 'Object-Oriented: Everything in Ruby is an object, even primitive data types, which aligns with the language\'s flexible, intuitive style.',
                'price' => 89.99,
                'stock' => 75,
                'image' => 'images/ruby.jpg',
            ],
            [
                'product_id' => 'product-' . Str::random(5),
                'name' => 'Programming Rust',
                'description' => 'Explores the Rust programming language, emphasizing safe concurrency and system-level programming.',
                'price' => 89.99,
                'stock' => 75,
                'image' => 'images/rust.jpg',
            ],
            [
                'product_id' => 'product-' . Str::random(5),
                'name' => 'Python Crash Course',
                'description' => 'A hands-on introduction to Python, suitable for beginners aiming to build practical projects.',
                'price' => 89.99,
                'stock' => 75,
                'image' => 'images/python-2.webp',
            ],
            [
                'product_id' => 'product-' . Str::random(5),
                'name' => 'Python Crash Course',
                'description' => 'A hands-on introduction to Python, suitable for beginners aiming to build practical projects.',
                'price' => 89.99,
                'stock' => 75,
                'image' => 'images/python-2.webp',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
