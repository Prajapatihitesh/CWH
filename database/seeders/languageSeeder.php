<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Language;
use App\Models\Topic;
use App\Models\SubTopic;
class languageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = Language::create([
            "name"=>"HTML",
        ]);
        $tid = Topic::create([
            "name"=>"Introduction",
            "language_id"=>$id->id
        ]);
        SubTopic::create([
            "name"=>"What is HTML?",
            "definition"=>"HTML (Hypertext Markup Language) is the standard language used to create and design web pages on the internet. It is a markup language that uses tags to describe the structure and content of a webpage. These tags allow the browser to interpret and display the content correctly.
HTML defines the structure of a webpage by marking up text, images, videos, links, and other media with tags. It works in combination with other web technologies such as CSS (Cascading Style Sheets) for design and JavaScript for functionality.",
       "topic_id"=>$tid->id,
     ]);
     SubTopic::create([
        "name"=>"Key Features of HTML:",
        "definition"=>"Markup Language: It uses tags to mark the beginning and end of elements.
Structure: It defines the layout of the content and its hierarchy.
Content Representation: HTML specifies the content to be displayed on the web.",
"example"=>'<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML Example</title>
</head>
<body>
    <h1>Welcome to HTML</h1>
    <p>This is a paragraph of text in HTML.</p>
</body>
</html>
',"output"=>"Welcome to HTML
This is a paragraph of text in HTML.",
   "topic_id"=>$tid->id,
 ]);


 SubTopic::create([
    "name"=>"Why We Use HTML",
    "definition"=>"Creating Web Pages: HTML is the fundamental language used to structure content on the web. Without HTML, there would be no way to present content on a webpage.

Content Structuring: It provides a framework to organize content using headings, paragraphs, lists, tables, and more. HTML lets you build everything from a simple blog post to a complex e-commerce site.

Text Formatting and Linking: HTML enables you to apply text formatting (like bold, italics), and it lets you add links to other web pages (both internal and external), creating an interconnected network of information (the World Wide Web).

Embedding Multimedia: You can use HTML to add images, audio, and video to a webpage, making the content more engaging.

Form Handling: HTML is used to create forms for collecting user input, such as contact forms, surveys, and registration forms.

Compatibility Across Browsers: HTML is universally supported by all browsers, meaning that a webpage written in HTML can be viewed on any device with a browser, whether it’s a desktop computer, smartphone, or tablet.

Search Engine Optimization (SEO): Proper HTML structure is essential for search engines to understand the content of a webpage. Using semantic HTML (correct tags for headings, paragraphs, etc.) helps with better indexing and ranking by search engines like Google.",
"topic_id"=>$tid->id,
]);

        Topic::create([
            "name"=>"Editors",
            "language_id"=>$id->id
        ]);
        Topic::create([
            "name"=>"Basic",
            "language_id"=>$id->id
        ]);



        $id = Language::create([
            "name"=>"CSS",
        ]);
        Topic::create([
            "name"=>"Introduction",
            "language_id"=>$id->id
        ]);
        Topic::create([
            "name"=>"Basic",
            "language_id"=>$id->id
        ]);

        $id = Language::create([
            "name"=>"JavaScript",
        ]);
        Topic::create([
            "name"=>"Introduction",
            "language_id"=>$id->id
        ]);
        Topic::create([
            "name"=>"Basic",
            "language_id"=>$id->id
        ]);



        $id =  Language::create([
            "name"=>"JQuery",
        ]);
           Topic::create([
            "name"=>"Introduction",
            "language_id"=>$id->id
        ]);
        Topic::create([
            "name"=>"Basic",
            "language_id"=>$id->id
        ]);

        $id = Language::create([
            "name"=>"PHP",
        ]);
           Topic::create([
            "name"=>"Introduction",
            "language_id"=>$id->id
        ]);
        Topic::create([
            "name"=>"Basic",
            "language_id"=>$id->id
        ]);

        $id = Language::create([
            "name"=>"BOOTSRAP",
        ]);
           Topic::create([
            "name"=>"Introduction",
            "language_id"=>$id->id
        ]);
        Topic::create([
            "name"=>"Basic",
            "language_id"=>$id->id
        ]);

        $id = Language::create([
            "name"=>"Python",
        ]);
           Topic::create([
            "name"=>"Introduction",
            "language_id"=>$id->id
        ]);
        Topic::create([
            "name"=>"Basic",
            "language_id"=>$id->id
        ]);

        $id = Language::create([
            "name"=>"Java",
        ]);
           Topic::create([
            "name"=>"Introduction",
            "language_id"=>$id->id
        ]);
        Topic::create([
            "name"=>"Basic",
            "language_id"=>$id->id
        ]);

        $id = Language::create([
            "name"=>"C",
        ]);
           Topic::create([
            "name"=>"Introduction",
            "language_id"=>$id->id
        ]);
        Topic::create([
            "name"=>"Basic",
            "language_id"=>$id->id
        ]);

        $id = Language::create([
            "name"=>"C++",
        ]);
           Topic::create([
            "name"=>"Introduction",
            "language_id"=>$id->id
        ]);
        Topic::create([
            "name"=>"Basic",
            "language_id"=>$id->id
        ]);

        $id = Language::create([
            "name"=>"IOT",
        ]);
           Topic::create([
            "name"=>"Introduction",
            "language_id"=>$id->id
        ]);
        Topic::create([
            "name"=>"Basic",
            "language_id"=>$id->id
        ]);

        $id = Language::create([
            "name"=>"SQL",
        ]);
           Topic::create([
            "name"=>"Introduction",
            "language_id"=>$id->id
        ]);
        Topic::create([
            "name"=>"Basic",
            "language_id"=>$id->id
        ]);

        $id = Language::create([
            "name"=>"NOSQL",
        ]);
           Topic::create([
            "name"=>"Introduction",
            "language_id"=>$id->id
        ]);
        Topic::create([
            "name"=>"Basic",
            "language_id"=>$id->id
        ]);

        $id = Language::create([
            "name"=>"React JS",
        ]);
           Topic::create([
            "name"=>"Introduction",
            "language_id"=>$id->id
        ]);
        Topic::create([
            "name"=>"Basic",
            "language_id"=>$id->id
        ]);

        $id = Language::create([
            "name"=>"Node JS",
        ]);
           Topic::create([
            "name"=>"Introduction",
            "language_id"=>$id->id
        ]);
        Topic::create([
            "name"=>"Basic",
            "language_id"=>$id->id
        ]);

        $id = Language::create([
            "name"=>"DJANGO",
        ]);
           Topic::create([
            "name"=>"Introduction",
            "language_id"=>$id->id
        ]);
        Topic::create([
            "name"=>"Basic",
            "language_id"=>$id->id
        ]);

        $id = Language::create([
            "name"=>"PLSQL",
        ]);
           Topic::create([
            "name"=>"Introduction",
            "language_id"=>$id->id
        ]);
        Topic::create([
            "name"=>"Basic",
            "language_id"=>$id->id
        ]);

        $id = Language::create([
            "name"=>"MYSQL",
        ]);
           Topic::create([
            "name"=>"Introduction",
            "language_id"=>$id->id
        ]);
        Topic::create([
            "name"=>"Basic",
            "language_id"=>$id->id
        ]);

        $id = Language::create([
            "name"=>"ANGULAR",
        ]);
           Topic::create([
            "name"=>"Introduction",
            "language_id"=>$id->id
        ]);
        Topic::create([
            "name"=>"Basic",
            "language_id"=>$id->id
        ]);

        $id = Language::create([
            "name"=>"FLUTER",
        ]);
           Topic::create([
            "name"=>"Introduction",
            "language_id"=>$id->id
        ]);
        Topic::create([
            "name"=>"Basic",
            "language_id"=>$id->id
        ]);

        $id = Language::create([
            "name"=>"DATA SCIENCE",
        ]);
           Topic::create([
            "name"=>"Introduction",
            "language_id"=>$id->id
        ]);
        Topic::create([
            "name"=>"Basic",
            "language_id"=>$id->id
        ]);

        $id = Language::create([
            "name"=>"DSA",
        ]);
           Topic::create([
            "name"=>"Introduction",
            "language_id"=>$id->id
        ]);
        Topic::create([
            "name"=>"Basic",
            "language_id"=>$id->id
        ]);

    }
}
