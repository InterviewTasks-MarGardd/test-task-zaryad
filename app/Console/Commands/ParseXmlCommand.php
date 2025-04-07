<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class ParseXmlCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:parse-xml-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $xml = simplexml_load_file('resources/data.xml');
        if (!$xml) {
            $this->error('Failed to load XML file');
            return;
        }
        foreach ($xml as $item) {
            foreach ($item->Category as $category) {
                $categoryName = (string)$category->Name;
                $categorySlug = Str::slug($categoryName);

                $dbCategory = Category::firstOrCreate(
                    ['name' => $categoryName],
                    ['slug' => $categorySlug]
                );
                foreach ($category->Elements->children() as $item) {
                    $title = (string)$item->Name;
                    $slug = Str::slug($title);
                    $description = (string)$item->Description;

                    $postDb = Post::updateOrCreate(
                        ['slug' => $slug],
                        [
                            'title' => $title,
                            'description' => $description,
                            'category_id' => $dbCategory->id
                        ]
                    );

                    $this->saveMedia($postDb, $item);
                }
            }
        }
        $this->info('XML parsing completed!');
    }

    protected function saveMedia(Post $post, $item): void
    {
        $post->clearMediaCollection('images');
        for ($i = 1; $i <= 10; $i++) {
            $field = "Pict{$i}";
            if (isset($item->$field)) {
//                $imageUrl = (string)$item->$field;
                $imageUrl = asset('images/test.png');
            } else {
                return;
            }
             try {
                 $post->addMediaFromUrl($imageUrl)
                     ->toMediaCollection('images');
             } catch (\Exception $e) {
                 $this->error("Failed to add image: {$imageUrl}");
             }
        }
    }
}
