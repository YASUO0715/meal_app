<?php

namespace Database\Factories;

use App\Models\Post;
use Encore\Admin\Form\Field\Id;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $file = $this->faker->image();
        $fileName = basename($file);



        Storage::putFileAs('images/posts', $file, $fileName);
        File::delete($file);
        return [
            'title' => $this->faker->word(),
            'body' => $this->faker->paragraph(),
            'image' => $fileName,
            'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => Arr::random(Arr::pluck(Category::All(), 'id')),
        ];
    }
}
